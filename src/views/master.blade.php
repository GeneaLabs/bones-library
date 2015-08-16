@extends(config('genealabs-bones-library.layoutView'))

@section('content')
    <script src="{{ asset('genealabs-bones-library/js/selectize.min.js') }}"></script>
    <script src="{{ asset('genealabs-bones-library/js/scripts.js') }}"></script>
    <script src="{{ asset('genealabs-bones-library/js/bootstrap-markdown.js') }}"></script>
    <style>
        @import url('{{ asset('genealabs-bones-library/css/styles.css') }}');
        @import url('{{ asset('genealabs-bones-library/css/bootstrap-markdown.min.css') }}');
    </style>
    <div class="container">
        {{--@include('bones-library::menu')--}}
        @yield('innerContent')
    </div>
@stop
