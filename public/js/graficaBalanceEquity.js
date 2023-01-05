//Se obtiene el valor de la URL desde el navegador
var url = window.location + "";
var separador = url.split("/");
var traderID = separador[separador.length - 1];

function dateTimeToUnix(dateTime) {
    dateTime = new Date(dateTime);

    const unixTimestamp = Math.floor(dateTime.getTime());

    return unixTimestamp;
}

am5.ready(function () {
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("balanceEquity");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([am5themes_Animated.new(root)]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
            pinchZoomX: true,
        })
    );

    chart.get("colors").set("step", 5);

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    var cursor = chart.set(
        "cursor",
        am5xy.XYCursor.new(root, {
            behavior: "none",
        })
    );
    cursor.lineY.set("visible", false);

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(
        am5xy.DateAxis.new(root, {
            baseInterval: {
                timeUnit: "minute",
                count: 1,
            },
            renderer: am5xy.AxisRendererX.new(root, {}),
            tooltip: am5.Tooltip.new(root, {}),
        })
    );

    var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {}),
        })
    );

    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series1 = chart.series.push(
        am5xy.LineSeries.new(root, {
            name: "Series",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "open",
            openValueYField: "close",
            valueXField: "date",
            stroke: "#00f",
            fill: "#00f4",
            tooltip: am5.Tooltip.new(root, {
                labelText: "Balance: {valueY}",
            }),
        })
    );

    series1.fills.template.setAll({
        fillOpacity: 0.6,
        visible: true,
    });

    var series2 = chart.series.push(
        am5xy.LineSeries.new(root, {
            name: "Series",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "close",
            valueXField: "date",
            stroke: "#6a972f",
            fill: "#6a972f8e",
            tooltip: am5.Tooltip.new(root, {
                labelText: "Equity: {valueY}",
            }),
        })
    );

    //series1.strokes.template.set("strokeWidth", 2);
    //series2.strokes.template.set("strokeWidth", 2);

    // Add scrollbar
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    chart.set(
        "scrollbarX",
        am5.Scrollbar.new(root, {
            orientation: "horizontal",
        })
    );

    function setData(traderID) {
        $.get({
            url: "/admin/getTrader",
            data: {
                id: traderID,
            },
            success: function (response) {
                var data = [];
                $("#numeroTrader").text(response.tradersNombre[0].nombre);

                response.traders.map(function (trader) {
                    var unix = dateTimeToUnix(trader.fecha);
                    data.push({
                        date: unix,
                        close: trader.equity,
                        open: trader.balance,
                    });
                });

                series1.data.setAll(data);
                series2.data.setAll(data);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    setData(traderID);

    setInterval(function () {
        setData(traderID);
    }, 60000);

    setData(traderID);

    // create ranges
    var i = 0;
    var baseInterval = xAxis.get("baseInterval");
    var baseDuration = xAxis.baseDuration();
    var rangeDataItem;

    am5.array.each(series1.dataItems, function (s1DataItem) {
        var s1PreviousDataItem;
        var s2PreviousDataItem;

        var s2DataItem = series2.dataItems[i];

        if (i > 0) {
            s1PreviousDataItem = series1.dataItems[i - 1];
            s2PreviousDataItem = series2.dataItems[i - 1];
        }

        var startTime = am5.time
            .round(
                new Date(s1DataItem.get("valueX")),
                baseInterval.timeUnit,
                baseInterval.count
            )
            .getTime();

        // intersections
        if (s1PreviousDataItem && s2PreviousDataItem) {
            var x0 =
                am5.time
                    .round(
                        new Date(s1PreviousDataItem.get("valueX")),
                        baseInterval.timeUnit,
                        baseInterval.count
                    )
                    .getTime() +
                baseDuration / 2;
            var y01 = s1PreviousDataItem.get("valueY");
            var y02 = s2PreviousDataItem.get("valueY");

            var x1 = startTime + baseDuration / 2;
            var y11 = s1DataItem.get("valueY");
            var y12 = s2DataItem.get("valueY");

            var intersection = getLineIntersection(
                {
                    x: x0,
                    y: y01,
                },
                {
                    x: x1,
                    y: y11,
                },
                {
                    x: x0,
                    y: y02,
                },
                {
                    x: x1,
                    y: y12,
                }
            );

            startTime = Math.round(intersection.x);
        }

        // start range here
        if (s2DataItem.get("valueY") > s1DataItem.get("valueY")) {
            if (!rangeDataItem) {
                rangeDataItem = xAxis.makeDataItem({});
                var range = series1.createAxisRange(rangeDataItem);
                rangeDataItem.set("value", startTime);
                range.fills.template.setAll({
                    fill: series2.get("fill"),
                    fillOpacity: 0.6,
                    visible: true,
                });
                range.strokes.template.setAll({
                    stroke: series1.get("stroke"),
                    strokeWidth: 1,
                });
            }
        } else {
            // if negative range started
            if (rangeDataItem) {
                rangeDataItem.set("endValue", startTime);
            }

            rangeDataItem = undefined;
        }
        // end if last
        if (i == series1.dataItems.length - 1) {
            if (rangeDataItem) {
                rangeDataItem.set(
                    "endValue",
                    s1DataItem.get("valueX") + baseDuration / 2
                );
                rangeDataItem = undefined;
            }
        }

        i++;
    });

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series1.appear(1000);
    series2.appear(1000);
    chart.appear(1000, 100);

    function getLineIntersection(pointA1, pointA2, pointB1, pointB2) {
        let x =
            ((pointA1.x * pointA2.y - pointA2.x * pointA1.y) *
                (pointB1.x - pointB2.x) -
                (pointA1.x - pointA2.x) *
                    (pointB1.x * pointB2.y - pointB1.y * pointB2.x)) /
            ((pointA1.x - pointA2.x) * (pointB1.y - pointB2.y) -
                (pointA1.y - pointA2.y) * (pointB1.x - pointB2.x));
        let y =
            ((pointA1.x * pointA2.y - pointA2.x * pointA1.y) *
                (pointB1.y - pointB2.y) -
                (pointA1.y - pointA2.y) *
                    (pointB1.x * pointB2.y - pointB1.y * pointB2.x)) /
            ((pointA1.x - pointA2.x) * (pointB1.y - pointB2.y) -
                (pointA1.y - pointA2.y) * (pointB1.x - pointB2.x));
        return {
            x: x,
            y: y,
        };
    }

    //obtener datos al cambiar select
    $(document).on("change", "#traderIdInput", function (e) {
        traderID = $("#traderIdInput").val();
    });
}); // end am5.ready()
