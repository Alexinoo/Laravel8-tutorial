@extends('layouts.master')

@section('title', 'Bar Charts')

@section('content')
   
<div style="height:400px;width:900px;margin:auto;">
    <canvas id="barChart"></canvas>
</div>
@endsection

@section('scripts')
<script>
$(function () {
       let datas = <?php echo json_encode($datas); ?>

       var barCanvas = $("#barChart");

       var barChart = new Chart(barCanvas , {
           type : 'bar',
           data : {
               labels :  ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
               datasets : [
                   {
                   label : 'New User Growth , 2022',
                   data : datas,
                   backgroundColor : ['red','orange','yellow','green','blue','indigo','violet','purple','pink','silver','gold','brown']
               }
            ]
           },
           options : {
               scales : {
                   yAxes : [{
                       ticks : {
                           beginAtZero : true
                       }
                   }]
               }
           }
       });
})

</script>   
@endsection