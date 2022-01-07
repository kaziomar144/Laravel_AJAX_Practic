<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>High Chart</title>
</head>
<body>

    <div id="chart-container"></div>

    <div id="myPlot" style="width:100%; margin-top:60px;" ></div>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script>
            var datas = {{json_encode($datas)}};
            Highcharts.chart('chart-container',{
                title:{
                    text:'New User Growth, 2021'
                },
                subtitle:{
                    text:'Source: Tahsan '
                },
                xAxis:{
                    categories:['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec']
                },
                yAxis:{
                    title:{
                        text:'Number of New User'
                    }
                },
                legend:{
                    layout:'vertical',
                    align:'right',
                    verticalAlign:'middel'
                },
                plotOptions:{
                    series:{
                        allowPointSelect:true
                    }
                },
                series:[{
                    name: 'New User',
                    data:datas
                }],
                responsive:{
                    rules:[
                        {
                            condition:{
                                maxWidth:500
                            },
                            chartOptions:{
                                legend:{
                                    layout:'horizontal',
                                    align:'center',
                                    verticalAlign:'bottom'
                                }
                            }
                        }
                    ]
                }
            })
    </script>

<script>
    var xArray = ['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec'];
    var yArray = [55, 49, 44, 24, 15];
    
    var data = [{
      x:xArray,
      y:datas,
      type:"bar"
    }];
    // var data = [{labels:xArray, values:datas, type:"pie"}];
    
    var layout = {title:"World Wide Wine Production"};
    
    Plotly.newPlot("myPlot", data, layout);
    </script>
</body>
</html>