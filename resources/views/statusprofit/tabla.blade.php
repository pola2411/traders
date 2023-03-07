@if ($condicional)
    <table class="table table-striped table-bordered nowrap text-center" id="status_profit">
        <thead>
            <tr>
                <th data-priority="0" scope="col">Trader: <span style="font-weight: 500">{{$status_profit->nombre}}</span></th>
                <th data-priority="0" scope="col">Fecha: <span style="font-weight: 500">{{\Carbon\Carbon::parse($status_profit->fecha)->formatLocalized('%d de %B de %Y a las %T')}}</span></th>
            </tr>
            <tr>
                <th>MONEDA</th>
                <th>VALOR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-priority="0" scope="col">EURUSD</td>
                <td data-priority="0" scope="col">{{$status_profit->eurusd}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">GBPUSD</td>
                <td data-priority="0" scope="col">{{$status_profit->gbpusd}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">AUDUSD</td>
                <td data-priority="0" scope="col">{{$status_profit->audusd}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">NZDUSD</td>
                <td data-priority="0" scope="col">{{$status_profit->nzdusd}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">USDCAD</td>
                <td data-priority="0" scope="col">{{$status_profit->usdcad}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">USDCHF</td>
                <td data-priority="0" scope="col">{{$status_profit->usdchf}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">USDJPY</td>
                <td data-priority="0" scope="col">{{$status_profit->usdjpy}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">EURGBP</td>
                <td data-priority="0" scope="col">{{$status_profit->eurgbp}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">EURAUD</td>
                <td data-priority="0" scope="col">{{$status_profit->euraud}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">EURNZD</td>
                <td data-priority="0" scope="col">{{$status_profit->eurnzd}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">GBPAUD</td>
                <td data-priority="0" scope="col">{{$status_profit->gbpaud}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">GBPNZD</td>
                <td data-priority="0" scope="col">{{$status_profit->gbpnzd}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">AUDNZD</td>
                <td data-priority="0" scope="col">{{$status_profit->audnzd}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">EURCAD</td>
                <td data-priority="0" scope="col">{{$status_profit->eurcad}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">EURCHF</td>
                <td data-priority="0" scope="col">{{$status_profit->eurchf}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">EURJPY</td>
                <td data-priority="0" scope="col">{{$status_profit->eurjpy}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">GBPCAD</td>
                <td data-priority="0" scope="col">{{$status_profit->gbpcad}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">GBPCHF</td>
                <td data-priority="0" scope="col">{{$status_profit->gbpchf}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">GBPJPY</td>
                <td data-priority="0" scope="col">{{$status_profit->gbpjpy}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">AUDCAD</td>
                <td data-priority="0" scope="col">{{$status_profit->audcad}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">AUDCHF</td>
                <td data-priority="0" scope="col">{{$status_profit->audchf}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">AUDJPY</td>
                <td data-priority="0" scope="col">{{$status_profit->audjpy}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">NZDCAD</td>
                <td data-priority="0" scope="col">{{$status_profit->nzdcad}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">NZDCHF</td>
                <td data-priority="0" scope="col">{{$status_profit->nzdchf}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">NZDJPY</td>
                <td data-priority="0" scope="col">{{$status_profit->nzdjpy}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">CADCHF</td>
                <td data-priority="0" scope="col">{{$status_profit->cadchf}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">CADJPY</td>
                <td data-priority="0" scope="col">{{$status_profit->cadjpy}}</td>
            </tr>
            <tr>
                <td data-priority="0" scope="col">CHFJPY</td>
                <td data-priority="0" scope="col">{{$status_profit->chfjpy}}</td>
            </tr>
        </tbody>
    </table>
@else
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="info-fill" fill="#fff" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="#fff" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <div class="alert alert-primary d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
            aria-label="Info:">
            <use xlink:href="#info-fill" />
        </svg>
        <div>
            No se encontró ningún registro
        </div>
    </div>
@endif