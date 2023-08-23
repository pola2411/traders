<div id="chartContainer" class="mb-5" style="height: 300px; width: 100%;"></div>

<table class="table table-striped table-bordered nowrap" id="analisisPortafolios">
    <thead class="text-center">
        <tr>
            <th data-priority="0" scope="col">Portafolio</th>
            <th data-priority="0" scope="col">Beneficio</th>
            <th data-priority="0" scope="col">Riesgo</th>
            <th data-priority="0" scope="col">Ratio</th>
            <th data-priority="0" scope="col">Margen</th>
            <th data-priority="0" scope="col">Swap</th>
            <th data-priority="0" scope="col">Riesgo apertura</th>
            <th data-priority="0" scope="col">Fichas</th>
        </tr>
    </thead>
    <tbody class="text-center" style="vertical-align: middle">
        @foreach ($analisis as $analis)
            @php
                $profit = App\Models\AnalisisPortafolio::where('value', $value)->where('portfolio', $analis->portfolio)->sum('profit');
                $risk = App\Models\AnalisisPortafolio::where('value', $value)->where('portfolio', $analis->portfolio)->sum('risk');
                $ratio = $profit / $risk;
                $margin = App\Models\AnalisisPortafolio::where('value', $value)->where('portfolio', $analis->portfolio)->sum('margin');
                $swap = App\Models\AnalisisPortafolio::where('value', $value)->where('portfolio', $analis->portfolio)->sum('swap');
                $riesgo_apertura = App\Models\AnalisisPortafolio::where('value', $value)->where('portfolio', $analis->portfolio)->sum('riesgo_apertura');
            @endphp
            <tr>
                <td>{{$analis->portfolio}}</td>
                <td>{{number_format($profit, 2)}}</td>
                <td>{{number_format($risk, 2)}}</td>
                <td>{{number_format($ratio, 2)}}</td>
                <td>{{number_format($margin, 2)}}</td>
                <td>{{number_format($swap, 2)}}</td>
                <td>{{number_format($riesgo_apertura, 2)}}</td>
                <td>
                    <a href="" data-value="{{$value}}" data-portfolio="{{$analis->portfolio}}" type="button" class="btn btn-dark btn-sm btn-icon view">
                        <i class="bi bi-card-heading"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>