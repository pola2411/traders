var url = window.location + "";
var separador = url.split("/");
var traderID = separador[separador.length - 1];

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
