@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Wilayas' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('wilayas.wilayas.destroy', $wilayas->id_wilaya) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('wilayas.wilayas.index') }}" class="btn btn-primary" title="Show All Wilayas">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('wilayas.wilayas.create') }}" class="btn btn-success" title="Create New Wilayas">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('wilayas.wilayas.edit', $wilayas->id_wilaya ) }}" class="btn btn-primary" title="Edit Wilayas">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Wilayas" onclick="return confirm(&quot;Click Ok to delete Wilayas.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Code Wilaya</dt>
            <dd>{{ $wilayas->code_wilaya }}</dd>
            <dt>Nom Wilaya</dt>
            <dd>{{ $wilayas->nom_wilaya }}</dd>

        </dl>

    </div>
</div>

@endsection