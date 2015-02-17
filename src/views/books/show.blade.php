@extends('bones-library::master')

@section('innerContent')
    <div class="page-header">
        <div class="pull-right">
            @if (Auth::check() && Auth::user()->hasPermissionTo('edit', 'any', 'book'))
                {{ link_to_route('books.edit', 'Edit This Book', $book->id, ['class' => 'btn btn-default']) }}
            @endif
            @if (Auth::check() && Auth::user()->hasPermissionTo('create', 'any', 'page'))
                {{ link_to_route('pages.create', 'Add New Page', null, ['class' => 'btn btn-primary']) }}
            @endif
        </div>
        <h1>{{ $book->title }}</h1>
    </div>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    @foreach ($book->pages as $page)
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading-{{ $page->id }}">
                        <h2 class="panel-title">
                            {{ HTML::decode(link_to_route('pages.edit', '<span class="glyphicon glyphicon-edit"></span>', $page->id, ['class' => 'btn btn-sm btn-default pull-right'])) }}
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $page->id }}" aria-expanded="true" aria-controls="collapse-{{ $page->id }}">
                                {{ $page->title }}
                            </a>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div id="collapse-{{ $page->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-{{ $page->id }}">
                        <div class="panel-body">
                            {{ Markdown::string($page->summary) }}
                        </div>
                        <div class="panel-body">
                            {{ Markdown::string($page->content) }}
                        </div>
                    </div>
                </div>
    @endforeach
    </div>
    <script>
        $(document).ready(function () {
            $('.collapse').collapse();
            $('#accordion').on('show.bs.collapse', function () {
                $('#accordion .in').collapse('hide');
            });
        });
    </script>
@stop
