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
});

$(".table").addClass("compact nowrap w-100");
