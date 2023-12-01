//Se obtiene el valor de la URL desde el navegador
var url = window.location + "";
var separador = url.split("/");
var traderID = separador[separador.length - 1];
var boton_select = "";

am5.ready(function () {
    var root = am5.Root.new("jornadasData");

    root.setThemes([am5themes_Animated.new(root)]);

    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
            pinchZoomX: true,
        })
    );

    chart.get("colors").set("step", 5);

    var cursor = chart.set(
        "cursor",
        am5xy.XYCursor.new(root, {
            behavior: "none",
        })
    );
    cursor.lineY.set("visible", false);

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

    var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {
                pan:"zoom"
              })

        })
    );

    var series1 = chart.series.push(
        am5xy.LineSeries.new(root, {
            name: "Profit",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "profit", // Cambiado a "profit" en lugar de "open"
            valueXField: "date",
            stroke: "#00f",
            fill: "#00f4",
            tooltip: am5.Tooltip.new(root, {
                labelText: "Profit: {valueY}",
            }),
        })
    );

    chart.set(
        "scrollbarX",
        am5.Scrollbar.new(root, {
            orientation: "horizontal",
        })
    );


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
                } else if (boton_select == "balance_equity") {
                    setDataBalanceEquity(traderID, fecha_inicio, fecha_fin);
                } else if (boton_select == "balance_margen_libre") {
                    setDataBalanceMargenLibre(
                        traderID,
                        fecha_inicio,
                        fecha_fin
                    );
                } else if (boton_select == "equity_margen_libre") {
                    setDataEquityMargenLibre(traderID, fecha_inicio, fecha_fin);
                } else if (boton_select == "balance") {
                    setDataBalance(traderID, fecha_inicio, fecha_fin);
                } else if (boton_select == "equity") {
                    setDataEquity(traderID, fecha_inicio, fecha_fin);
                } else if (boton_select == "margen_libre") {
                    setDataMargenLibre(traderID, fecha_inicio, fecha_fin);
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

    //Al hacer un cambio en sessionSelect hacer cambios en el grafico
    $(document).on("change", "#sessionSelect", () => {
        let session = $("#sessionSelect").val();
        let portfolio = $("#portfolioSelect").val();

        if (portfolio == 0) {
        $.get({
            url: "/admin/getSessionJornadas",
            data: {
                id: traderID,
                session: session,
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
                
            
       
    }
    );

    
    //Al hacer un cambio en portfolioSelect hacer cambios en el grafico
    $(document).on("change", "#portfolioSelect", () => {
        let portfolio = $("#portfolioSelect").val();
        let session = $("#sessionSelect").val();
      

        if (session == 0) {
            $.get({
                url: "/admin/getSessionPortfolio",
                data: {
                    id: traderID,
                    portfolio: portfolio,
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


    
}); // end am5.ready()
