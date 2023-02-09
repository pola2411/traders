$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", ".editarStatusMod", function () {
        let id = $(this).data("id");
        $.get({
            url: "/admin/editStatus",
            data: {
                id: id,
                campo: "modificable",
            },
            success: function (response) {
                $("#contBotones").empty();
                $("#contBotones").html(response);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $(document).on("click", ".editarStatusAct", function () {
        let id = $(this).data("id");
        $.get({
            url: "/admin/editStatus",
            data: {
                id: id,
                campo: "activado",
            },
            success: function (response) {
                $("#contBotones").empty();
                $("#contBotones").html(response);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $(document).on("click", ".editarStatusSL", function () {
        let id = $(this).data("id");

        $.get({
            url: "/admin/editStatus",
            data: {
                id: id,
                campo: "sl",
            },
            success: function (response) {
                $("#contBotones").empty();
                $("#contBotones").html(response);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $(document).on("click", ".editarStatusTP", function () {
        let id = $(this).data("id");

        $.get({
            url: "/admin/editStatus",
            data: {
                id: id,
                campo: "tp",
            },
            success: function (response) {
                $("#contBotones").empty();
                $("#contBotones").html(response);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $("#traderForm").on("submit", function (e) {
        e.preventDefault();
        var url = $(this).attr("action");

        $.ajax({
            type: "POST",
            url: url,
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $.get({
                    url: "/admin/showTraders",
                    success: function (response) {
                        $("#contBotones").empty();
                        $("#contBotones").html(response);
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
                $("#formModal").modal("hide");
                $("#traderForm")[0].reset();
                Swal.fire({
                    icon: "success",
                    title: '<h1 style="font-family: Poppins; font-weight: 700;">Trader agregado</h1>',
                    html: '<p style="font-family: Poppins">El trader ha sido añadido correctamente</p>',
                    confirmButtonText:
                        '<a style="font-family: Poppins">Aceptar</a>',
                    confirmButtonColor: "#01bbcc",
                });
            },
            error: function (err, exception) {
                console.log(err);
                console.log(exception);
            },
        });
    });

    $(document).on("click", ".new", function (e) {
        $("#alertMessage").text("");
        $("#traderForm")[0].reset();
        $("#traderForm").attr("action", "/admin/addTrader");
        $("#idInput").val("");
    });
});

$(".table").addClass("compact nowrap w-100");
