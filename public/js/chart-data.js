var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};
var url = 'admin/bills/chart';
var Days = new Array();
var Labels = new Array();
var Prices = new Array();
$(document).ready(function(){
    $.get(url, function(response){
        response.forEach(function(data){
            Days.push(data.payment_date);
            Prices.push(data.revenue);
        });
        var lineChartData = {
            labels : Days,
            datasets : [
                {
                    label: "My Second dataset",
                    fillColor : "rgba(48, 164, 255, 0.2)",
                    strokeColor : "rgba(48, 164, 255, 1)",
                    pointColor : "rgba(48, 164, 255, 1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(48, 164, 255, 1)",
                    data : Prices
                }
            ]
        };

        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true
        });
    });
});