<table class="table table-striped table-bordered nowrap" style="width: 100% !important; margin-left: -16px !important">
    <thead class="text-center sticky-top" style="z-index: 999; background-color:white; top:3.5rem;">
        <tr>
            <th data-priority="0" scope="col" colspan="4">{{ $tradersNombre->Signal }}</th>
            <th data-priority="0" scope="col" colspan="3">Lotes</th>
            <th data-priority="0" scope="col" colspan="3">Advance</th>
            <th data-priority="0" scope="col" colspan="3">Retracement</th>
            <th data-priority="0" scope="col" colspan="4">PIP</th>
            <th data-priority="0" scope="col" colspan="3">Minutes</th>
        </tr>
        <tr>
            <th data-priority="0" scope="col">PAIR</th>
            <th data-priority="0" scope="col">Registros</th>
            <th data-priority="0" scope="col">Buy</th>
            <th data-priority="0" scope="col">Sell</th>
            <th data-priority="0" scope="col">AVG</th>
            <th data-priority="0" scope="col">STP</th>
            <th data-priority="0" scope="col">MAX</th>
            <th data-priority="0" scope="col">AVG</th>
            <th data-priority="0" scope="col">STP</th>
            <th data-priority="0" scope="col">MAX</th>
            <th data-priority="0" scope="col">AVG</th>
            <th data-priority="0" scope="col">STP</th>
            <th data-priority="0" scope="col">MAX</th>
            <th data-priority="0" scope="col">AVG</th>
            <th data-priority="0" scope="col">STP</th>
            <th data-priority="0" scope="col">MAX</th>
            <th data-priority="0" scope="col">MIN</th>
            <th data-priority="0" scope="col">AVG</th>
            <th data-priority="0" scope="col">STP</th>
            <th data-priority="0" scope="col">MAX</th>
        </tr>
    </thead>
    <tbody class="text-center" style="vertical-align: middle;">
        @foreach ($monedas as $moneda)
            @php
                $registros = DB::table('operaciones_traders')
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->count();
                    
                $buy = DB::table('operaciones_traders')
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('type', 'Buy')
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->count();
                    
                $sell = DB::table('operaciones_traders')
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('type', 'Sell')
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->count();
                
                $volumeavg = DB::table('operaciones_traders')
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->avg('volume');
                
                $volumestd = DB::table('operaciones_traders')
                    ->select(DB::raw('stddev(volume) as std'))
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->get();
                
                $volumemax = DB::table('operaciones_traders')
                    ->select(DB::raw('MAX(volume) as max'))
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->get();
                
                $advavg = DB::table('operaciones_traders')
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->avg('advance');
                
                $advstd = DB::table('operaciones_traders')
                    ->select(DB::raw('stddev(advance) as std'))
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->get();
                
                $advmax = DB::table('operaciones_traders')
                    ->select(DB::raw('MAX(advance) as max'))
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->get();
                
                $retavg = DB::table('operaciones_traders')
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->avg('retracement');
                
                $retstd = DB::table('operaciones_traders')
                    ->select(DB::raw('stddev(retracement) as std'))
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->get();
                
                $retmax = DB::table('operaciones_traders')
                    ->select(DB::raw('MAX(retracement) as max'))
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->get();
                
                $pipavg = DB::table('operaciones_traders')
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->avg('pips');
                
                $pipstd = DB::table('operaciones_traders')
                    ->select(DB::raw('stddev(pips) as std'))
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->get();
                
                $pipmax = DB::table('operaciones_traders')
                    ->select(DB::raw('MAX(pips) as max'))
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->get();

                $pipmin = DB::table('operaciones_traders')
                    ->select(DB::raw('MIN(pips) as min'))
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->get();
                
                $minavg = DB::table('operaciones_traders')
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->avg('minutes');
                
                $minstd = DB::table('operaciones_traders')
                    ->select(DB::raw('stddev(minutes) as std'))
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->get();
                
                $minmax = DB::table('operaciones_traders')
                    ->select(DB::raw('MAX(minutes) as max'))
                    ->where('symbol', $moneda->moneda)
                    ->where('trader', $tradersNombre->id)
                    ->where('advance', '!=', 999999)
                    ->where('retracement', '!=', 999999)
                    ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                    ->get();
                
            @endphp
         
            @if ($registros > 0)
                <tr>
                    <td>{{ $moneda->moneda }}</td>
                    <td>{{ $registros }}</td>
                    <td>{{ $buy }}</td>
                    <td>{{ $sell }}</td>

                    <td>{{ number_format($volumeavg, 2) }}</td>
                    <td>{{ number_format($volumestd[0]->std, 2) }}</td>
                    <td>{{ number_format($volumemax[0]->max, 2) }}</td>

                    <td>{{ number_format($advavg, 1) }}</td>
                    <td>{{ number_format($advstd[0]->std, 1) }}</td>
                    <td>{{ number_format($advmax[0]->max, 1) }}</td>

                    <td>{{ number_format($retavg, 1) }}</td>
                    <td>{{ number_format($retstd[0]->std, 1) }}</td>
                    <td>{{ number_format($retmax[0]->max, 1) }}</td>

                    <td>{{ number_format($pipavg, 1) }}</td>
                    <td>{{ number_format($pipstd[0]->std, 1) }}</td>
                    <td>{{ number_format($pipmax[0]->max, 1) }}</td>
                    <td>{{ number_format($pipmin[0]->min, 1) }}</td>

                    <td>{{ number_format($minavg, 0) }}</td>
                    <td>{{ number_format($minstd[0]->std, 0) }}</td>
                    <td>{{ number_format($minmax[0]->max, 0) }}</td>
                </tr>
            @endif
            
        @endforeach
    </tbody>
</table>
