$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", "#editarStatusMod", () => {
        let id = $("#editarStatusMod").data("id");
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

    $(document).on("click", "#editarStatusAct", () => {
        let id = $("#editarStatusAct").data("id");

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

    $(document).on("click", "#editarStatusSL", () => {
        let id = $("#editarStatusSL").data("id");

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

    $(document).on("click", "#editarStatusTP", () => {
        let id = $("#editarStatusTP").data("id");

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
