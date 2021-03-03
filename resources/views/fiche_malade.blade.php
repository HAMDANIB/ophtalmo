@extends('layouts.mainlayout')
@section('content')
<!-- <div class="pull-left">
                <h2>New Registre  du {{date('d-m-Y')}} </h2>
            </div> -->


            <div class="row">
                <div class="col-md-auto"><h3>New Registre du</h3></div>
                <div class="col-md-auto ">
                <input type="text" class="date form-control"  value = "{{$Date2 ?? ''}}" id="Mydatepicker"autocomplete="off" >
                </div>
                <div class="col-md-auto row ">
                <a class="btn btn-primary" onclick="disp()"  role="button">Filrer</a>
                <!-- <button class="btn btn-outline-secondary" type="button" onclick="disp()" >Filrer</button> -->
                </div>
                <div class="col-sm-3"></div>
            </div>
            <br> 

<table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>N° Malade</th>
                            <th> nom </th>  
                            <th> Prénom </th>  
                            <th> Age</th> 
                            <th> Consultation</th>
                            <th> Médecin</th>
                            <th> Paiement</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($FMObjects as $fm)
                        <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $fm->DNumeroMalade}}</td>
                        <td>{{ $fm->DNom }}</td>   
                        <td>{{ $fm->DPrenom }}</td> 
                        <td>{{ $fm->DAge }}</td>
                        <td>{{ $fm->Consultation }}</td>
                        <td>{{ $fm->Medecin }}</td>
                        <td>{{ number_format($fm->PAYE, 2)}}</td>
                                                  

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


                <script type="text/javascript">
    $('.date').datepicker({  
            format: 'yyyy-mm-dd',
            weekStart: 0,
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true,        
            orientation: "auto"       
       });  

    function disp(){
        var dateFiltre=document.getElementById('Mydatepicker').value;

        var url = '{{ route("FilrerNR",":FiltDate") }}';       
        url = url.replace(':FiltDate', dateFiltre);
        document.location.href = url;
      
       }

      

</script> 

@endsection                          