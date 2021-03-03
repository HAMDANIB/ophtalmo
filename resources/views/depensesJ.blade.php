@extends('layouts.mainlayout')
@section('content')
            <div class="row">
                <div class="col-md-auto"><h3>Dépenses Journalière du</h3></div>
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
                            <th>NomVendeur</th>
                            <th> Dépense </th>  
                            <th> Catégorie </th>  
                            <th> Type</th> 
                            <th> Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($DepObjects as $dep)
                        <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $dep->NomVendeur}}</td>
                        <td>{{ number_format($dep->Dépense, 2)}}</td> 
                        <td>{{ $dep->Quategorie }}</td> 
                        <td>{{ $dep->Type }}</td>
                        <td>{{ $dep->Description }}</td> 
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

        var url = '{{ route("FilrerDepJ",":FiltDate") }}';       
        url = url.replace(':FiltDate', dateFiltre);
        document.location.href = url;
      
       }

      

</script> 

@endsection                          