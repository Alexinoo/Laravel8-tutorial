@extends('layouts.master')

@section('title', 'High Charts')

@section('content')
    <div id="chart-container"></div>
@endsection

@section('scripts')
    <script>
        let datas = <?php echo json_encode($datas); ?>

        Highcharts.chart('chart-container' , {
            title : {
                text : 'New User Growth , 2020'
            },
            subtitle : {
                text : 'Source : Coding Pro'
            },
            xAxis : {
                categories : ['Jan','Feb','Mar','Apr','May','Jun','May','Jun','Jul','Aug','Sep','Oct','Sep','Nov','Dec']
            },
            yAxis : {
                title : 'No of New user'
            },
            legend : {
                layout : 'vertical',
                align : 'right' ,
                verticalAlign : 'middle'
            },
            plotOptions : {
                series : {
                    allowPointSelect : true
                }
            },
            series : [{
                 name : 'New User',
                 data : datas
            }],
            responsive : {
                rules : [ {
                       condition : {
                           maxWidth:500
                       } ,
                       chartOptions : {
                           legend : {
                               layout : 'horizontal' ,
                               align : 'center' ,
                               verticalAlign : 'bottom'
                           }
                       }
                    }]
            }
        });

    </script>
@endsection