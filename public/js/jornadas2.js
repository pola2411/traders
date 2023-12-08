//Se obtiene el valor de la URL desde el navegador
var url = window.location + "";
var separador = url.split("/");
var traderID = separador[separador.length - 1];
var boton_select = "";

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
        url: "/admin/getJornadasAcum",
        data: {
            id: traderID,
            inicio: inicio,
            fin: fin,
        },
        success: function (response) {
            var dps = [];
            var cumulativeSum = 0;

            response.jornadas.map(function (port) {
                cumulativeSum += port.profit;

                dps.push({
                    x: new Date(port.time_1),
                    y: cumulativeSum,
                    cumulativeSum: cumulativeSum, // Agrega la variable de suma acumulada
                    time: port.time_1,
                    profit: port.profit,
                });
            });
            if (dps.length == 0) {
                Swal.fire({
                    icon: "warning",
                    title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
                    html: '<p style="font-family: Poppins">No se encontraron datos para graficar</p>',
                    confirmButtonText:
                        '<a style="font-family: Poppins">Aceptar</a>',
                    confirmButtonColor: "#01bbcc",
                });
            } else {
                var options = {
                    animationEnabled: true,
                    title: {
                        text: "",
                    },
                    axisX: {
                        title: "Time",
                        valueFormatString: "DD/MM/YYYY HH:mm:ss",
                        labelFontSize: 14,
                    },
                    axisY: {
                        title: "Profit",
                        labelFontSize: 14,
                    },
                    data: [
                        {
                            type: "spline",
                            dataPoints: dps,
                            toolTipContent:
                                "Fecha: {x} <br> Profit: {profit} <br> Suma Acumulada: {cumulativeSum} ",
                        },
                    ],
                };
                var chart = new CanvasJS.Chart("chartContainer", options);
                chart.render();
            }
        },
        error: function (error) {
            console.log(error);
        },
    });
}

setData(traderID, inicio_semana, fin_semana);

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
            confirmButtonText: '<a style="font-family: Poppins">Aceptar</a>',
            confirmButtonColor: "#01bbcc",
        });
    }
});

//Al hacer un cambio en sessionSelect hacer cambios en el grafico
$(document).on("change", "#sessionSelect", () => {
    let session = $("#sessionSelect").val();
    let portfolio = $("#portfolioSelect").val();
    let fecha_inicio = $("#fechaDesdeInput").val();
    let fecha_fin = $("#fechaHastaInput").val();

    if (portfolio == 0) {
        $.get({
            url: "/admin/getSessionJornadasAcum",
            data: {
                id: traderID,
                session: session,
                inicio: fecha_inicio,
                fin: fecha_fin,
            },
            success: function (response) {
                var dps = [];
                var cumulativeSum = 0;

                response.jornadas.map(function (port) {
                    cumulativeSum += port.profit;

                    dps.push({
                        x: new Date(port.time_1),
                        y: cumulativeSum,
                        cumulativeSum: cumulativeSum, // Agrega la variable de suma acumulada
                        time: port.time_1,
                        profit: port.profit,
                    });
                });
                if (dps.length == 0) {
                    Swal.fire({
                        icon: "warning",
                        title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
                        html: '<p style="font-family: Poppins">No se encontraron datos para graficar</p>',
                        confirmButtonText:
                            '<a style="font-family: Poppins">Aceptar</a>',
                        confirmButtonColor: "#01bbcc",
                    });
                } else {
                    var options = {
                        animationEnabled: true,
                        title: {
                            text: "",
                        },
                        axisX: {
                            title: "Time",
                            valueFormatString: "DD/MM/YYYY HH:mm:ss",
                            labelFontSize: 14,
                        },
                        axisY: {
                            title: "Profit",
                            labelFontSize: 14,
                        },
                        data: [
                            {
                                type: "spline",
                                dataPoints: dps,
                                toolTipContent:
                                    "Fecha: {x} <br> Profit: {profit} <br> Suma Acumulada: {cumulativeSum} ",
                            },
                        ],
                    };
                    var chart = new CanvasJS.Chart("chartContainer", options);
                    chart.render();
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    } else {
        $.get({
            url: "/admin/getJornadasSPAcum",
            data: {
                id: traderID,
                session: session,
                portfolio: portfolio,
                inicio: fecha_inicio,
                fin: fecha_fin,
            },
            success: function (response) {
                var dps = [];
                var cumulativeSum = 0;

                response.jornadas.map(function (port) {
                    cumulativeSum += port.profit;

                    dps.push({
                        x: new Date(port.time_1),
                        y: cumulativeSum,
                        cumulativeSum: cumulativeSum, // Agrega la variable de suma acumulada
                        time: port.time_1,
                        profit: port.profit,
                    });
                });
                if (dps.length == 0) {
                    Swal.fire({
                        icon: "warning",
                        title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
                        html: '<p style="font-family: Poppins">No se encontraron datos para graficar</p>',
                        confirmButtonText:
                            '<a style="font-family: Poppins">Aceptar</a>',
                        confirmButtonColor: "#01bbcc",
                    });
                } else {
                    var options = {
                        animationEnabled: true,
                        title: {
                            text: "",
                        },
                        axisX: {
                            title: "Time",
                            valueFormatString: "DD/MM/YYYY HH:mm:ss",
                            labelFontSize: 14,
                        },
                        axisY: {
                            title: "Profit",
                            labelFontSize: 14,
                        },
                        data: [
                            {
                                type: "spline",
                                dataPoints: dps,
                                toolTipContent:
                                    "Fecha: {x} <br> Profit: {profit} <br> Suma Acumulada: {cumulativeSum} ",
                            },
                        ],
                    };
                    var chart = new CanvasJS.Chart("chartContainer", options);
                    chart.render();
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
});

//Al hacer un cambio en portfolioSelect hacer cambios en el grafico
$(document).on("change", "#portfolioSelect", () => {
    let portfolio = $("#portfolioSelect").val();
    let session = $("#sessionSelect").val();
    let fecha_inicio = $("#fechaDesdeInput").val();
    let fecha_fin = $("#fechaHastaInput").val();
    console.log(portfolio);

    if (session == 0) {
        $.get({
            url: "/admin/getSessionPortfolioAcum",
            data: {
                id: traderID,
                portfolio: portfolio,
                inicio: fecha_inicio,
                fin: fecha_fin,
            },
            success: function (response) {
                var dps = [];
                var cumulativeSum = 0;

                response.jornadas.map(function (port) {
                    cumulativeSum += port.profit;

                    dps.push({
                        x: new Date(port.time_1),
                        y: cumulativeSum,
                        cumulativeSum: cumulativeSum, // Agrega la variable de suma acumulada
                        time: port.time_1,
                        profit: port.profit,
                    });
                });
                if (dps.length == 0) {
                    Swal.fire({
                        icon: "warning",
                        title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
                        html: '<p style="font-family: Poppins">No se encontraron datos para graficar</p>',
                        confirmButtonText:
                            '<a style="font-family: Poppins">Aceptar</a>',
                        confirmButtonColor: "#01bbcc",
                    });
                } else {
                    var options = {
                        animationEnabled: true,
                        title: {
                            text: "",
                        },
                        axisX: {
                            title: "Time",
                            valueFormatString: "DD/MM/YYYY HH:mm:ss",
                            labelFontSize: 14,
                        },
                        axisY: {
                            title: "Profit",
                            labelFontSize: 14,
                        },
                        data: [
                            {
                                type: "spline",
                                dataPoints: dps,
                                toolTipContent:
                                    "Fecha: {x} <br> Profit: {profit} <br> Suma Acumulada: {cumulativeSum} ",
                            },
                        ],
                    };
                    var chart = new CanvasJS.Chart("chartContainer", options);
                    chart.render();
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    } else {
        $.get({
            url: "/admin/getJornadasSPAcum",
            data: {
                id: traderID,
                portfolio: portfolio,
                session: session,
                inicio: fecha_inicio,
                fin: fecha_fin,
            },
            success: function (response) {
                var dps = [];
                var cumulativeSum = 0;

                response.jornadas.map(function (port) {
                    cumulativeSum += port.profit;

                    dps.push({
                        x: new Date(port.time_1),
                        y: cumulativeSum,
                        cumulativeSum: cumulativeSum, // Agrega la variable de suma acumulada
                        time: port.time_1,
                        profit: port.profit,
                    });
                });
                if (dps.length == 0) {
                    Swal.fire({
                        icon: "warning",
                        title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
                        html: '<p style="font-family: Poppins">No se encontraron datos para graficar</p>',
                        confirmButtonText:
                            '<a style="font-family: Poppins">Aceptar</a>',
                        confirmButtonColor: "#01bbcc",
                    });
                } else {
                    var options = {
                        animationEnabled: true,
                        title: {
                            text: "",
                        },
                        axisX: {
                            title: "Time",
                            valueFormatString: "DD/MM/YYYY HH:mm:ss",
                            labelFontSize: 14,
                        },
                        axisY: {
                            title: "Profit",
                            labelFontSize: 14,
                        },
                        data: [
                            {
                                type: "spline",
                                dataPoints: dps,
                                toolTipContent:
                                    "Fecha: {x} <br> Profit: {profit} <br> Suma Acumulada: {cumulativeSum} ",
                            },
                        ],
                    };
                    var chart = new CanvasJS.Chart("chartContainer", options);
                    chart.render();
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
});

//Al hacer un cambio en symbolSelect hacer cambios en el grafico
$(document).on("change", "#symbolSelect", () => {
    let portfolio = $("#portfolioSelect").val();
    let session = $("#sessionSelect").val();
    let symbol = $("#symbolSelect").val();
    let fecha_inicio = $("#fechaDesdeInput").val();
    let fecha_fin = $("#fechaHastaInput").val();

    if (session == 0 && portfolio == 0) {
        $.get({
            url: "/admin/getSessionMonedasAcum",
            data: {
                id: traderID,
                symbol: symbol,
                inicio: fecha_inicio,
                fin: fecha_fin,
            },
            success: function (response) {
                var dps = [];
                var cumulativeSum = 0;

                response.jornadas.map(function (port) {
                    cumulativeSum += port.profit;

                    dps.push({
                        x: new Date(port.time_1),
                        y: cumulativeSum,
                        cumulativeSum: cumulativeSum, // Agrega la variable de suma acumulada
                        time: port.time_1,
                        profit: port.profit,
                    });
                });
                if (dps.length == 0) {
                    Swal.fire({
                        icon: "warning",
                        title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
                        html: '<p style="font-family: Poppins">No se encontraron datos para graficar</p>',
                        confirmButtonText:
                            '<a style="font-family: Poppins">Aceptar</a>',
                        confirmButtonColor: "#01bbcc",
                    });
                } else {
                    var options = {
                        animationEnabled: true,
                        title: {
                            text: "",
                        },
                        axisX: {
                            title: "Time",
                            valueFormatString: "DD/MM/YYYY HH:mm:ss",
                            labelFontSize: 14,
                        },
                        axisY: {
                            title: "Profit",
                            labelFontSize: 14,
                        },
                        data: [
                            {
                                type: "spline",
                                dataPoints: dps,
                                toolTipContent:
                                    "Fecha: {x} <br> Profit: {profit} <br> Suma Acumulada: {cumulativeSum} ",
                            },
                        ],
                    };
                    var chart = new CanvasJS.Chart("chartContainer", options);
                    chart.render();
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    } else {
        $.get({
            url: "/admin/getJornadasSPMAcum",
            data: {
                id: traderID,
                portfolio: portfolio,
                session: session,
                symbol: symbol,
                inicio: fecha_inicio,
                fin: fecha_fin,
            },
            success: function (response) {
                var dps = [];
                var cumulativeSum = 0;

                response.jornadas.map(function (port) {
                    cumulativeSum += port.profit;

                    dps.push({
                        x: new Date(port.time_1),
                        y: cumulativeSum,
                        cumulativeSum: cumulativeSum, // Agrega la variable de suma acumulada
                        time: port.time_1,
                        profit: port.profit,
                    });
                });
                if (dps.length == 0) {
                    Swal.fire({
                        icon: "warning",
                        title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
                        html: '<p style="font-family: Poppins">No se encontraron datos para graficar</p>',
                        confirmButtonText:
                            '<a style="font-family: Poppins">Aceptar</a>',
                        confirmButtonColor: "#01bbcc",
                    });
                } else {
                    var options = {
                        animationEnabled: true,
                        title: {
                            text: "",
                        },
                        axisX: {
                            title: "Time",
                            valueFormatString: "DD/MM/YYYY HH:mm:ss",
                            labelFontSize: 14,
                        },
                        axisY: {
                            title: "Profit",
                            labelFontSize: 14,
                        },
                        data: [
                            {
                                type: "spline",
                                dataPoints: dps,
                                toolTipContent:
                                    "Fecha: {x} <br> Profit: {profit} <br> Suma Acumulada: {cumulativeSum} ",
                            },
                        ],
                    };
                    var chart = new CanvasJS.Chart("chartContainer", options);
                    chart.render();
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
});

//Al hacer click en boton resetRegistros eliminar datos de selects y hacer petición general
$(document).on("click", "#resetRegistros", () => {
    $("#fechaDesdeInput").val(inicio_semana);
    $("#fechaHastaInput").val(fin_semana);
    $("#sessionSelect").val(0);
    $("#portfolioSelect").val(0);
    $("#symbolSelect").val(0);
    setData(traderID, inicio_semana, fin_semana);
});
