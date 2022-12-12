// let sound = new Audio("../../audio/alarma.mp3");
// $("#bocinaEncendida").click(function () {
//     $("#bocinaEncendida").addClass("d-none");
//     $("#bocinaApagada").removeClass("d-none");
//     sound.pause();
// });
// $("#bocinaApagada").click(function () {
//     $("#bocinaApagada").addClass("d-none");
//     $("#bocinaEncendida").removeClass("d-none");
// });

//Se obtiene el valor de la URL desde el navegador
var url = window.location + "";
var separador = url.split("/");
var id = separador[separador.length - 1];

am5.ready(function () {
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([am5themes_Animated.new(root)]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
            pinchZoomX: true,
        })
    );

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    var cursor = chart.set(
        "cursor",
        am5xy.XYCursor.new(root, {
            behavior: "none",
        })
    );
    cursor.lineY.set("visible", false);

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(
        am5xy.DateAxis.new(root, {
            maxDeviation: 0.2,
            baseInterval: {
                timeUnit: "minute",
                count: 1,
            },
            renderer: am5xy.AxisRendererX.new(root, {}),
            tooltip: am5.Tooltip.new(root, {}),
        })
    );

    var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {}),
        })
    );

    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(
        am5xy.LineSeries.new(root, {
            name: "Series",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            valueXField: "date",
            tooltip: am5.Tooltip.new(root, {
                labelText: "Margin: {valueY}",
            }),
        })
    );

    // Add scrollbar
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    chart.set(
        "scrollbarX",
        am5.Scrollbar.new(root, {
            orientation: "horizontal",
        })
    );

    const margenFunction = () => {
        $.get({
            url: "/admin/showMargen",
            data: { id: id },
            success: function (response) {
                var data = [];
                $("#numeroTrader").text(response.tradersNombre[0].nombre + " (ÚLITMA HORA)");

                response.traders.map(function (trader) {
                    data.push({
                        date: new Date(trader.fecha).getTime(),
                        value: trader.margin,
                    });
                    series.data.setAll(data);
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
    };

    margenFunction();

    // obtener data al iniciar
    setInterval(function () {
        margenFunction();
    }, 60000);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    chart.appear(1000, 100);
}); // end am5.ready()
