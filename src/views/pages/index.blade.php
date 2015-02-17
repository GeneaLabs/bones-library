@extends('bones-library::master')

@section('innerContent')
    <div class="page-header">
        @if (Auth::check() && Auth::user()->hasPermissionTo('create', 'any', 'page'))
            {{ link_to_route('pages.create', 'Add New Page', null, ['class' => 'btn btn-success btn-lg pull-right']) }}
        @endif
        <h1>Pages</h1>
    </div>
    @if (Auth::check() && Auth::user()->hasPermissionTo('view', 'any', 'page'))
        <div class="list-group">
            @foreach($pages as $page)
                <a {{ ((Auth::user()->hasPermissionTo('edit', 'any', 'page')) ? 'href="' . route('pages.edit', $page->id) . '"' : '') }} class="list-group-item">
                    <h4 class="list-group-item-heading">{{ $page->title }}</h4>
                    <p class="list-group-item-text">{{ $page->summary }}</p>
                </a>
            @endforeach
        </div>
    @else
        <div class="panel panel-danger">
            <div class="panel-heading">Access Forbidden</div>
            <div class="panel-body">
                You don't have access to view pages. Please contact your admin to check if you have the necessary permissions.
            </div>
            <div class="panel-footer">
                {{ link_to('/', 'Return to home page.', ['class' => 'btn btn-success']) }}
            </div>
        </div>
    @endif
@stop
