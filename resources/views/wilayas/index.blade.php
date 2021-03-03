@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Wilayas</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('wilayas.wilayas.create') }}" class="btn btn-success" title="Create New Wilayas">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($wilayasObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Wilayas Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Code Wilaya</th>
                            <th>Nom Wilaya</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($wilayasObjects as $wilayas)
                        <tr>
                            <td>{{ $wilayas->code_wilaya }}</td>
                            <td>{{ $wilayas->nom_wilaya }}</td>

                            <td>

                                <form method="POST" action="{!! route('wilayas.wilayas.destroy', $wilayas->id_wilaya) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('wilayas.wilayas.show', $wilayas->id_wilaya ) }}" class="btn btn-info" title="Show Wilayas">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('wilayas.wilayas.edit', $wilayas->id_wilaya ) }}" class="btn btn-primary" title="Edit Wilayas">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Wilayas" onclick="return confirm(&quot;Click Ok to delete Wilayas.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $wilayasObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection