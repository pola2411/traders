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

    let hoy = new Date();

    let inicio = new Date(hoy.getFullYear(), 0, 1);

    let fechaInicio_inicio =
        inicio.getFullYear() +
        "-0" +
        (inicio.getMonth() + 1) +
        "-0" +
        inicio.getDate() +
        " 0" +
        inicio.getHours() +
        ":0" +
        inicio.getMinutes() +
        ":0" +
        inicio.getSeconds();

    let mes = "";
    let dia = "";
    let horas = "";
    let minutos = "";
    let segundos = "";

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

    let fechaFin_inicio =
        hoy.getFullYear() + mes + dia + " " + "23" + ":59" + ":00";

    let semana = moment(hoy.getFullYear() + mes + dia, "YYYYMMDD").isoWeek();
    let inicio_semana = moment()
        .isoWeek(semana)
        .startOf("isoweek")
        .format("YYYY-MM-DD HH:mm:ss");
    let fin_semana = moment()
        .isoWeek(semana)
        .startOf("isoweek")
        .add(5, "days")
        .subtract(1, "minutes")
        .format("YYYY-MM-DD HH:mm:ss");

    $("#fechaDesdeInput").val(inicio_semana);
    $("#fechaHastaInput").val(fin_semana);

    const margenFunction = (id, inicio, fin) => {
        $.get({
            url: "/admin/showMargen",
            data: { id: id, inicio: inicio, fin: fin },
            success: function (response) {
                var data = [];
                $("#numeroTrader").text(response.tradersNombre[0].nombre);

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

    margenFunction(id, inicio_semana, fin_semana);

    $(document).on("click", "#obtenerRegistros", () => {
        let fecha_inicio = $("#fechaDesdeInput").val();
        let fecha_fin = $("#fechaHastaInput").val();

        if (fecha_inicio.length > 0 && fecha_fin.length > 0) {
            if (fecha_inicio > fecha_fin) {
                $("#fechaDesdeInput").val(0);
                $("#fechaHastaInput").val(0);
                Swal.fire({
                    icon: "warning",
                    title: '<h1 style="font-family: Poppins; font-weight: 700;">Error en fechas</h1>',
                    html: '<p style="font-family: Poppins">La fecha de inicio debe de ser menor a la fecha de fin.</p>',
                    confirmButtonText:
                        '<a style="font-family: Poppins">Aceptar</a>',
                    confirmButtonColor: "#01bbcc",
                });
            } else {
                margenFunction(id, fecha_inicio, fecha_fin);
            }
        } else {
            Swal.fire({
                icon: "warning",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
                html: '<p style="font-family: Poppins">Debes de seleccionar dos fechas.</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    chart.appear(1000, 100);
}); // end am5.ready()
