("use strict");

var SalesChart = (function () {
    // Variables

    var $chart = $("#chart-gizi");

    // Methods

    function init($chart) {
        var salesChart = new Chart($chart, {
            type: "line",
            options: {
                scales: {
                    yAxes: [
                        {
                            gridLines: {
                                color: Charts.colors.gray[900],
                                zeroLineColor: Charts.colors.gray[900],
                            },
                            ticks: {
                                callback: function (value) {
                                    if (!(value % 10)) {
                                        return "$" + value + "k";
                                    }
                                },
                            },
                        },
                    ],
                },
                tooltips: {
                    callbacks: {
                        label: function (item, data) {
                            var label =
                                data.datasets[item.datasetIndex].label || "";
                            var yLabel = item.yLabel;
                            var content = "";

                            if (data.datasets.length > 1) {
                                content +=
                                    '<span class="popover-body-label mr-auto">' +
                                    label +
                                    "</span>";
                            }

                            content +=
                                '<span class="popover-body-value">$' +
                                yLabel +
                                "k</span>";
                            return content;
                        },
                    },
                },
            },
            data: {
                labels: ["0 - 12", "13 - 36", "37 - 60"],
                datasets: [
                    {
                        label: "Rata Rata Gizi",
                        data: dataGizi,
                    },
                ],
            },
        });

        // Save to jQuery object

        $chart.data("chart", salesChart);
    }

    // Events

    if ($chart.length) {
        init($chart);
    }
})();
