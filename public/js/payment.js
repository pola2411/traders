$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", "#send-email", function (e) {
        e.preventDefault();
        var link = $("#link").val();
        var email = $("#correo").val();
        var asunto = $("#subject").val();

      
        if (email == "") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe ingresar un correo electrónico",
            });
            return false;
        }
        if (asunto == "") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe ingresar un asunto",
            });
            return false;
        }
        if (link == "") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe ingresar un link de pago",
            });
            return false;
        }

        $.ajax({
            type: "post",
            url: "/admin/procesar-pago",
            data: {
                link: link,
                email: email,
                asunto: asunto,
            },
            success: function (response) {
           
                console.log(response);
                $("#link").val("");
                $("#correo").val("");
                $("#subject").val("");
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Correo enviado exitosamente',
                    showConfirmButton: false,
                    timer: 1500
                  })
            
        },

            error: function (response) {
                console.log(response);
            },
        });

    });
});
