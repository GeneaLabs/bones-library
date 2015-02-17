@extends('bones-library::master')

@section('innerContent')
    <h1 class="page-header">
        {{ $book->title }}
        @if (Auth::check() && Auth::user()->hasPermissionTo('create', 'any', 'book'))
            {{ link_to_route('books.edit', 'Edit This Book', $book->id, ['class' => 'btn btn-default btn-lg pull-right']) }}
        @endif
    </h1>
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
                            {{ $page->content }}
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
