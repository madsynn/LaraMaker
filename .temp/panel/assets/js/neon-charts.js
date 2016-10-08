(function ($, window, undefined) {
    "use strict";

    $(document).ready(function () {

        if (typeof Morris != 'undefined') {
            $.get(url+'/admin/visitors/api/os_usage', function(data){
                Morris.Donut({
                    element: 'os_usage',
                    data: data,
                    formatter: function (x, data) {
                        return data.formatted;
                    },
                    colors: ['#b92527', '#d13c3e', '#ff6264', '#ffaaab']
                });
            });

        }
        if (typeof Morris != 'undefined') {
            $.get(url+'/admin/visitors/api/browser_usage', function(data){
                Morris.Donut({
                    element: 'browser_usage',
                    data: data,
                    formatter: function (x, data) {
                        return data.formatted;
                    },
                    colors: ['#388f36', '#3ac237', '#3ac237', '#3ac237']
                });
            });

        }


        // Peity Graphs
        if ($.isFunction($.fn.peity)) {
            $("span.pie").peity("pie", {colours: ['#0e8bcb', '#57b400'], width: 150, height: 25});
            $(".panel span.line").peity("line", {width: 150});
            $("span.bar").peity("bar", {width: 150});

            var updatingChart = $(".updating-chart").peity("line", {width: 150})

            setInterval(function () {
                var random = Math.round(Math.random() * 10);
                var values = updatingChart.text().split(",");

                values.shift()
                values.push(random);

                updatingChart.text(values.join(",")).change();
                $("#peity-right-now").text(random + ' user' + (random != 1 ? 's' : ''));

            }, 1000)
        }


    });

})(jQuery, window);


function data(offset) {
    var ret = [];
    for (var x = 0; x <= 360; x += 10) {
        var v = (offset + x) % 360;
        ret.push({
            x: x,
            y: Math.sin(Math.PI * v / 180).toFixed(4),
            z: Math.cos(Math.PI * v / 180).toFixed(4),
        });
    }
    return ret;
}


function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}