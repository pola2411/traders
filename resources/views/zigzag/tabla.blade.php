<table class="table table-striped table-bordered nowrap text-center" style="width: 100%; font-size: 14px !important" id="zigzag">
    <thead>
        <tr>
            <th data-priority="0" scope="col">Field</th>
            <th data-priority="0" scope="col">Buy</th>
            <th data-priority="0" scope="col">Sell</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Condition</td>
            <td>{{$live->conditionbuy}}</td>
            <td>{{$live->conditionsell}}</td>
        </tr>
        <tr>
            <td>Strategy</td>
            <td>{{$live->strategybuy}}</td>
            <td>{{$live->strategysell}}</td>
        </tr>
        <tr>
            <td>Action</td>
            <td>{{$live->actionbuy}}</td>
            <td>{{$live->actionsell}}</td>
        </tr>
        <tr>
            <td>Operations</td>
            <td>{{$live->operationsbuy}}</td>
            <td>{{$live->operationssell}}</td>
        </tr>
        <tr>
            <td>Check site</td>
            <td>{{$live->checksitebuy}}</td>
            <td>{{$live->checksitesell}}</td>
        </tr>
        <tr>
            <td>SL</td>
            <td>{{$live->slbuy}}</td>
            <td>{{$live->slsell}}</td>
        </tr>
        <tr>
            <td>TP</td>
            <td>{{$live->tpbuy}}</td>
            <td>{{$live->tpsell}}</td>
        </tr>
        <tr>
            <td>SL price</td>
            <td>{{str_replace(",", ".", $live->slbuyprice)}}</td>
            <td>{{str_replace(",", ".", $live->slsellprice)}}</td>
        </tr>
        <tr>
            <td>TP price</td>
            <td>{{str_replace(",", ".", $live->tpbuyprice)}}</td>
            <td>{{str_replace(",", ".", $live->tpsellprice)}}</td>
        </tr>
        <tr>
            <td><b>Spectrum:</b> {{str_replace(",", ".", $live->spectrum)}}</td>
            <td><b>Limit Up:</b> {{str_replace(",", ".", $live->limitup)}}</td>
            <td><b>Limit Down:</b> {{str_replace(",", ".", $live->limitdown)}}</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3"> Última aztualización: <span style="font-weight: 500">{{\Carbon\Carbon::parse($live->time)->formatLocalized('%d de %B de %Y a las %H:%M hrs.')}}</span></th>
        </tr>
    </tfoot>
</table>