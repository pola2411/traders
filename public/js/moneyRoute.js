am5.ready(function () {
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([am5themes_Animated.new(root)]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "none",
            wheelY: "none",
            paddingLeft: 50,
            paddingRight: 40,
        })
    );

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/

    var yRenderer = am5xy.AxisRendererY.new(root, {});
    yRenderer.grid.template.set("visible", false);

    var yAxis = chart.yAxes.push(
        am5xy.CategoryAxis.new(root, {
            categoryField: "name",
            renderer: yRenderer,
            paddingRight: 40,
        })
    );

    var xRenderer = am5xy.AxisRendererX.new(root, {});
    xRenderer.grid.template.set("strokeDasharray", [3]);

    var xAxis = chart.xAxes.push(
        am5xy.ValueAxis.new(root, {
            min: 0,
            renderer: xRenderer,
        })
    );

    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(
        am5xy.ColumnSeries.new(root, {
            name: "Income",
            xAxis: xAxis,
            yAxis: yAxis,
            valueXField: "steps",
            categoryYField: "name",
            sequencedInterpolation: true,
            calculateAggregates: true,
            maskBullets: false,
            tooltip: am5.Tooltip.new(root, {
                dy: -30,
                pointerOrientation: "vertical",
                labelText: "{valueX}",
            }),
        })
    );

    series.columns.template.setAll({
        strokeOpacity: 0,
        cornerRadiusBR: 10,
        cornerRadiusTR: 10,
        cornerRadiusBL: 10,
        cornerRadiusTL: 10,
        maxHeight: 50,
        fillOpacity: 0.8,
    });

    var currentlyHovered;

    series.columns.template.events.on("pointerover", function (e) {
        handleHover(e.target.dataItem);
    });

    series.columns.template.events.on("pointerout", function (e) {
        handleOut();
    });

    function handleHover(dataItem) {
        if (dataItem && currentlyHovered != dataItem) {
            currentlyHovered = dataItem;
        }
    }

    function handleOut() {}

    var circleTemplate = am5.Template.new({});

    series.bullets.push(function (root, series, dataItem) {
        var bulletContainer = am5.Container.new(root, {});
        var circle = bulletContainer.children.push(
            am5.Circle.new(
                root,
                {
                    radius: 34,
                },
                circleTemplate
            )
        );

        var maskCircle = bulletContainer.children.push(
            am5.Circle.new(root, { radius: 27 })
        );

        // only containers can be masked, so we add image to another container
        var imageContainer = bulletContainer.children.push(
            am5.Container.new(root, {
                mask: maskCircle,
            })
        );

        // not working
        var image = imageContainer.children.push(
            am5.Picture.new(root, {
                templateField: "pictureSettings",
                centerX: am5.p50,
                centerY: am5.p50,
                width: 60,
                height: 60,
            })
        );

        return am5.Bullet.new(root, {
            locationX: 0,
            sprite: bulletContainer,
        });
    });

    // heatrule
    series.set("heatRules", [
        {
            dataField: "valueX",
            min: am5.color("#1D5D9B"),
            max: am5.color("#75C2F6"),
            target: series.columns.template,
            key: "fill",
        },
        {
            dataField: "valueX",
            min: am5.color("#1D5D9B"),
            max: am5.color("#75C2F6"),
            target: circleTemplate,
            key: "fill",
        },
    ]);

    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineX.set("visible", false);
    cursor.lineY.set("visible", false);

    cursor.events.on("cursormoved", function () {
        var dataItem = series.get("tooltip").dataItem;
        if (dataItem) {
            handleHover(dataItem);
        } else {
            handleOut();
        }
    });

    function fetchData() {
        $.get({
            url: "/admin/getMoneyLast", // Reemplaza con la URL correcta de tu ruta
            dataType: "json", // Asegúrate de que Laravel devuelva JSON
            success: function (response) {
                var data = [];

                response.forEach(function (item) {
                    var newItem = {
                        name: item.moneda,
                        steps: item.valor,
                        pictureSettings: {},
                    };
                    // Agrega una condición if para configurar pictureSettings según el valor de item.moneda
                    if (item.moneda == "EUR") {
                        newItem.pictureSettings.src =
                            "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Flag_of_Europe.svg/640px-Flag_of_Europe.svg.png";
                    } else if (item.moneda == "GBP") {
                        newItem.pictureSettings.src =
                            "https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg/640px-Flag_of_the_United_Kingdom_%283-5%29.svg.png";
                    } else if (item.moneda == "USD") {
                        newItem.pictureSettings.src =
                            "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/640px-Flag_of_the_United_States.svg.png";
                    } else if (item.moneda == "AUD") {
                        newItem.pictureSettings.src =
                            "https://upload.wikimedia.org/wikipedia/commons/8/88/Flag_of_Australia_%28converted%29.svg";
                    } else if (item.moneda == "NZD") {
                        newItem.pictureSettings.src =
                            "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Flag_of_New_Zealand.svg/640px-Flag_of_New_Zealand.svg.png";
                    } else if (item.moneda == "CAD") {
                        newItem.pictureSettings.src =
                            "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Canada_%28Pantone%29.svg/640px-Flag_of_Canada_%28Pantone%29.svg.png";
                    } else if (item.moneda == "CHF") {
                        newItem.pictureSettings.src =
                            "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Switzerland.svg/640px-Flag_of_Switzerland.svg.png";
                    } else if (item.moneda == "JPY") {
                        newItem.pictureSettings.src =
                            "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Flag_of_Japan.svg/640px-Flag_of_Japan.svg.png";
                    }
                    data.push(newItem);
                });

                // Luego de procesar los datos, actualiza la serie y el eje Y del gráfico
                series.data.setAll(data);
                yAxis.data.setAll(data);
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error);
            },
        });
    }

    fetchData();
    // Llamar a la función fetchData para cargar datos desde el servidor cada 2 segundos
    setInterval(fetchData, 60000);
}); // end am5.ready()

$(document).ready(function () {
    setInterval(function () {
        $.ajax({
            type: "GET",
            url: "/admin/getLast",
            success: function (response) {
                $("#actualizacion-contenedor").empty();
                // Obtener la hora actual en un objeto Date
                var horaActual = new Date();

                // Convertir la hora de la respuesta a un objeto Date
                var horaRespuesta = new Date(response.hora);

                // Calcular la diferencia en milisegundos
                var diferenciaEnMilisegundos = horaActual - horaRespuesta;

                // Calcular la diferencia en segundos
                var diferenciaEnSegundos = Math.floor(
                    diferenciaEnMilisegundos / 1000
                );

                // Agregar una clase CSS al elemento
                $("#actualizacion-contenedor").addClass("diferencia-texto");
                // Mostrar la diferencia en segundos en el contenedor
                $("#actualizacion-contenedor").text(
                    " Última actualización: hace " +
                        diferenciaEnSegundos +
                        " segundos"
                );
            },
            error: function (response) {
                console.log(response);
            },
        });
    }, 5000);
});
