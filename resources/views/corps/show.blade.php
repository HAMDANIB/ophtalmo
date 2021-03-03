@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Corps' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('corps.corps.destroy', $corps->Id_Corps) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('corps.corps.index') }}" class="btn btn-primary" title="Show All Corps">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('corps.corps.create') }}" class="btn btn-success" title="Create New Corps">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('corps.corps.edit', $corps->Id_Corps ) }}" class="btn btn-primary" title="Edit Corps">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Corps" onclick="return confirm(&quot;Click Ok to delete Corps.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Lib  Corps Fr</dt>
            <dd>{{ $corps->Lib_CorpsFr }}</dd>
            <dt>Lib  Corps Ar</dt>
            <dd>{{ $corps->Lib_CorpsAr }}</dd>

        </dl>

    </div>
</div>

@endsection