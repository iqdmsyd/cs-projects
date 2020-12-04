var chart = AmCharts.makeChart("sales_daily", {
    "type": "serial",
    "hideCredits": true,
    "theme": "light",
    "dataDateFormat": "YYYY-MM-DD",
    "precision": 0,
    "valueAxes": [{
        "id": "v1",
        "title": "Sales",
        "position": "left",
        "autoGridCount": false
    }, {
        "id": "v2",
        // "title": "New Visitors",
        "gridAlpha": 0,
        "position": "right",
        "autoGridCount": false
    }],
    "graphs": [{
        "id": "g3",
        "valueAxis": "v1",
        "lineColor": "#feb798",
        "fillColors": "#feb798",
        "fillAlphas": 1,
        "type": "column",
        "title": "Infant",
        "valueField": "INFANT",
        "clustered": false,
        "columnWidth": 0.5,
        "legendValueText": "[[value]]",
        "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
    }, {
        "id": "g4",
        "valueAxis": "v1",
        "lineColor": "#1B68B1",
        "fillColors": "#1B68B1",
        "fillAlphas": 1,
        "type": "column",
        "title": "Adult",
        "valueField": "ADULT",
        "clustered": false,
        "columnWidth": 0.3,
        "legendValueText": "[[value]]",
        "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
    }, {
        "id": "g1",
        "valueAxis": "v1",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "lineColor": "#0df3a3",
        "type": "smoothedLine",
        "title": "Sales",
        "useLineColorForBulletBorder": true,
        "valueField": "SALES",
        "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
    }],
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha": 0,
        "valueLineAlpha": 0.2
    },
    "categoryField": "NICEDATE",
    "categoryAxis": {
        "parseDates": true,
        "dashLength": 1,
        "minorGridEnabled": true
    },
    "legend": {
        "useGraphSettings": true,
        "position": "top"
    },
    "balloon": {
        "borderThickness": 1,
        "cornerRadius": 5,
        "shadowAlpha": 0
    },
    "dataLoader": {
        "url": "analytics/get_json_daily_sales",
        "format": "json"
    }
});

am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.PieChart);

    // Add data
    chart.dataSource.url = "analytics/get_json_daily_sales_detail"

    // Set inner radius
    chart.innerRadius = am4core.percent(50);

    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "sales";
    pieSeries.dataFields.category = "type";
    pieSeries.slices.template.stroke = am4core.color("#fff");
    pieSeries.slices.template.strokeWidth = 2;
    pieSeries.slices.template.strokeOpacity = 1;

    // This creates initial animation
    pieSeries.hiddenState.properties.opacity = 1;
    pieSeries.hiddenState.properties.endAngle = -90;
    pieSeries.hiddenState.properties.startAngle = -90;


    var chart2 = am4core.create("chartdiv2", am4charts.PieChart);
    chart2.dataSource.url = "analytics/get_json_daily_sales_by_dimension"
    // chart2.data = [ {
    //   "DIM": "Lithuania",
    //   "SALES": 501.9
    // }, {
    //   "DIM": "Czech Republic",
    //   "SALES": 301.9
    // }];
    //
    // Set inner radius
    chart2.innerRadius = am4core.percent(50);
    //
    // // Add and configure Series
    var pieSeries2 = chart2.series.push(new am4charts.PieSeries());
    pieSeries2.dataFields.value = "SALES";
    pieSeries2.dataFields.category = "DIM";
    pieSeries2.slices.template.stroke = am4core.color("#fff");
    pieSeries2.slices.template.strokeWidth = 2;
    pieSeries2.slices.template.strokeOpacity = 1;

    // This creates initial animation
    pieSeries2.hiddenState.properties.opacity = 1;
    pieSeries2.hiddenState.properties.endAngle = -90;
    pieSeries2.hiddenState.properties.startAngle = -90;

}); // end am4core.ready()
