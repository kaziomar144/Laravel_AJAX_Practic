<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BarChart</title>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <div style="width: 900px; height:400px; margin:auto">
        <canvas id="barChart"></canvas>
    </div>

    <br>
    <div
id="myChart" style="width:100%; max-width:600px; height:500px; margin-top:40px;">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
var barDatas = {{json_encode($datas)}};
console.log(barDatas);
function drawChart() {
var data = google.visualization.arrayToDataTable([
  ['Month', 'Mhl'],
  ['Jan',barDatas[0]],
  ['Feb',barDatas[1]],
  ['Mar',barDatas[2]],
  ['Apr',barDatas[3]],
  ['May',barDatas[4]],
  ['Jun',barDatas[5]],
  ['July',barDatas[6]],
  ['Aug',barDatas[7]],
  ['Sep',barDatas[8]],
  ['Oct',barDatas[9]],
  ['Nov',barDatas[10]],
  ['Dec',barDatas[11]]
]);

var options = {
  title:'World Wide Wine Production',
  is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>

    <script>
        $(function(){
            let xValues = ['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec'];
            let barColors = ['red','Orange','yellow','green','blue','indigo','violet','purple','pink','silver','gold','brown'];
            let datas = {{json_encode($datas)}};
            let barCanvas = $("#barChart");
            let barChart = new Chart(barCanvas,{
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        label:"New User Growth, {{date('Y')}}",
                        backgroundColor: barColors,
                        data: datas,
                    }]
                },
                options: {
                    legend: {display: true},
                    title: {
                    display: true,
                    text: "World Wine Production 2018"
                    }
                }
            })
            

        })
    </script>
</body>
</html>