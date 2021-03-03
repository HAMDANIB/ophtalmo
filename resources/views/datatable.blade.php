

@extends('layouts.mainlayout')

@section('style')	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"> 
@endsection


@section('content')

			<div class="container-fluid">
			  <h2>Basic Table</h2>			              


                        <table class="table table-bordered" id="my-table">
                            <thead>
                            <tr>
          				        	<th>Numero malade</th>
          					        <th>Date</th>
          					        <th>DIAGNOSTIC</th>
          					        <th>INDICATION</th>
                            </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                        </table>
			</div>
@endsection


@section('scripts')
   <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>	
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>	

<script>
  $(document).ready (function() {
    $('#my-table').DataTable({
        processing: true,
        serverSide: true,
        retrieve: true,
        ajax: 'ajax1',
        columns: [
            { data: 'DNumeroMalade',  sortable: false },
            { data: 'date', name: 'fname' },
            { data: 'DIAGNOSTIC', name: 'DIAGNOSTIC' },
            { data: 'DIAGNOSTIC', name: 'DIAGNOSTIC' },
        ]

		});
	});
  </script>
@endsection



