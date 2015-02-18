@extends(Config::get('bones-library::layoutView'))

@section('content')
    {{ HTML::script('/packages/genealabs/bones-library/js/scripts.js') }}
    <style>
        @import url('/packages/genealabs/bones-library/css/styles.css');
    </style>
    <div class="container">
        {{--@include('bones-library::menu')--}}
        @yield('innerContent')
    </div>
@stop
