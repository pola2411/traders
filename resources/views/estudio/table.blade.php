@php
   $datapairs= DB::table('estudio')
                    ->where('pair', $par)
                    ->where('time', $tr)
                    ->where('variant', $variant)
                    ->orderBy('value', 'asc')
                    ->get();
@endphp

<table class="table table-striped table-bordered nowrap"
    style="width: 100% !important; margin-left: 0px !important; margin-right: 0px !important;" id="trader_data">
    <thead class="text-center sticky-top"
        style="z-index: 999; background-color:white; vertical-align: middle !important; text-align: center !important">
        <tr>
            <th data-priority="0" scope="col" colspan="20">{{ $par }}
                <br>
                <small>Reporte eficiencia señal {{\Carbon\Carbon::parse(strtotime($datapairs[0]->date))->format('d-m-Y'); }}</small>
                <br>
                <small>Periodo de estudio {{\Carbon\Carbon::parse(strtotime($datapairs[0]->date_ranges1 ))->format('d-m-Y'); }} y {{\Carbon\Carbon::parse(strtotime($datapairs[0]->date_ranges1 ))->format('d-m-Y'); }}</small>
            </th>


        </tr>

        <tr>
            <th data-priority="0" scope="col" colspan="1" rowspan="3">Valor</th>
            <th data-priority="0" scope="col" colspan="8">Compras</th>
            <th data-priority="0" scope="col" colspan="8">Ventas</th>
            <th data-priority="0" scope="col" colspan="2" rowspan="2">Eficiencia</th>
            <th data-priority="0" scope="col" colspan="1" rowspan="2">Mejor</th>

        </tr>
        <tr>
            <th data-priority="0" scope="col" colspan="4">Ganadas</th>
            <th data-priority="0" scope="col" colspan="4">Perdidas</th>
            <th data-priority="0" scope="col" colspan="4">Ganadas</th>
            <th data-priority="0" scope="col" colspan="4">Perdidas</th>

        </tr>

        <tr>
            <th data-priority="0" scope="col">N</th>
            <th data-priority="0" scope="col">R1</th>
            <th data-priority="0" scope="col">R2</th>
            <th data-priority="0" scope="col">R3</th>
            <th data-priority="0" scope="col">N</th>
            <th data-priority="0" scope="col">R1</th>
            <th data-priority="0" scope="col">R2</th>
            <th data-priority="0" scope="col">R3</th>
            <th data-priority="0" scope="col">N</th>
            <th data-priority="0" scope="col">R1</th>
            <th data-priority="0" scope="col">R2</th>
            <th data-priority="0" scope="col">R3</th>
            <th data-priority="0" scope="col">N</th>
            <th data-priority="0" scope="col">R1</th>
            <th data-priority="0" scope="col">R2</th>
            <th data-priority="0" scope="col">R3</th>
            <th data-priority="0" scope="col">Compras</th>
            <th data-priority="0" scope="col">Ventas</th>
            <th data-priority="0" scope="col">Balance</th>

        </tr>

    </thead>
    <tbody style="vertical-align: middle !important; text-align: center !important; padding: 5px !important">
        @foreach($datapairs as $datapair)

            @php
                
                $registros = DB::table('estudio')
                    ->where('pair', $par)
                    ->count();
                
              
            @endphp

            @if ($registros > 0)
                <tr>
                    {{-- Value --}}


                    <td>{{ $datapair->value }}</td>

                    {{-- Compras Ganadas --}}

                    <td>{{ $datapair->bw_n }}</td>
                    <td>{{ $datapair->bw_r1 }}</td>
                    <td>{{ $datapair->bw_r2 }}</td>
                    <td>{{ $datapair->bw_r3 }}</td>


                    {{-- Compras Perdidas --}}
                    <td>{{ $datapair->bl_n }}</td>
                    <td>{{ $datapair->bl_r1 }}</td>
                    <td>{{ $datapair->bl_r2 }}</td>
                    <td>{{ $datapair->bl_r3 }}</td>


                    {{-- Ventas Ganadas --}}
                    <td>{{ $datapair->sw_n }}</td>
                    <td>{{ $datapair->sw_r1 }}</td>
                    <td>{{ $datapair->sw_r2 }}</td>
                    <td>{{ $datapair->sw_r3 }}</td>


                    {{-- Ventas Perdidas --}}
                    <td>{{ $datapair->sl_n }}</td>
                    <td>{{ $datapair->sl_r1 }}</td>
                    <td>{{ $datapair->sl_r2 }}</td>
                    <td>{{ $datapair->sl_r3 }}</td>

                    {{-- Eficiencia Compras --}}
                    @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                    <td>{{ number_format($eficienciaCompras, 2) }}</td>


                    {{-- Eficiencia Ventas --}}
                    @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                    <td>{{ number_format($eficienciaVentas, 2) }}</td>

                    {{-- Mejor Balance --}}
                    @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                    @if ($mejorBalance >= 56)
                        <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                    @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                        <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                    @else 
                        <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                    @endif
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

<div class="text-center">
    {{-- <a class="btn principal-button mb-3 new" id="imprimirAnalisis"><i class="bi bi-printer-fill me-1"></i>Imprimir PDF</a> --}}
</div>
