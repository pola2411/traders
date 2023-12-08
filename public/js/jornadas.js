//Se obtiene el valor de la URL desde el navegador
var url = window.location + "";
var separador = url.split("/");
var traderID = separador[separador.length - 1];
var boton_select = "";

//Se obtiene el valor de la URL desde el navegador
var url = window.location + "";
var separador = url.split("/");
var traderID = separador[separador.length - 1];
var boton_select = "";

am5.ready(function () {
  // Crea el objeto Root
  var root = am5.Root.new("jornadasData");

  // Establece el tema animado
  root.setThemes([am5themes_Animated.new(root)]);

  // Crea un gráfico XY
  var chart = root.container.children.push(
    am5xy.XYChart.new(root, {
      panX: true,
      panY: true,
      wheelX: "panX",
      wheelY: "zoomX",
      pinchZoomX: true,
    })
  );

  // Configuración del gráfico
  chart.get("colors").set("step", 5);

  var cursor = chart.set(
    "cursor",
    am5xy.XYCursor.new(root, {
      behavior: "none",
    })
  );
  cursor.lineY.set("visible", false);
  var accumulatedProfit = 0;
  var xAxis = chart.xAxes.push(
    am5xy.DateAxis.new(root, {
      baseInterval: {
        timeUnit: "minute",
        count: 1,
      },
      renderer: am5xy.AxisRendererX.new(root, {
        minorGridEnabled:true
      }),
      tooltip: am5.Tooltip.new(root, {}),
    })
  );
  
  xAxis.title = "Hora del día";

  

  var yAxis = chart.yAxes.push(
    am5xy.ValueAxis.new(root, {
      renderer: am5xy.AxisRendererY.new(root, {
        pan: "zoom",
      }),
    })
  );

  //Crea una serie de línea
  var series1 = chart.series.push(
    am5xy.LineSeries.new(root, {
      name: "Profit",
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "profit",
      valueXField: "date",
      stroke: "#00f",
      fill: "#00f4",
      tooltip: am5.Tooltip.new(root, {
        labelText: "Profit: {valueY} \nAccumulated Profit: {accumulatedProfit}",
      }),
    })
  );

  // Crea un círculo para cada punto de datos
  series1.populateBullets = function (dataItem) {
    // Create a bullet for each data item
    var bullet = am5.Circle.new(root, {
      radius: 5,
      fill: "#00f",
    });

    bullet.set("centerX", dataItem.get("valueX"));
    bullet.set("centerY", dataItem.get("valueY"));

    // Add the bullet to the series
    series1.bullets.push(bullet);

    // Create a hover event for the bullet
    bullet.on("over", function () {
      bullet.animate({
        radius: 20,
      }, 500);
    });

    bullet.on("out", function () {
      bullet.animate({
        radius: 5,
      }, 500);
    });
  };

  // Asegúrate de que el eje Y esté configurado para el cursor
  chart.yAxes.values[0].set("cursorTooltipEnabled", true);

  // Agrega un Tooltip al cursor
  cursor.set(
    "tooltip",
    am5.Tooltip.new(root, {
      getTooltipHTML: function (data) {
        return "Profit: " + data.point.get("valueY");
      },
    })
  );

    let hoy = new Date();

    let mes =
        hoy.getMonth().toString().length == 1
            ? "-0" + (hoy.getMonth() + 1)
            : "-" + (hoy.getMonth() + 1);
    let dia =
        hoy.getDate().toString().length == 1
            ? "-0" + hoy.getDate()
            : "-" + hoy.getDate();
    let horas =
        hoy.getHours().toString().length == 1
            ? "0" + hoy.getHours()
            : "" + hoy.getHours();
    let segundos =
        hoy.getSeconds().toString().length == 1
            ? ":0" + hoy.getSeconds()
            : ":" + hoy.getSeconds();
    let minutos =
        hoy.getMinutes().toString().length == 1
            ? ":0" + hoy.getMinutes()
            : ":" + hoy.getMinutes();

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

    function setData(traderID, inicio, fin) {
        $.get({
            url: "/admin/getJornadas",
            data: {
                id: traderID,
                inicio: inicio,
                fin: fin,
            },
            success: function (response) {
                var data = [];
                $("#numeroTrader").text(response.jornadasNombre[0].nombre);

                response.jornadas.map(function (trader) {
                    accumulatedProfit += trader.profit;
                    data.push({
                        date: new Date(trader.time_1).getTime(),
                        profit: trader.profit,
                        accumulatedProfit: accumulatedProfit,
                    });
                });

                series1.data.setAll(data);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    setData(traderID, inicio_semana, fin_semana);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series1.appear(1000);
    chart.appear(1000, 100);

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
                if (boton_select == "todo") {
                    setData(traderID, fecha_inicio, fecha_fin);
                } else {
                    setData(traderID, fecha_inicio, fecha_fin);
                }
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

    $(document).on("change", "#sessionSelect", () => {
        let session = $("#sessionSelect").val();
        let portfolio = $("#portfolioSelect").val();
        let fecha_inicio = $("#fechaDesdeInput").val();
        let fecha_fin = $("#fechaHastaInput").val();

        if (portfolio == 0) {
            $.get({
                url: "/admin/getSessionJornadas",
                data: {
                    id: traderID,
                    session: session,
                    inicio: fecha_inicio,
                    fin: fecha_fin,
                },
                success: function (response) {
                    var data = [];
                    $("#numeroTrader").text(response.jornadasNombre[0].nombre);

                    response.jornadas.map(function (trader) {
                        data.push({
                            date: new Date(trader.time_1).getTime(),
                            profit: trader.profit,
                        });
                    });

                    series1.data.setAll(data);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        } else {
            $.get({
                url: "/admin/getJornadasSP",
                data: {
                    id: traderID,
                    portfolio: portfolio,
                    session: session,
                    inicio: fecha_inicio,
                    fin: fecha_fin,
                },
                success: function (response) {
                    var data = [];
                    $("#numeroTrader").text(response.jornadasNombre[0].nombre);

                    response.jornadas.map(function (trader) {
                        data.push({
                            date: new Date(trader.time_1).getTime(),
                            profit: trader.profit,
                        });
                    });

                    series1.data.setAll(data);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    });

    $(document).on("change", "#portfolioSelect", () => {
        let portfolio = $("#portfolioSelect").val();
        let session = $("#sessionSelect").val();
        let fecha_inicio = $("#fechaDesdeInput").val();
        let fecha_fin = $("#fechaHastaInput").val();

        if (session == 0) {
            $.get({
                url: "/admin/getSessionPortfolio",
                data: {
                    id: traderID,
                    portfolio: portfolio,
                    inicio: fecha_inicio,
                    fin: fecha_fin,
                },
                success: function (response) {
                    var data = [];
                    $("#numeroTrader").text(response.jornadasNombre[0].nombre);

                    response.jornadas.map(function (trader) {
                        data.push({
                            date: new Date(trader.time_1).getTime(),
                            profit: trader.profit,
                        });
                    });

                    series1.data.setAll(data);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        } else {
            $.get({
                url: "/admin/getJornadasSP",
                data: {
                    id: traderID,
                    portfolio: portfolio,
                    session: session,
                    inicio: fecha_inicio,
                    fin: fecha_fin,
                },
                success: function (response) {
                    var data = [];
                    $("#numeroTrader").text(response.jornadasNombre[0].nombre);

                    response.jornadas.map(function (trader) {
                        data.push({
                            date: new Date(trader.time_1).getTime(),
                            profit: trader.profit,
                        });
                    });

                    series1.data.setAll(data);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    });

    $(document).on("change", "#symbolSelect", () => {
        let portfolio = $("#portfolioSelect").val();
        let session = $("#sessionSelect").val();
        let symbol = $("#symbolSelect").val();
        let fecha_inicio = $("#fechaDesdeInput").val();
        let fecha_fin = $("#fechaHastaInput").val();

        if (session == 0 && portfolio == 0) {
            $.get({
                url: "/admin/getSessionMonedas",
                data: {
                    id: traderID,
                    symbol: symbol,
                    inicio: fecha_inicio,
                    fin: fecha_fin,
                },
                success: function (response) {
                    var data = [];
                    $("#numeroTrader").text(response.jornadasNombre[0].nombre);

                    response.jornadas.map(function (trader) {
                        data.push({
                            date: new Date(trader.time_1).getTime(),
                            profit: trader.profit,
                        });
                    });

                    series1.data.setAll(data);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        } else {
            $.get({
                url: "/admin/getJornadasSPM",
                data: {
                    id: traderID,
                    portfolio: portfolio,
                    session: session,
                    symbol: symbol,
                    inicio: fecha_inicio,
                    fin: fecha_fin,
                },
                success: function (response) {
                    var data = [];
                    $("#numeroTrader").text(response.jornadasNombre[0].nombre);

                    response.jornadas.map(function (trader) {
                        data.push({
                            date: new Date(trader.time_1).getTime(),
                            profit: trader.profit,
                        });
                    });

                    series1.data.setAll(data);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    });

    $(document).on("click", "#resetRegistros", () => {
        $("#fechaDesdeInput").val(inicio_semana);4
        $("#fechaHastaInput").val(fin_semana);
        $("#sessionSelect").val(0);
        $("#portfolioSelect").val(0);
        $("#symbolSelect").val(0);
        setData(traderID, inicio_semana, fin_semana);

    });
}); // end am5.ready()
