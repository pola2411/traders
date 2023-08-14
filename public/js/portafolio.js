$(document).ready(function () {
   
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

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

    // $("#fechaDesdeInput").val(inicio_semana);
    // $("#fechaHastaInput").val(fin_semana);

    function setData(portafolio) {
        $.get({
            url: "/admin/getPortafolio",
            data: {
                // inicio: inicio,
                // fin: fin,
                portafolio: portafolio,
            },
            success: function (response) {
                var dps = [];
                response.portafolio.map(function (port) {
                    dps.push({ x: port.valor, y: port.rendimiento });
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
                    $("#chartContainer").CanvasJSChart(options);
                } else {
                    var options = {
                        animationEnabled: true,
                        title: {
                            text: "",
                        },
                        axisX: {
                            labelFontSize: 14,
                        },
                        axisY: {
                            labelFontSize: 14,
                        },
                        data: [
                            {
                                type: "spline", //change it to line, area, bar, pie, etc
                                dataPoints: dps,
                            },
                        ],
                    };
                    $("#chartContainer").CanvasJSChart(options);
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    $(document).on("click", "#obtenerRegistros", () => {
        // let fecha_inicio = $("#fechaDesdeInput").val();
        // let fecha_fin = $("#fechaHastaInput").val();
        let portafolio = $("#portafolio").val();

        // if (fecha_inicio.length > 0 && fecha_fin.length > 0) {
        //     if (fecha_inicio > fecha_fin) {
        //         $("#fechaDesdeInput").val(0);
        //         $("#fechaHastaInput").val(0);
        //         $("#portafolio").val(0);
        //         Swal.fire({
        //             icon: "warning",
        //             title: '<h1 style="font-family: Poppins; font-weight: 700;">Error en fechas</h1>',
        //             html: '<p style="font-family: Poppins">La fecha de inicio debe de ser menor a la fecha de fin.</p>',
        //             confirmButtonText:
        //                 '<a style="font-family: Poppins">Aceptar</a>',
        //             confirmButtonColor: "#01bbcc",
        //         });
        //     } else {
                // setData(fecha_inicio, fecha_fin, portafolio);
                setData(portafolio);
            // }
        // } else {
        //     Swal.fire({
        //         icon: "warning",
        //         title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
        //         html: '<p style="font-family: Poppins">Debes de seleccionar dos fechas.</p>',
        //         confirmButtonText:
        //             '<a style="font-family: Poppins">Aceptar</a>',
        //         confirmButtonColor: "#01bbcc",
        //     });
        // }
    });

    // $("#portafolioGraphForm").on("submit", function (e) {
    //     e.preventDefault();
    //     var form = $(this).serialize();
    //     var url = $(this).attr("action");
    //     $("#alertMessage").text("");
    //     $.ajax({
    //         type: "POST",
    //         url: url,
    //         data: new FormData(this),
    //         dataType: "json",
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         success: function () {
    //             $("#formModal").modal("hide");
    //             $("#portafolioGraphForm")[0].reset();
    //             // table.ajax.reload(null, false);
    //             if (acc == "new") {
    //                 Swal.fire({
    //                     icon: "success",
    //                     title: '<h1 style="font-family: Poppins; font-weight: 700;">Datos añadidos</h1>',
    //                     html: '<p style="font-family: Poppins">Los datos se han agregado correctamente</p>',
    //                     confirmButtonText:
    //                         '<a style="font-family: Poppins">Aceptar</a>',
    //                     confirmButtonColor: "#01bbcc",
    //                 });
    //             } else if (acc == "edit") {
    //                 Swal.fire({
    //                     icon: "success",
    //                     title: '<h1 style="font-family: Poppins; font-weight: 700;">Estudio actualizado</h1>',
    //                     html: '<p style="font-family: Poppins">El estudio ha sido actualizado correctamente</p>',
    //                     confirmButtonText:
    //                         '<a style="font-family: Poppins">Aceptar</a>',
    //                     confirmButtonColor: "#01bbcc",
    //                 });
    //             }
    //         },
    //         error: function (jqXHR, exception) {
    //             var validacion = jqXHR.responseJSON.errors;
    //             for (let clave in validacion) {
    //                 $("#alertMessage").append(
    //                     `<div class="badge bg-danger" style="text-align: left !important;">*${validacion[clave][0]}</div><br>`
    //                 );
    //             }
    //         },
    //     });
    // });


    // $(document).on("click", ".new", function (e) {
    //     $("#alertMessage").text("");
    //     acc = "new";
    //     $("#portafolioGraphForm")[0].reset();
    //     $("#portafolioGraphForm").attr("action", "/admin/addPortafolioGraph");
    //     $("#idInput").val("");


    //     $("#modalTitle").text("Solicitud de clave inversor");
    //     $("#btnSubmit").text("Enviar Solicitud");

    //     $("#btnSubmit").show();
    //     $("#btnCancel").text("Cancelar");
    // });

    // var table = $("#portafolioDots").DataTable({
    //     ajax: "/admin/getPortafolioDots",
    //     columns: [
        
    //         { data: "valor" },
    //         { data: "rendimiento" },
    //         { data: "time" },
    //         { data: "portafolio" },
    //         { data: "btn" },
    //     ],
    //     responsive: {
    //         breakpoints: [
    //             {
    //                 name: "desktop",
    //                 width: Infinity,
    //             },
    //             {
    //                 name: "tablet",
    //                 width: 1024,
    //             },
    //             {
    //                 name: "fablet",
    //                 width: 768,
    //             },
    //             {
    //                 name: "phone",
    //                 width: 480,
    //             },
    //         ],
    //     },
    //     language: {
    //         processing: "Procesando...",
    //         lengthMenu: "Mostrar _MENU_ Estudios",
    //         zeroRecords: "No se encontraron resultados",
    //         emptyTable: "No se ha registrado ninguna transmisión",
    //         infoEmpty:
    //             "Mostrando Estudios del 0 al 0 de un total de 0 Estudios",
    //         infoFiltered: "(filtrado de un total de _MAX_ Estudios)",
    //         search: "Buscar:",
    //         infoThousands: ",",
    //         loadingRecords: "Cargando...",
    //         paginate: {
    //             first: "Primero",
    //             last: "Último",
    //             next: ">",
    //             previous: "<",
    //         },
    //         aria: {
    //             sortAscending:
    //                 ": Activar para ordenar la columna de manera ascendente",
    //             sortDescending:
    //                 ": Activar para ordenar la columna de manera descendente",
    //         },
    //         buttons: {
    //             copy: "Copiar",
    //             colvis: "Visibilidad",
    //             collection: "Colección",
    //             colvisRestore: "Restaurar visibilidad",
    //             copyKeys:
    //                 "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br /> <br /> Para cancelar, haga clic en este mensaje o presione escape.",
    //             copySuccess: {
    //                 1: "Copiada 1 fila al portapapeles",
    //                 _: "Copiadas %d fila al portapapeles",
    //             },
    //             copyTitle: "Copiar al portapapeles",
    //             csv: "CSV",
    //             excel: "Excel",
    //             pageLength: {
    //                 "-1": "Mostrar todas las filas",
    //                 1: "Mostrar 1 fila",
    //                 _: "Mostrar %d filas",
    //             },
    //             pdf: "PDF",
    //             print: "Imprimir",
    //         },
    //         autoFill: {
    //             cancel: "Cancelar",
    //             fill: "Rellene todas las celdas con <i>%d</i>",
    //             fillHorizontal: "Rellenar celdas horizontalmente",
    //             fillVertical: "Rellenar celdas verticalmentemente",
    //         },
    //         decimal: ",",
    //         searchBuilder: {
    //             add: "Añadir condición",
    //             button: {
    //                 0: "Constructor de búsqueda",
    //                 _: "Constructor de búsqueda (%d)",
    //             },
    //             clearAll: "Borrar todo",
    //             condition: "Condición",
    //             conditions: {
    //                 date: {
    //                     after: "Despues",
    //                     before: "Antes",
    //                     between: "Entre",
    //                     empty: "Vacío",
    //                     equals: "Igual a",
    //                     notBetween: "No entre",
    //                     notEmpty: "No Vacio",
    //                     not: "Diferente de",
    //                 },
    //                 number: {
    //                     between: "Entre",
    //                     empty: "Vacio",
    //                     equals: "Igual a",
    //                     gt: "Mayor a",
    //                     gte: "Mayor o igual a",
    //                     lt: "Menor que",
    //                     lte: "Menor o igual que",
    //                     notBetween: "No entre",
    //                     notEmpty: "No vacío",
    //                     not: "Diferente de",
    //                 },
    //                 string: {
    //                     contains: "Contiene",
    //                     empty: "Vacío",
    //                     endsWith: "Termina en",
    //                     equals: "Igual a",
    //                     notEmpty: "No Vacio",
    //                     startsWith: "Empieza con",
    //                     not: "Diferente de",
    //                 },
    //                 array: {
    //                     not: "Diferente de",
    //                     equals: "Igual",
    //                     empty: "Vacío",
    //                     contains: "Contiene",
    //                     notEmpty: "No Vacío",
    //                     without: "Sin",
    //                 },
    //             },
    //             data: "Data",
    //             deleteTitle: "Eliminar regla de filtrado",
    //             leftTitle: "Criterios anulados",
    //             logicAnd: "Y",
    //             logicOr: "O",
    //             rightTitle: "Criterios de sangría",
    //             title: {
    //                 0: "Constructor de búsqueda",
    //                 _: "Constructor de búsqueda (%d)",
    //             },
    //             value: "Valor",
    //         },
    //         searchPanes: {
    //             clearMessage: "Borrar todo",
    //             collapse: {
    //                 0: "Paneles de búsqueda",
    //                 _: "Paneles de búsqueda (%d)",
    //             },
    //             count: "{total}",
    //             countFiltered: "{shown} ({total})",
    //             emptyPanes: "Sin paneles de búsqueda",
    //             loadMessage: "Cargando paneles de búsqueda",
    //             title: "Filtros Activos - %d",
    //         },
    //         select: {
    //             1: "%d fila seleccionada",
    //             _: "%d filas seleccionadas",
    //             cells: {
    //                 1: "1 celda seleccionada",
    //                 _: "$d celdas seleccionadas",
    //             },
    //             columns: {
    //                 1: "1 columna seleccionada",
    //                 _: "%d columnas seleccionadas",
    //             },
    //         },
    //         thousands: ".",
    //         datetime: {
    //             previous: "Anterior",
    //             next: "Proximo",
    //             hours: "Horas",
    //             minutes: "Minutos",
    //             seconds: "Segundos",
    //             unknown: "-",
    //             amPm: ["am", "pm"],
    //         },
    //         editor: {
    //             close: "Cerrar",
    //             create: {
    //                 button: "Nuevo",
    //                 title: "Crear Nuevo Registro",
    //                 submit: "Crear",
    //             },
    //             edit: {
    //                 button: "Editar",
    //                 title: "Editar Registro",
    //                 submit: "Actualizar",
    //             },
    //             remove: {
    //                 button: "Eliminar",
    //                 title: "Eliminar Registro",
    //                 submit: "Eliminar",
    //                 confirm: {
    //                     _: "¿Está seguro que desea eliminar %d filas?",
    //                     1: "¿Está seguro que desea eliminar 1 fila?",
    //                 },
    //             },
    //             error: {
    //                 system: 'Ha ocurrido un error en el sistema (<a target="\\" rel="\\ nofollow" href="\\">Más información&lt;\\/a&gt;).</a>',
    //             },
    //             multi: {
    //                 title: "Múltiples Valores",
    //                 info: "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
    //                 restore: "Deshacer Cambios",
    //                 noMulti:
    //                     "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
    //             },
    //         },
    //         info: "Mostrando de _START_ a _END_ de _TOTAL_ Estudios",
    //     },
    // });
});
// $(".table").addClass("compact nowrap w-100");