@extends('bones-library::master')

@section('innerContent')
    <div class="page-header">
        @if (Auth::check() && Auth::user()->hasPermissionTo('create', 'any', 'book'))
            {{ link_to_route('books.create', 'Add New Book', null, ['class' => 'btn btn-success btn-lg pull-right']) }}
        @endif
        <h1>Books</h1>
    </div>
    @if (Auth::check() && Auth::user()->hasPermissionTo('view', 'any', 'book'))
        <div class="list-group">
            @foreach($books as $book)
                <a {{ ((Auth::user()->hasPermissionTo('inspect', 'any', 'book')) ? 'href="' . route('books.show', $book->id) . '"' : '') }} class="list-group-item">
                    <h4 class="list-group-item-heading">{{ $book->title }}</h4>
                    <p class="list-group-item-text">{{ Markdown::string($book->description) }}</p>
                </a>
            @endforeach
        </div>
    @else
        <div class="panel panel-danger">
            <div class="panel-heading">Access Forbidden</div>
            <div class="panel-body">
                You don't have access to view books. Please contact your admin to check if you have the necessary permissions.
            </div>
            <div class="panel-footer">
                {{ link_to('/', 'Return to home page.', ['class' => 'btn btn-success']) }}
            </div>
        </div>
    @endif
@stop
