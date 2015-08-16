@extends('genealabs-bones-library::master')

@section('innerContent')
    <div class="page-header">
        <div class="pull-right">
            @if (Auth::check() && Auth::user()->hasPermissionTo('change', 'any', 'book'))
                {!! link_to_route('books.edit', 'Edit This Book', $book->id, ['class' => 'btn btn-default']) !!}
            @endif
            @if (Auth::check() && Auth::user()->hasPermissionTo('add', 'any', 'page'))
                {!! link_to_route('pages.create', 'Add New Page', ['book' => $book->id], ['class' => 'btn btn-primary']) !!}
            @endif
        </div>
        <h1>{{ $book->title }}</h1>
    </div>
    <p class="lead">{{{ $book->description }}}</p>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    @foreach ($book->pages as $page)
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading-{{ $page->id }}">
                        <h2 class="panel-title">
                            <a class="btn btn-sm btn-default pull-right" href="{!! route('pages.edit', $page->id) !!}"><span class="glyphicon glyphicon-edit"></span></a>
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $page->id }}" aria-expanded="true" aria-controls="collapse-{{ $page->id }}">
                                {{ $page->title }}
                            </a>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div id="collapse-{{ $page->id }}" class="panel-collapse collapse {{ ($book->pages->count() == 1) ?: 'in' }}" role="tabpanel" aria-labelledby="heading-{{ $page->id }}">
                        @if (strlen(trim($page->summary)))
                        <div class="panel-body">
                            {!! $page->summary !!}
                        </div>
                        @endif
                        <div class="panel-body">
                            {!! $page->content !!}
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
