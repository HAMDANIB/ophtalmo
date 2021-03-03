@extends('layouts.mainlayout')
@section('content')
           
            <form>
                <div class="form-row">
                    <div class="col-5">
                    <h3>Dépenses Mensuelles du mois de</h3>
                    </div>
                    <div class="col">
                    <!-- <input type="text" class="form-control" placeholder="Mois" value = "{{$MonthDate ?? ''}}" id="MyMonth"autocomplete="off"> -->

                    <select class="form-control" value = "{{$MonthDate ?? ''}}" id="MyMonth" >
                        <option value="1">Janvier</option>
                        <option value="2">Février</option>
                        <option value="3">Mars</option>
                        <option value="4">Avril</option>
                        <option value="5">Mai</option>
                        <option value="6">Juin</option>
                        <option value="7">Juillet</option>
                        <option value="8">Aout</option>
                        <option value="9">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select>


                    </div>
                    <div class="col">
                    <input type="text" class="form-control" placeholder="Année" value = "{{$AnneeDate ?? ''}}" id="Myear"autocomplete="off">
                    </div>
                    <div class="col">
                    <a class="btn btn-outline-primary" onclick="disp()"  role="button">Filrer</a>  
                    </div>
                </div>
            </form>
            
            
            <div class="container">
            <canvas id="myChart" style="display: block; width: 383px; height: 191px;" width="383" height="191" class="chartjs-render-monitor"></canvas>
            </div> 

<br>


<table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Date</th>
                            <th> Dépense </th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($DepObjects as $dep)
                        <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ date('d-m-Y', strtotime($dep->Date))}}</td>
                        <td class="text-right">{{ number_format($dep->Montant, 2)}}</td> 
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                   <tr>
                   <td><h4>Total </h4></td>
                   <td><h4>{{number_format($Totalpg ?? '',2) }} </h4></td>
                   </tr>
                    
                    </tfoot>
                </table>

               

 <script>
    var ctx = document.getElementById('myChart');
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
            labels: cData.label,
            datasets: [{
                        data: cData.data,
                        backgroundColor: ['rgba(54, 162, 235, 0.2)'],
                        borderColor: ['rgba(54, 162, 235, 1)'],
                        pointBackgroundColor: 'red',
                        borderWidth: 4
                      }]
          },
    options: {
              scales: {yAxes: [{ ticks: {beginAtZero: true} } ]},        
              legend: {display: false}
              }
            })
</script> 

<script>

      function disp(){
        var monthFiltre=document.getElementById('MyMonth').value;
        var yearFiltre=document.getElementById('Myear').value;
        document.location.href="/filtrerDepM/"+monthFiltre +"/"+yearFiltre;      
      
       }

 </script>


@endsection                          