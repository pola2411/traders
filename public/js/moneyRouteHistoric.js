$(document).ready(function () {
    let hoy = new Date();

    let mes = "";
    let dia = "";

    if (hoy.getMonth().toString().length == 1) {
        mes = "-0" + (hoy.getMonth() + 1);
    } else {
        mes = "-" + (hoy.getMonth() + 1);
    }
    if (hoy.getDate().toString().length == 1) {
        dia = "-0" + hoy.getDate();
    } else {
        dia = "-" + hoy.getDate();
    }

    if (hoy.getHours().toString().length == 1) {
        horas = "0" + hoy.getHours();
    } else {
        horas = "" + hoy.getHours();
    }
    if (hoy.getSeconds().toString().length == 1) {
        segundos = ":0" + hoy.getSeconds();
    } else {
        segundos = ":" + hoy.getSeconds();
    }
    if (hoy.getMinutes().toString().length == 1) {
        minutos = ":0" + hoy.getMinutes();
    } else {
        minutos = ":" + hoy.getMinutes();
    }

    let semana = moment(hoy.getFullYear() + mes + dia, "YYYYMMDD").isoWeek();
    let inicio_semana = moment()
        .isoWeek(semana)
        .startOf("isoweek")
        .format("YYYY-MM-DD HH:mm:ss");
    let fin_semana = moment()
        .isoWeek(semana)
        .startOf("isoweek")
        .add(4, "days")
        .subtract(15, "minutes")
        .format("YYYY-MM-DD HH:mm:ss");
    let today = moment().subtract(15, "minutes").format("YYYY-MM-DD HH:mm");

    $("#fechaDesdeInput").val(today);
});

$("#moneyRouteHistoric").on("submit", function (e) {
    e.preventDefault();

    var fecha_desde = $("#fechaDesdeInput").val();
    var fecha_eje = $("#fechaEjeInput").val();

    let labels = [];

    let valores_eurusd = [];
    let valor_eurusd = 0;

    let valores_gbpusd = [];
    let valor_gbpusd = 0;

    let valores_audusd = [];
    let valor_audusd = 0;

    let valores_nzdusd = [];
    let valor_nzdusd = 0;

    let valores_usdcad = [];
    let valor_usdcad = 0;

    let valores_usdchf = [];
    let valor_usdchf = 0;

    let valores_usd = [];
    let valor_usd = 0;

    let valores_usdjpy = [];
    let valor_usdjpy = 0;

    $("#spinner").html(`
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Cargando gráfica...</span>
        </div>
    `);

    function updateChart() {
        //GRAFICO MONEDAS HISTORICO

        $.get({
            url: "/admin/getMoneyRoute",
            data: {
                fecha_desde: fecha_desde,
                fecha_eje: fecha_eje,
                moneda: "EUR",
            },
            success: function (response) {
                response.currencies.map(function (currency, i, row) {
                    eje = response.valor_eje;

                    var moneda = currency.moneda;

                    valor_eurusd = currency.valor;

                    labels.push(
                        moment(currency.hora).format("DD/MM/YYYY HH:mm")
                    );
                    valores_eurusd.push(valor_eurusd);
                });

                $.get({
                    url: "/admin/getMoneyRoute",
                    data: {
                        fecha_desde: fecha_desde,
                        fecha_eje: fecha_eje,
                        moneda: "GBP",
                    },
                    success: function (response) {
                        response.currencies.map(function (currency, i, row) {
                            eje = response.valor_eje;

                            var moneda = currency.moneda;

                            valor_gbpusd = currency.valor;

                            valores_gbpusd.push(valor_gbpusd);
                        });

                        $.get({
                            url: "/admin/getMoneyRoute",
                            data: {
                                fecha_desde: fecha_desde,
                                fecha_eje: fecha_eje,
                                moneda: "USD",
                            },
                            success: function (response) {
                                response.currencies.map(function (
                                    currency,
                                    i,
                                    row
                                ) {
                                    eje = response.valor_eje;

                                    var moneda = currency.moneda;

                                    valor_usd = currency.valor;

                                    valores_usd.push(valor_usd);
                                });

                                $.get({
                                    url: "/admin/getMoneyRoute",
                                    data: {
                                        fecha_desde: fecha_desde,
                                        fecha_eje: fecha_eje,
                                        moneda: "AUD",
                                    },
                                    success: function (response) {
                                        response.currencies.map(function (
                                            currency,
                                            i,
                                            row
                                        ) {
                                            eje = response.valor_eje;

                                            var moneda = currency.moneda;

                                            valor_audusd = currency.valor;

                                            valores_audusd.push(valor_audusd);
                                        });

                                        $.get({
                                            url: "/admin/getMoneyRoute",
                                            data: {
                                                fecha_desde: fecha_desde,
                                                fecha_eje: fecha_eje,
                                                moneda: "NZD",
                                            },
                                            success: function (response) {
                                                response.currencies.map(
                                                    function (
                                                        currency,
                                                        i,
                                                        row
                                                    ) {
                                                        eje =
                                                            response.valor_eje;

                                                        var moneda =
                                                            currency.moneda;

                                                        valor_nzdusd =
                                                            currency.valor;

                                                        valores_nzdusd.push(
                                                            valor_nzdusd
                                                        );
                                                    }
                                                );

                                                $.get({
                                                    url: "/admin/getMoneyRoute",
                                                    data: {
                                                        fecha_desde:
                                                            fecha_desde,
                                                        fecha_eje: fecha_eje,
                                                        moneda: "CAD",
                                                    },
                                                    success: function (
                                                        response
                                                    ) {
                                                        response.currencies.map(
                                                            function (
                                                                currency,
                                                                i,
                                                                row
                                                            ) {
                                                                eje =
                                                                    response.valor_eje;

                                                                var moneda =
                                                                    currency.moneda;

                                                                valor_usdcad =
                                                                    currency.valor;

                                                                valores_usdcad.push(
                                                                    valor_usdcad
                                                                );
                                                            }
                                                        );

                                                        $.get({
                                                            url: "/admin/getMoneyRoute",
                                                            data: {
                                                                fecha_desde:
                                                                    fecha_desde,
                                                                fecha_eje:
                                                                    fecha_eje,
                                                                moneda: "CHF",
                                                            },
                                                            success: function (
                                                                response
                                                            ) {
                                                                response.currencies.map(
                                                                    function (
                                                                        currency,
                                                                        i,
                                                                        row
                                                                    ) {
                                                                        eje =
                                                                            response.valor_eje;

                                                                        var moneda =
                                                                            currency.moneda;

                                                                        valor_usdchf =
                                                                            currency.valor;

                                                                        valores_usdchf.push(
                                                                            valor_usdchf
                                                                        );
                                                                    }
                                                                );

                                                                $.get({
                                                                    url: "/admin/getMoneyRoute",
                                                                    data: {
                                                                        fecha_desde:
                                                                            fecha_desde,
                                                                        fecha_eje:
                                                                            fecha_eje,
                                                                        moneda: "JPY",
                                                                    },
                                                                    success:
                                                                        function (
                                                                            response
                                                                        ) {
                                                                            response.currencies.map(
                                                                                function (
                                                                                    currency,
                                                                                    i,
                                                                                    row
                                                                                ) {
                                                                                    eje =
                                                                                        response.valor_eje;

                                                                                    var moneda =
                                                                                        currency.moneda;

                                                                                    valor_usdjpy =
                                                                                        currency.valor;

                                                                                    valores_usdjpy.push(
                                                                                        valor_usdjpy
                                                                                    );
                                                                                }
                                                                            );

                                                                            // <button id="reset" class="btn btn-primary">Resetear zoom</button>

                                                                            $(
                                                                                "#spinner"
                                                                            )
                                                                                .html(`
                                                                <canvas id="myChart" class="mt-3"></canvas>
                                                            `);

                                                                            const chart =
                                                                                new CanvasJS.Chart(
                                                                                    "chartContainer",
                                                                                    {
                                                                                        animationEnabled: true,
                                                                                        zoomEnabled: true,
                                                                                        title: {
                                                                                            text: "Money Route Historical",
                                                                                        },
                                                                                        axisX: {
                                                                                            valueFormatString:
                                                                                                "MMM DD",
                                                                                        },
                                                                                        axisY: {
                                                                                            title: "Valor", // Título del eje Y
                                                                                        },

                                                                                        legend: {
                                                                                            cursor: "pointer",
                                                                                            itemclick:
                                                                                                toggleDataSeries,
                                                                                        },
                                                                                        data: [
                                                                                            {
                                                                                                type: "line",
                                                                                                lineColor:
                                                                                                    "#A2FF86",
                                                                                                color: "#A2FF86",
                                                                                                name: "EUR",
                                                                                                showInLegend: true,

                                                                                                dataPoints:
                                                                                                    valores_eurusd.map(
                                                                                                        (
                                                                                                            value,

                                                                                                            index
                                                                                                        ) => {
                                                                                                            const dateParts =
                                                                                                                labels[
                                                                                                                    index
                                                                                                                ].split(
                                                                                                                    /[\s/:]+/
                                                                                                                ); // Dividir la cadena de fecha
                                                                                                            const year =
                                                                                                                parseInt(
                                                                                                                    dateParts[2]
                                                                                                                );
                                                                                                            const month =
                                                                                                                parseInt(
                                                                                                                    dateParts[1]
                                                                                                                ) -
                                                                                                                1;
                                                                                                            const day =
                                                                                                                parseInt(
                                                                                                                    dateParts[0]
                                                                                                                );
                                                                                                            const hour =
                                                                                                                parseInt(
                                                                                                                    dateParts[3]
                                                                                                                );
                                                                                                            const minute =
                                                                                                                parseInt(
                                                                                                                    dateParts[4]
                                                                                                                );
                                                                                                            const dateObject =
                                                                                                                new Date(
                                                                                                                    year,
                                                                                                                    month,
                                                                                                                    day,
                                                                                                                    hour,
                                                                                                                    minute
                                                                                                                );

                                                                                                            const formattedHour =
                                                                                                                hour
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear horas con dos dígitos
                                                                                                            const formattedMinute =
                                                                                                                minute
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear minutos con dos dígitos
                                                                                                            const timeString = `${formattedHour}:${formattedMinute} hrs`;

                                                                                                            return {
                                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`,
                                                                                                                y: value,
                                                                                                            };
                                                                                                        }
                                                                                                    ),
                                                                                            },
                                                                                            {
                                                                                                type: "line",
                                                                                                name: "GBP",
                                                                                                lineColor:
                                                                                                    "#C51605",
                                                                                                color: "#C51605",
                                                                                                showInLegend: true,

                                                                                                dataPoints:
                                                                                                    valores_gbpusd.map(
                                                                                                        (
                                                                                                            value,

                                                                                                            index
                                                                                                        ) => {
                                                                                                            const dateParts =
                                                                                                                labels[
                                                                                                                    index
                                                                                                                ].split(
                                                                                                                    /[\s/:]+/
                                                                                                                ); // Dividir la cadena de fecha
                                                                                                            const year =
                                                                                                                parseInt(
                                                                                                                    dateParts[2]
                                                                                                                );
                                                                                                            const month =
                                                                                                                parseInt(
                                                                                                                    dateParts[1]
                                                                                                                ) -
                                                                                                                1;
                                                                                                            const day =
                                                                                                                parseInt(
                                                                                                                    dateParts[0]
                                                                                                                );
                                                                                                            const hour =
                                                                                                                parseInt(
                                                                                                                    dateParts[3]
                                                                                                                );
                                                                                                            const minute =
                                                                                                                parseInt(
                                                                                                                    dateParts[4]
                                                                                                                );
                                                                                                            const dateObject =
                                                                                                                new Date(
                                                                                                                    year,
                                                                                                                    month,
                                                                                                                    day,
                                                                                                                    hour,
                                                                                                                    minute
                                                                                                                );

                                                                                                            const formattedHour =
                                                                                                                hour
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear horas con dos dígitos
                                                                                                            const formattedMinute =
                                                                                                                minute
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear minutos con dos dígitos
                                                                                                            const timeString = `${formattedHour}:${formattedMinute} hrs`;

                                                                                                            return {
                                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`,
                                                                                                                y: value,
                                                                                                            };
                                                                                                        }
                                                                                                    ),
                                                                                            },
                                                                                            {
                                                                                                type: "line",
                                                                                                name: "USD",
                                                                                                lineColor:
                                                                                                    "#000000",
                                                                                                color: "#000000",
                                                                                                showInLegend: true,

                                                                                                dataPoints:
                                                                                                    valores_usd.map(
                                                                                                        (
                                                                                                            value,

                                                                                                            index
                                                                                                        ) => {
                                                                                                            const dateParts =
                                                                                                                labels[
                                                                                                                    index
                                                                                                                ].split(
                                                                                                                    /[\s/:]+/
                                                                                                                ); // Dividir la cadena de fecha
                                                                                                            const year =
                                                                                                                parseInt(
                                                                                                                    dateParts[2]
                                                                                                                );
                                                                                                            const month =
                                                                                                                parseInt(
                                                                                                                    dateParts[1]
                                                                                                                ) -
                                                                                                                1;
                                                                                                            const day =
                                                                                                                parseInt(
                                                                                                                    dateParts[0]
                                                                                                                );
                                                                                                            const hour =
                                                                                                                parseInt(
                                                                                                                    dateParts[3]
                                                                                                                );
                                                                                                            const minute =
                                                                                                                parseInt(
                                                                                                                    dateParts[4]
                                                                                                                );
                                                                                                            const dateObject =
                                                                                                                new Date(
                                                                                                                    year,
                                                                                                                    month,
                                                                                                                    day,
                                                                                                                    hour,
                                                                                                                    minute
                                                                                                                );

                                                                                                            const formattedHour =
                                                                                                                hour
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear horas con dos dígitos
                                                                                                            const formattedMinute =
                                                                                                                minute
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear minutos con dos dígitos
                                                                                                            const timeString = `${formattedHour}:${formattedMinute} hrs`;

                                                                                                            return {
                                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`,
                                                                                                                y: value,
                                                                                                            };
                                                                                                        }
                                                                                                    ),
                                                                                            },
                                                                                            {
                                                                                                type: "line",
                                                                                                name: "AUD",
                                                                                                lineColor:
                                                                                                    "#0A6EBD",
                                                                                                color: "#0A6EBD",
                                                                                                showInLegend: true,

                                                                                                dataPoints:
                                                                                                    valores_audusd.map(
                                                                                                        (
                                                                                                            value,

                                                                                                            index
                                                                                                        ) => {
                                                                                                            const dateParts =
                                                                                                                labels[
                                                                                                                    index
                                                                                                                ].split(
                                                                                                                    /[\s/:]+/
                                                                                                                ); // Dividir la cadena de fecha
                                                                                                            const year =
                                                                                                                parseInt(
                                                                                                                    dateParts[2]
                                                                                                                );
                                                                                                            const month =
                                                                                                                parseInt(
                                                                                                                    dateParts[1]
                                                                                                                ) -
                                                                                                                1;
                                                                                                            const day =
                                                                                                                parseInt(
                                                                                                                    dateParts[0]
                                                                                                                );
                                                                                                            const hour =
                                                                                                                parseInt(
                                                                                                                    dateParts[3]
                                                                                                                );
                                                                                                            const minute =
                                                                                                                parseInt(
                                                                                                                    dateParts[4]
                                                                                                                );
                                                                                                            const dateObject =
                                                                                                                new Date(
                                                                                                                    year,
                                                                                                                    month,
                                                                                                                    day,
                                                                                                                    hour,
                                                                                                                    minute
                                                                                                                );

                                                                                                            const formattedHour =
                                                                                                                hour
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear horas con dos dígitos
                                                                                                            const formattedMinute =
                                                                                                                minute
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear minutos con dos dígitos
                                                                                                            const timeString = `${formattedHour}:${formattedMinute} hrs`;

                                                                                                            return {
                                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`,
                                                                                                                y: value,
                                                                                                            };
                                                                                                        }
                                                                                                    ),
                                                                                            },
                                                                                            {
                                                                                                type: "line",
                                                                                                name: "NZD",
                                                                                                lineColor:
                                                                                                    "#F1C93B",
                                                                                                color: "#F1C93B",
                                                                                                showInLegend: true,

                                                                                                dataPoints:
                                                                                                    valores_nzdusd.map(
                                                                                                        (
                                                                                                            value,

                                                                                                            index
                                                                                                        ) => {
                                                                                                            const dateParts =
                                                                                                                labels[
                                                                                                                    index
                                                                                                                ].split(
                                                                                                                    /[\s/:]+/
                                                                                                                ); // Dividir la cadena de fecha
                                                                                                            const year =
                                                                                                                parseInt(
                                                                                                                    dateParts[2]
                                                                                                                );
                                                                                                            const month =
                                                                                                                parseInt(
                                                                                                                    dateParts[1]
                                                                                                                ) -
                                                                                                                1;
                                                                                                            const day =
                                                                                                                parseInt(
                                                                                                                    dateParts[0]
                                                                                                                );
                                                                                                            const hour =
                                                                                                                parseInt(
                                                                                                                    dateParts[3]
                                                                                                                );
                                                                                                            const minute =
                                                                                                                parseInt(
                                                                                                                    dateParts[4]
                                                                                                                );
                                                                                                            const dateObject =
                                                                                                                new Date(
                                                                                                                    year,
                                                                                                                    month,
                                                                                                                    day,
                                                                                                                    hour,
                                                                                                                    minute
                                                                                                                );

                                                                                                            const formattedHour =
                                                                                                                hour
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear horas con dos dígitos
                                                                                                            const formattedMinute =
                                                                                                                minute
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear minutos con dos dígitos
                                                                                                            const timeString = `${formattedHour}:${formattedMinute} hrs`;

                                                                                                            return {
                                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`,
                                                                                                                y: value,
                                                                                                            };
                                                                                                        }
                                                                                                    ),
                                                                                            },
                                                                                            {
                                                                                                type: "line",
                                                                                                name: "CAD",
                                                                                                lineColor:
                                                                                                    "#97FEED",
                                                                                                color: "#97FEED",
                                                                                                showInLegend: true,

                                                                                                dataPoints:
                                                                                                    valores_usdcad.map(
                                                                                                        (
                                                                                                            value,

                                                                                                            index
                                                                                                        ) => {
                                                                                                            const dateParts =
                                                                                                                labels[
                                                                                                                    index
                                                                                                                ].split(
                                                                                                                    /[\s/:]+/
                                                                                                                ); // Dividir la cadena de fecha
                                                                                                            const year =
                                                                                                                parseInt(
                                                                                                                    dateParts[2]
                                                                                                                );
                                                                                                            const month =
                                                                                                                parseInt(
                                                                                                                    dateParts[1]
                                                                                                                ) -
                                                                                                                1;
                                                                                                            const day =
                                                                                                                parseInt(
                                                                                                                    dateParts[0]
                                                                                                                );
                                                                                                            const hour =
                                                                                                                parseInt(
                                                                                                                    dateParts[3]
                                                                                                                );
                                                                                                            const minute =
                                                                                                                parseInt(
                                                                                                                    dateParts[4]
                                                                                                                );
                                                                                                            const dateObject =
                                                                                                                new Date(
                                                                                                                    year,
                                                                                                                    month,
                                                                                                                    day,
                                                                                                                    hour,
                                                                                                                    minute
                                                                                                                );

                                                                                                            const formattedHour =
                                                                                                                hour
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear horas con dos dígitos
                                                                                                            const formattedMinute =
                                                                                                                minute
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear minutos con dos dígitos
                                                                                                            const timeString = `${formattedHour}:${formattedMinute} hrs`;

                                                                                                            return {
                                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`,
                                                                                                                y: value,
                                                                                                            };
                                                                                                        }
                                                                                                    ),
                                                                                            },
                                                                                            {
                                                                                                type: "line",
                                                                                                name: "CHF",
                                                                                                lineColor:
                                                                                                    "#F86F03",
                                                                                                color: "#F86F03",
                                                                                                showInLegend: true,

                                                                                                dataPoints:
                                                                                                    valores_usdchf.map(
                                                                                                        (
                                                                                                            value,

                                                                                                            index
                                                                                                        ) => {
                                                                                                            const dateParts =
                                                                                                                labels[
                                                                                                                    index
                                                                                                                ].split(
                                                                                                                    /[\s/:]+/
                                                                                                                ); // Dividir la cadena de fecha
                                                                                                            const year =
                                                                                                                parseInt(
                                                                                                                    dateParts[2]
                                                                                                                );
                                                                                                            const month =
                                                                                                                parseInt(
                                                                                                                    dateParts[1]
                                                                                                                ) -
                                                                                                                1;
                                                                                                            const day =
                                                                                                                parseInt(
                                                                                                                    dateParts[0]
                                                                                                                );
                                                                                                            const hour =
                                                                                                                parseInt(
                                                                                                                    dateParts[3]
                                                                                                                );
                                                                                                            const minute =
                                                                                                                parseInt(
                                                                                                                    dateParts[4]
                                                                                                                );
                                                                                                            const dateObject =
                                                                                                                new Date(
                                                                                                                    year,
                                                                                                                    month,
                                                                                                                    day,
                                                                                                                    hour,
                                                                                                                    minute
                                                                                                                );

                                                                                                            const formattedHour =
                                                                                                                hour
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear horas con dos dígitos
                                                                                                            const formattedMinute =
                                                                                                                minute
                                                                                                                    .toString()
                                                                                                                    .padStart(
                                                                                                                        2,
                                                                                                                        "0"
                                                                                                                    ); // Formatear minutos con dos dígitos
                                                                                                            const timeString = `${formattedHour}:${formattedMinute} hrs`;

                                                                                                            return {
                                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`,
                                                                                                                y: value,
                                                                                                            };
                                                                                                        }
                                                                                                    ),
                                                                                            },
                                                                                            {
                                                                                                type: "line",
                                                                                                name: "JPY",
                                                                                                lineColor:
                                                                                                    "#1A5D1A",
                                                                                                color: "#1A5D1A",
                                                                                                showInLegend: true,

                                                                                                dataPoints:
                                                                                                    valores_usdjpy.map(
                                                                                                        (
                                                                                                            value,

                                                                                                            index
                                                                                                        ) => {
                                                                                                            const dateParts =
                                                                                                                labels[
                                                                                                                    index
                                                                                                                ].split(
                                                                                                                    /[\s/:]+/
                                                                                                                ); // Dividir la cadena de fecha
                                                                                                            const year =
                                                                                                                parseInt(
                                                                                                                    dateParts[2]
                                                                                                                );
                                                                                                            const month =
                                                                                                                parseInt(
                                                                                                                    dateParts[1]
                                                                                                                ) -
                                                                                                                1;
                                                                                                            const day =
                                                                                                                parseInt(
                                                                                                                    dateParts[0]
                                                                                                                );
                                                                                                            const hour =
                                                                                                                parseInt(
                                                                                                                    dateParts[3]
                                                                                                                ) +
                                                                                                                (dateParts[4].toLowerCase() ===
                                                                                                                "pm"
                                                                                                                    ? 12
                                                                                                                    : 0);
                                                                                                            const minute =
                                                                                                                parseInt(
                                                                                                                    dateParts[4]
                                                                                                                );
                                                                                                            const dateObject =
                                                                                                                new Date(
                                                                                                                    year,
                                                                                                                    month,
                                                                                                                    day,
                                                                                                                    hour,
                                                                                                                    minute
                                                                                                                );

                                                                                                            const options =
                                                                                                                {
                                                                                                                    hour12: true,
                                                                                                                    hour: "numeric",
                                                                                                                    minute: "numeric",
                                                                                                                    second: "numeric",
                                                                                                                };
                                                                                                            const timeString =
                                                                                                                dateObject.toLocaleTimeString(
                                                                                                                    undefined,
                                                                                                                    options
                                                                                                                );

                                                                                                            return {
                                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`, // Mostrar fecha y hora con AM/PM en el tooltip
                                                                                                                y: value,
                                                                                                            };
                                                                                                        }
                                                                                                    ),
                                                                                            },
                                                                                        ],
                                                                                    }
                                                                                );

                                                                            chart.render();

                                                                            function toggleDataSeries(
                                                                                e
                                                                            ) {
                                                                                if (
                                                                                    typeof e
                                                                                        .dataSeries
                                                                                        .visible ===
                                                                                        "undefined" ||
                                                                                    e
                                                                                        .dataSeries
                                                                                        .visible
                                                                                ) {
                                                                                    e.dataSeries.visible = false;
                                                                                } else {
                                                                                    e.dataSeries.visible = true;
                                                                                }
                                                                                chart.render();
                                                                            }
                                                                        },

                                                                    error: function (
                                                                        error
                                                                    ) {
                                                                        console.log(
                                                                            error
                                                                        );
                                                                    },
                                                                });
                                                            },
                                                            error: function (
                                                                error
                                                            ) {
                                                                console.log(
                                                                    error
                                                                );
                                                            },
                                                        });
                                                    },
                                                    error: function (error) {
                                                        console.log(error);
                                                    },
                                                });
                                            },
                                            error: function (error) {
                                                console.log(error);
                                            },
                                        });
                                    },
                                    error: function (error) {
                                        console.log(error);
                                    },
                                });
                            },
                            error: function (error) {
                                console.log(error);
                            },
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
    // Llama a la función para cargar los datos por primera vez
    updateChart();

    // Llama a la función para actualizar los datos cada minuto
    setInterval(updateChart, 60000);
});
