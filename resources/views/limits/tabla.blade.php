<table class="table table-striped table-bordered nowrap text-center" id="limits">
    <thead>

        <tr>
            <th>MONEDA</th>
            <th>UP LIMIT</th>
            <th>UP</th>
            <th>DOWN</th>
            <th>DOWN LIMIT</th>
            <th>FORECAST</th>
        </tr>
    </thead>


    <tbody>
        <tr>
            <td>EUR</td>
            <td>{{ $limitData[0]->eur_uplimit }}</td>
            <td>{{ $limitData[0]->eur_up }}</td>
            <td>{{ $limitData[0]->eur_down }}</td>
            <td>{{ $limitData[0]->eur_downlimit}}</td>
            <td>{{ $limitData[0]->eur_forecast }}</td>
        </tr>

        <tr>
            <td>GBP</td>
            <td>{{ $limitData[0]->gbp_uplimit }}</td>
            <td>{{ $limitData[0]->gbp_up }}</td>
            <td>{{ $limitData[0]->gbp_down }}</td>
            <td>{{ $limitData[0]->gbp_downlimit }}</td>
            <td>{{ $limitData[0]->gbp_forecast }}</td>
        </tr>

        <tr>
            <td>AUD</td>
            <td>{{ $limitData[0]->aud_uplimit }}</td>
            <td>{{ $limitData[0]->aud_up }}</td>
            <td>{{ $limitData[0]->aud_down }}</td>
            <td>{{ $limitData[0]->aud_downlimit }}</td>
            <td>{{ $limitData[0]->aud_forecast }}</td>
        </tr>

        <tr>
            <td>NZD</td>
            <td>{{ $limitData[0]->nzd_uplimit }}</td>
            <td>{{ $limitData[0]->nzd_up }}</td>
            <td>{{ $limitData[0]->nzd_down }}</td>
            <td>{{ $limitData[0]->nzd_downlimit }}</td>
            <td>{{ $limitData[0]->nzd_forecast }}</td>
        </tr>
        </tr>

        <tr>
            <td>CAD</td>
            <td>{{ $limitData[0]->cad_uplimit }}</td>
            <td>{{ $limitData[0]->cad_up }}</td>
            <td>{{ $limitData[0]->cad_down }}</td>
            <td>{{ $limitData[0]->cad_downlimit }}</td>
            <td>{{ $limitData[0]->cad_forecast }}</td>
        </tr>

        <tr>
            <td>CHF</td>
            <td>{{ $limitData[0]->chf_uplimit }}</td>
            <td>{{ $limitData[0]->chf_up }}</td>
            <td>{{ $limitData[0]->chf_down }}</td>
            <td>{{ $limitData[0]->chf_downlimit }}</td>
            <td>{{ $limitData[0]->chf_forecast }}</td>
        </tr>

        <tr>
            <td>JPY</td>
            <td>{{ $limitData[0]->jpy_uplimit }}</td>
            <td>{{ $limitData[0]->jpy_up }}</td>
            <td>{{ $limitData[0]->jpy_down }}</td>
            <td>{{ $limitData[0]->jpy_downlimit }}</td>
            <td>{{ $limitData[0]->jpy_forecast }}</td>
        </tr>

    </tbody>
</table>
