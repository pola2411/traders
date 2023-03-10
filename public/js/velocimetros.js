am5.ready(function () {
    var root = am5.Root.new("velocimetro1");
    root.setThemes([am5themes_Animated.new(root)]);
    var chart = root.container.children.push(
        am5radar.RadarChart.new(root, {
            panX: false,
            panY: false,
            startAngle: 160,
            endAngle: 380,
        })
    );
    var axisRenderer = am5radar.AxisRendererCircular.new(root, {
        innerRadius: -40,
    });
    axisRenderer.grid.template.setAll({
        stroke: root.interfaceColors.get("background"),
        visible: true,
        strokeOpacity: 0.8,
    });
    var xAxis = chart.xAxes.push(
        am5xy.ValueAxis.new(root, {
            maxDeviation: 0,
            min: -40,
            max: 100,
            strictMinMax: true,
            renderer: axisRenderer,
        })
    );
    var axisDataItem = xAxis.makeDataItem({});
    var clockHand = am5radar.ClockHand.new(root, {
        pinRadius: am5.percent(20),
        radius: am5.percent(100),
        bottomWidth: 40,
    });
    var bullet = axisDataItem.set(
        "bullet",
        am5xy.AxisBullet.new(root, {
            sprite: clockHand,
        })
    );
    xAxis.createAxisRange(axisDataItem);
    var label = chart.radarContainer.children.push(
        am5.Label.new(root, {
            fill: am5.color(0xffffff),
            centerX: am5.percent(50),
            textAlign: "center",
            centerY: am5.percent(50),
            fontSize: "3em",
        })
    );
    axisDataItem.set("value", 50);
    bullet.get("sprite").on("rotation", function () {
        var value = axisDataItem.get("value");
        var text = Math.round(axisDataItem.get("value")).toString();
        var fill = am5.color(0x000000);
        xAxis.axisRanges.each(function (axisRange) {
            if (
                value >= axisRange.get("value") &&
                value <= axisRange.get("endValue")
            ) {
                fill = axisRange.get("axisFill").get("fill");
            }
        });

        label.set("text", Math.round(value).toString());

        clockHand.pin.animate({
            key: "fill",
            to: fill,
            duration: 500,
            easing: am5.ease.out(am5.ease.cubic),
        });
        clockHand.hand.animate({
            key: "fill",
            to: fill,
            duration: 500,
            easing: am5.ease.out(am5.ease.cubic),
        });
    });
    setInterval(function () {
        axisDataItem.animate({
            key: "value",
            to: Math.round(Math.random() * 140 - 40),
            duration: 500,
            easing: am5.ease.out(am5.ease.cubic),
        });
    }, 2000);
    chart.bulletsContainer.set("mask", undefined);
    var bandsData = [
        {
            title: "Unsustainable",
            color: "#ee1f25",
            lowScore: -40,
            highScore: -20,
        },
        {
            title: "Volatile",
            color: "#f04922",
            lowScore: -20,
            highScore: 0,
        },
        {
            title: "Foundational",
            color: "#fdae19",
            lowScore: 0,
            highScore: 20,
        },
        {
            title: "Developing",
            color: "#f3eb0c",
            lowScore: 20,
            highScore: 40,
        },
        {
            title: "Maturing",
            color: "#b0d136",
            lowScore: 40,
            highScore: 60,
        },
        {
            title: "Sustainable",
            color: "#54b947",
            lowScore: 60,
            highScore: 80,
        },
        {
            title: "High Performing",
            color: "#0f9747",
            lowScore: 80,
            highScore: 100,
        },
    ];
    am5.array.each(bandsData, function (data) {
        var axisRange = xAxis.createAxisRange(xAxis.makeDataItem({}));
        axisRange.setAll({
            value: data.lowScore,
            endValue: data.highScore,
        });
        axisRange.get("axisFill").setAll({
            visible: true,
            fill: am5.color(data.color),
            fillOpacity: 0.8,
        });
        axisRange.get("label").setAll({
            text: data.title,
            inside: true,
            radius: 15,
            fontSize: "0.9em",
            fill: root.interfaceColors.get("background"),
        });
    });
    chart.appear(1000, 100);
});

am5.ready(function () {
    var root = am5.Root.new("velocimetro2");
    root.setThemes([am5themes_Animated.new(root)]);
    var chart = root.container.children.push(
        am5radar.RadarChart.new(root, {
            panX: false,
            panY: false,
            startAngle: 180,
            endAngle: 360,
        })
    );
    var axisRenderer = am5radar.AxisRendererCircular.new(root, {
        innerRadius: -10,
        strokeOpacity: 1,
        strokeWidth: 15,
        strokeGradient: am5.LinearGradient.new(root, {
            rotation: 0,
            stops: [
                { color: am5.color(0x19d228) },
                { color: am5.color(0xf4fb16) },
                { color: am5.color(0xf6d32b) },
                { color: am5.color(0xfb7116) },
            ],
        }),
    });
    var xAxis = chart.xAxes.push(
        am5xy.ValueAxis.new(root, {
            maxDeviation: 0,
            min: 0,
            max: 100,
            strictMinMax: true,
            renderer: axisRenderer,
        })
    );
    var axisDataItem = xAxis.makeDataItem({});
    axisDataItem.set("value", 0);
    var bullet = axisDataItem.set(
        "bullet",
        am5xy.AxisBullet.new(root, {
            sprite: am5radar.ClockHand.new(root, {
                radius: am5.percent(99),
            }),
        })
    );
    xAxis.createAxisRange(axisDataItem);
    axisDataItem.get("grid").set("visible", false);
    setInterval(() => {
        axisDataItem.animate({
            key: "value",
            to: Math.round(Math.random() * 100),
            duration: 800,
            easing: am5.ease.out(am5.ease.cubic),
        });
    }, 2000);
    chart.appear(1000, 100);
});

am5.ready(function () {
    var root = am5.Root.new("velocimetro3");
    root.setThemes([am5themes_Animated.new(root)]);
    var chart = root.container.children.push(
        am5radar.RadarChart.new(root, {
            panX: false,
            panY: false,
            startAngle: 180,
            endAngle: 360,
        })
    );
    var axisRenderer = am5radar.AxisRendererCircular.new(root, {
        innerRadius: -30,
        strokeOpacity: 0.1,
    });
    axisRenderer.labels.template.set("forceHidden", true);
    axisRenderer.grid.template.set("forceHidden", true);
    var xAxis = chart.xAxes.push(
        am5xy.ValueAxis.new(root, {
            maxDeviation: 0,
            min: 0,
            max: 1,
            strictMinMax: true,
            renderer: axisRenderer,
        })
    );
    var yesDataItem = xAxis.makeDataItem({});
    yesDataItem.set("value", 0);
    yesDataItem.set("endValue", 0.5);
    xAxis.createAxisRange(yesDataItem);
    yesDataItem.get("label").setAll({ text: "YES", forceHidden: false });
    yesDataItem.get("axisFill").setAll({
        visible: true,
        fillOpacity: 1,
        fill: root.interfaceColors.get("positive"),
    });
    var noDataItem = xAxis.makeDataItem({});
    noDataItem.set("value", 1);
    noDataItem.set("endValue", 0.5);
    xAxis.createAxisRange(noDataItem);
    noDataItem.get("label").setAll({ text: "NO", forceHidden: false });
    noDataItem.get("axisFill").setAll({
        visible: true,
        fillOpacity: 1,
        fill: root.interfaceColors.get("negative"),
    });
    var axisDataItem = xAxis.makeDataItem({});
    axisDataItem.set("value", 0.25);
    var bullet = axisDataItem.set(
        "bullet",
        am5xy.AxisBullet.new(root, {
            sprite: am5radar.ClockHand.new(root, {
                radius: am5.percent(99),
            }),
        })
    );
    xAxis.createAxisRange(axisDataItem);
    axisDataItem.get("grid").set("visible", false);
    let value = 0.25;
    setInterval(function () {
        if (value == 0.25) {
            value = 0.75;
        } else {
            value = 0.25;
        }

        axisDataItem.animate({
            key: "value",
            to: value,
            duration: 800,
            easing: am5.ease.out(am5.ease.cubic),
        });
    }, 2000);
    chart.appear(1000, 100);
});
