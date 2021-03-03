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
                <h4 class="mt-5 mb-5">Corps</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('corps.corps.create') }}" class="btn btn-success" title="Create New Corps">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($corpsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Corps Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Lib  Corps Fr</th>
                            <th>Lib  Corps Ar</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($corpsObjects as $corps)
                        <tr>
                            <td>{{ $corps->Lib_CorpsFr }}</td>
                            <td>{{ $corps->Lib_CorpsAr }}</td>

                            <td>

                                <form method="POST" action="{!! route('corps.corps.destroy', $corps->Id_Corps) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('corps.corps.show', $corps->Id_Corps ) }}" class="btn btn-info" title="Show Corps">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('corps.corps.edit', $corps->Id_Corps ) }}" class="btn btn-primary" title="Edit Corps">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Corps" onclick="return confirm(&quot;Click Ok to delete Corps.&quot;)">
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
            {!! $corpsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection