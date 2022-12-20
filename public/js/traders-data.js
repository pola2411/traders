var url = window.location + "";
var separador = url.split("/");
var traderID = separador[separador.length - 1];

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

let fechaFin_inicio =
    hoy.getFullYear() +
    "-" +
    (hoy.getMonth() + 1) +
    "-" +
    hoy.getDate() +
    " " +
    hoy.getHours() +
    ":" +
    hoy.getMinutes() +
    ":" +
    hoy.getSeconds();

$("#fechaDesdeInput").val(fechaInicio_inicio);
$("#fechaHastaInput").val(fechaFin_inicio);

$.get({
    url: "/admin/getInfo",
    data: {
        id: traderID,
        fecha_inicio: fechaInicio_inicio,
        fecha_fin: fechaFin_inicio,
    },
    success: function (response) {
        $("#contTable").empty();
        $("#contTable").html(response);
    },
    error: function (error) {
        console.log(error);
    },
});

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
            $.get({
                url: "/admin/getInfo",
                data: {
                    id: traderID,
                    fecha_inicio: fecha_inicio,
                    fecha_fin: fecha_fin,
                },
                success: function (response) {
                    $("#contTable").empty();
                    $("#contTable").html(response);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    } else {
        $("#contTable").empty();
        Swal.fire({
            icon: "warning",
            title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
            html: '<p style="font-family: Poppins">Debes de seleccionar dos fechas.</p>',
            confirmButtonText: '<a style="font-family: Poppins">Aceptar</a>',
            confirmButtonColor: "#01bbcc",
        });
    }
});
