@extends('layouts.mainlayout')
@section('content')
          

             <!-- <div class="pull-left">
      <h2><input class="date form-control" type="text" value = "{{$Date1 ?? ''}}" id="Mydatepicker"autocomplete="off"></h2> <!--  {{date('d-m-Y')}} -->
             <!-- </div> --> 

             <!-- <div class="pull-left">
             <a class="btn btn-primary" onclick="disp()"  role="button">Filrer</a>
             </div>
             <br> -->

             <div class="row">
                <div class="col-md-auto"><h3>Liste d'attente du</h3></div>
                <div class="col-md-auto">
                <input type="text" class="date form-control"  value = "{{$Date1 ?? ''}}" id="Mydatepicker"autocomplete="off" >
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
                            <th>jeton</th>
                            <th>Etat</th>
                            <th>Nom</th>
                            <th>Prénom </th>  
                            <th>Age</th> 
                            <th>N° dossier</th>
                            <th>Consultation</th>
                            <th>Medecin</th>
                            <th>Transféré</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($LAObjects as $LA)
                        <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $LA->jeton   }}</td>
                        <td>{{ $LA->etat   }}</td>
                        <td>{{ $LA->nom   }}</td>  
                        <td>{{ $LA->prenom }}</td> 
                        <td>{{ $LA->age }}</td>                          
                        <td>{{ $LA->N_dossier }} </td>
                        <td>{{ $LA->Consultation }} </td>
                        <td>{{ $LA->Medecin }} </td>
                        <td>{{$LA->Transfert ? 'Oui' : 'Non'}} </td>

                        </tr>
                    @endforeach
                    </tbody>
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

        // document.getElementById('displayD').innerHTML=document.getElementById('Mydatepicker').value;
        // document.getElementById('Mydatepicker').value =Date();
        // document.getElementById('displayD').innerHTML =dateFiltre;

        var url = '{{ route("Filrer",":FiltDate") }}';       
        url = url.replace(':FiltDate', dateFiltre);
        document.location.href = url;
        // document.getElementById('Mydatepicker').value =dateFiltre;
       
       }

      

</script> 
@endsection                          