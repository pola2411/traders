var table;
var url = window.location + "";
var separador = url.split("/");
var traderID = separador[separador.length - 1];

function estatusClaveIncorrecta(input) {
    let estatus = $(input).data("botonCADH");
    if (estatus == "activado") {
        $(input).val("activado");
    } else {
        $(input).val("desactivado");
    }
}

const tableStatus = () => {
    $.get({
        url: `/admin/showStatusRobot`,
        success: function (response) {
            $("#contTabla").empty();
            $("#contTabla").html(response);

            table = $("#robots").DataTable({
                language: {
                    processing: "Procesando...",
                    lengthMenu: "Mostrar _MENU_ cuentas",
                    zeroRecords: "No se encontraron resultados",
                    emptyTable: "No se ha registrado ningún pago",
                    infoEmpty:
                        "Mostrando cuentas del 0 al 0 de un total de 0 cuentas",
                    infoFiltered: "(filtrado de un total de _MAX_ cuentas)",
                    search: "Buscar:",
                    infoThousands: ",",
                    loadingRecords: "Cargando...",
                    paginate: {
                        first: "Primero",
                        last: "Último",
                        next: ">",
                        previous: "<",
                    },
                    aria: {
                        sortAscending:
                            ": Activar para ordenar la columna de manera ascendente",
                        sortDescending:
                            ": Activar para ordenar la columna de manera descendente",
                    },
                    buttons: {
                        copy: "Copiar",
                        colvis: "Visibilidad",
                        collection: "Colección",
                        colvisRestore: "Restaurar visibilidad",
                        copyKeys:
                            "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br /> <br /> Para cancelar, haga clic en este mensaje o presione escape.",
                        copySuccess: {
                            1: "Copiada 1 fila al portapapeles",
                            _: "Copiadas %d fila al portapapeles",
                        },
                        copyTitle: "Copiar al portapapeles",
                        csv: "CSV",
                        excel: "Excel",
                        pageLength: {
                            "-1": "Mostrar todas las filas",
                            1: "Mostrar 1 fila",
                            _: "Mostrar %d filas",
                        },
                        pdf: "PDF",
                        print: "Imprimir",
                    },
                    autoFill: {
                        cancel: "Cancelar",
                        fill: "Rellene todas las celdas con <i>%d</i>",
                        fillHorizontal: "Rellenar celdas horizontalmente",
                        fillVertical: "Rellenar celdas verticalmentemente",
                    },
                    decimal: ",",
                    searchBuilder: {
                        add: "Añadir condición",
                        button: {
                            0: "Constructor de búsqueda",
                            _: "Constructor de búsqueda (%d)",
                        },
                        clearAll: "Borrar todo",
                        condition: "Condición",
                        conditions: {
                            date: {
                                after: "Despues",
                                before: "Antes",
                                between: "Entre",
                                empty: "Vacío",
                                equals: "Igual a",
                                notBetween: "No entre",
                                notEmpty: "No Vacio",
                                not: "Diferente de",
                            },
                            number: {
                                between: "Entre",
                                empty: "Vacio",
                                equals: "Igual a",
                                gt: "Mayor a",
                                gte: "Mayor o igual a",
                                lt: "Menor que",
                                lte: "Menor o igual que",
                                notBetween: "No entre",
                                notEmpty: "No vacío",
                                not: "Diferente de",
                            },
                            string: {
                                contains: "Contiene",
                                empty: "Vacío",
                                endsWith: "Termina en",
                                equals: "Igual a",
                                notEmpty: "No Vacio",
                                startsWith: "Empieza con",
                                not: "Diferente de",
                            },
                            array: {
                                not: "Diferente de",
                                equals: "Igual",
                                empty: "Vacío",
                                contains: "Contiene",
                                notEmpty: "No Vacío",
                                without: "Sin",
                            },
                        },
                        data: "Data",
                        deleteTitle: "Eliminar regla de filtrado",
                        leftTitle: "Criterios anulados",
                        logicAnd: "Y",
                        logicOr: "O",
                        rightTitle: "Criterios de sangría",
                        title: {
                            0: "Constructor de búsqueda",
                            _: "Constructor de búsqueda (%d)",
                        },
                        value: "Valor",
                    },
                    searchPanes: {
                        clearMessage: "Borrar todo",
                        collapse: {
                            0: "Paneles de búsqueda",
                            _: "Paneles de búsqueda (%d)",
                        },
                        count: "{total}",
                        countFiltered: "{shown} ({total})",
                        emptyPanes: "Sin paneles de búsqueda",
                        loadMessage: "Cargando paneles de búsqueda",
                        title: "Filtros Activos - %d",
                    },
                    select: {
                        1: "%d fila seleccionada",
                        _: "%d filas seleccionadas",
                        cells: {
                            1: "1 celda seleccionada",
                            _: "$d celdas seleccionadas",
                        },
                        columns: {
                            1: "1 columna seleccionada",
                            _: "%d columnas seleccionadas",
                        },
                    },
                    thousands: ".",
                    datetime: {
                        previous: "Anterior",
                        next: "Proximo",
                        hours: "Horas",
                        minutes: "Minutos",
                        seconds: "Segundos",
                        unknown: "-",
                        amPm: ["am", "pm"],
                    },
                    editor: {
                        close: "Cerrar",
                        create: {
                            button: "Nuevo",
                            title: "Crear Nuevo Registro",
                            submit: "Crear",
                        },
                        edit: {
                            button: "Editar",
                            title: "Editar Registro",
                            submit: "Actualizar",
                        },
                        remove: {
                            button: "Eliminar",
                            title: "Eliminar Registro",
                            submit: "Eliminar",
                            confirm: {
                                _: "¿Está seguro que desea eliminar %d filas?",
                                1: "¿Está seguro que desea eliminar 1 fila?",
                            },
                        },
                        error: {
                            system: 'Ha ocurrido un error en el sistema (<a target="\\" rel="\\ nofollow" href="\\">Más información&lt;\\/a&gt;).</a>',
                        },
                        multi: {
                            title: "Múltiples Valores",
                            info: "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                            restore: "Deshacer Cambios",
                            noMulti:
                                "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
                        },
                    },
                    info: "Mostrando de _START_ a _END_ de _TOTAL_ cuentas",
                },
                lengthMenu: [
                    [50, 100, 150, -1],
                    [50, 100, 150, "Todo"],
                ],
                pageLength: 50,
                aaSorting: [],
            });
        },
        error: function (error) {
            console.log(error);
        },
    });
};

tableStatus();

$(document).on("click", "#Ongral", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "on_general",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/botonGral",
                            {
                                id: id,
                                campo: "on_general",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#Ontime", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "on_time",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/botonTime",
                            {
                                id: id,
                                campo: "on_time",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#eurusd", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "on_time",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/eurusd",
                            {
                                id: id,
                                campo: "eurusd",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#gbpusd", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "gbpusd",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/gbpusd",
                            {
                                id: id,
                                campo: "gbpusd",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#audusd", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "audusd",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/audusd",
                            {
                                id: id,
                                campo: "audusd",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#nzdusd", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "nzdusd",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/nzdusd",
                            {
                                id: id,
                                campo: "nzdusd",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#usdcad", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "usdcad",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/usdcad",
                            {
                                id: id,
                                campo: "usdcad",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#usdchf", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "usdchf",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/usdchf",
                            {
                                id: id,
                                campo: "usdchf",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#usdchf", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "usdchf",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/usdchf",
                            {
                                id: id,
                                campo: "usdchf",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#usdjpy", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "usdjpy",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/usdjpy",
                            {
                                id: id,
                                campo: "usdjpy",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#eurgbp", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "eurgbp",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/eurgbp",
                            {
                                id: id,
                                campo: "eurgbp",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#euraud", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "euraud",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/euraud",
                            {
                                id: id,
                                campo: "euraud",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#eurnzd", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "eurnzd",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/eurnzd",
                            {
                                id: id,
                                campo: "eurnzd",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#gbpaud", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "gbpaud",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/gbpaud",
                            {
                                id: id,
                                campo: "gbpaud",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#gbpnzd", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "gbpnzd",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/gbpnzd",
                            {
                                id: id,
                                campo: "gbpnzd",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#audnzd", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "audnzd",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/audnzd",
                            {
                                id: id,
                                campo: "audnzd",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#eurcad", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "eurcad",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/eurcad",
                            {
                                id: id,
                                campo: "eurcad",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#eurchf", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "eurchf",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/eurchf",
                            {
                                id: id,
                                campo: "eurchf",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#eurjpy", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "eurjpy",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/eurjpy",
                            {
                                id: id,
                                campo: "eurjpy",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#gbpcad", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "gbpcad",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/gbpcad",
                            {
                                id: id,
                                campo: "gbpcad",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#gbpchf", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "gbpchf",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/gbpchf",
                            {
                                id: id,
                                campo: "gbpchf",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#gbpjpy", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "gbpjpy",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/gbpjpy",
                            {
                                id: id,
                                campo: "gbpjpy",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#audcad", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "audcad",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/audcad",
                            {
                                id: id,
                                campo: "audcad",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#audchf", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "audchf",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/audchf",
                            {
                                id: id,
                                campo: "audchf",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#audjpy", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "audjpy",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/audjpy",
                            {
                                id: id,
                                campo: "audjpy",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#nzdcad", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "nzdcad",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/nzdcad",
                            {
                                id: id,
                                campo: "nzdcad",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#nzdchf", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "nzdchf",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/nzdchf",
                            {
                                id: id,
                                campo: "nzdchf",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#nzdjpy", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "nzdjpy",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/nzdjpy",
                            {
                                id: id,
                                campo: "nzdjpy",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#cadchf", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "cadchf",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/cadchf",
                            {
                                id: id,
                                campo: "cadchf",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#cadjpy", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "cadjpy",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/cadjpy",
                            {
                                id: id,
                                campo: "cadjpy",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#chfjpy", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "chfjpy",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/chfjpy",
                            {
                                id: id,
                                campo: "chfjpy",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#offusd", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "usd",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/offusd",
                            {
                                id: id,
                                campo: "usd",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#offeur", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "eur",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/offeur",
                            {
                                id: id,
                                campo: "eur",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#offgbp", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "gbp",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/offgbp",
                            {
                                id: id,
                                campo: "gbp",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#offaud", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "aud",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/offaud",
                            {
                                id: id,
                                campo: "aud",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#offnzd", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "nzd",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/offnzd",
                            {
                                id: id,
                                campo: "nzd",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#offcad", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "cad",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/offcad",
                            {
                                id: id,
                                campo: "cad",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#offchf", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "chf",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/offchf",
                            {
                                id: id,
                                campo: "chf",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});

$(document).on("click", "#offjpy", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveBoton",
                data: {
                    clave: clave,
                    id: id,
                    campo: "jpy",
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/offjpy",
                            {
                                id: id,
                                campo: "jpy",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });
                                 tableStatus();
                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});
// setInterval(function () {
//     table.destroy();
//     tableStatus();
// }, 40000);
