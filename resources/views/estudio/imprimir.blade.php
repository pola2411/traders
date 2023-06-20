{{-- @php
   $datapairs= DB::table('estudio')
                    ->where('pair', $par)
                    ->where('time', $tr)
                    ->where('variant', $variant)
                    ->orderBy('value', 'asc')
                    ->get();
@endphp --}}

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
       
    </tbody>
</table>

<div class="text-center">
    <a class="btn principal-button mb-3 new" id="imprimirAnalisis"><i class="bi bi-printer-fill me-1"></i>Imprimir PDF</a>
</div>
