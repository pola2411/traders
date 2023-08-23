$(document).ready(function () {
    $(document).on("change", "#analisisValue", function (e) {
        e.preventDefault();
        let value = $(this).val();

        $.get({
            url: "/admin/showAnalisis",
            data: {
                value,
            },
            success: function (response) {
                $("#contTabla").html(response);

                $("#chartContainer").html(`
                    <div class="text-center mt-4">
                        <div class="spinner-border text-primary" role="status"></div>
                        <p class="text-primary">Cargando gráfica<span class="dotting"> </span></p>
                    </div>
                `);
                $.get({
                    url: "/admin/showAnalisisGrafica",
                    data: {
                        value,
                    },
                    success: function (response) {
                        var dps = [];
                        response.map(function (port) {
                            dps.push({
                                name: `Portafolio ${port.portfolio}`,
                                x: port.risk,
                                y: port.profit,
                                indexLabel: `\u2605 ${port.portfolio}`,
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
                            $("#chartContainer").CanvasJSChart(options);
                        } else {
                            var options = {
                                animationEnabled: true,
                                title: {
                                    text: "Beneficio - Riesgo",
                                },
                                axisX: {
                                    title: "Riesgo",
                                    labelFontSize: 14,
                                },
                                axisY: {
                                    title: "Bieneficio",
                                    labelFontSize: 14,
                                },
                                legend: {
                                    cursor: "pointer",
                                    fontSize: 16,
                                },
                                toolTip: {
                                    shared: true,
                                    content:
                                        "<strong>{name}: </strong> </br> Beneficio: {y}, Riesgo: {x}",
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

                var tabla = $("#analisisPortafolios").DataTable({
                    responsive: {
                        breakpoints: [
                            {
                                name: "desktop",
                                width: Infinity,
                            },
                            {
                                name: "tablet",
                                width: 1024,
                            },
                            {
                                name: "fablet",
                                width: 768,
                            },
                            {
                                name: "phone",
                                width: 480,
                            },
                        ],
                    },
                    language: {
                        processing: "Procesando...",
                        lengthMenu: "Mostrar _MENU_ fichas",
                        zeroRecords: "No se encontraron resultados",
                        emptyTable: "No se ha registrado ninguna ficha",
                        infoEmpty:
                            "Mostrando fichas del 0 al 0 de un total de 0 fichas",
                        infoFiltered: "(filtrado de un total de _MAX_ fichas)",
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
                            collaoperacione: {
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
                        info: "Mostrando de _START_ a _END_ de _TOTAL_ fichas",
                    },
                    lengthMenu: [
                        [50, 100, 150, 200, 250, 300, -1],
                        [50, 100, 150, 200, 250, 300, "Todo"],
                    ],
                    pageLength: 50,
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $(document).on("click", ".view", function (e) {
        e.preventDefault();

        let value = $(this).data("value");
        let portfolio = $(this).data("portfolio");

        $.get({
            url: "/admin/showAnalisisPortafolio",
            data: {
                value,
                portfolio,
            },
            success: function (res) {
                $("#tbody").empty();
                res.map((item) => {
                    let buy_sell = item.buy_sell == "buy" ? "Buy" : "Sell";
                    $("#modalTitle").text(
                        `PORTAFOLIO ${item.portfolio} - #${item.value}`
                    );
                    $("#tbody").append(`
                        <tr>
                            <td>${item.asset}</td>
                            <td>${buy_sell}</td>
                            <td>${item.lotaje}</td>
                            <td>${item.swap}</td>
                            <td>${item.risk}</td>
                            <td>${item.profit}</td>
                            <td>${item.margin}</td>
                        </tr>
                    `);
                    $("#maximo").text(item.max_last);
                    $("#minimo").text(item.min_last);
                    $("#diferencia").text(item.difference);
                });
                $("#formModal").modal("show");
            },
        });
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});
$(".table").addClass("compact nowrap w-100");
