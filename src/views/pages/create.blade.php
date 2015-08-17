@extends('genealabs-bones-library::master')

@section('innerContent')
    <h1 class="page-header">Add Page</h1>
    @if (Auth::check() && Auth::user()->hasPermissionTo('add', 'any', 'page'))
        {!! Form::open(['route' => 'pages.store', 'method' => 'POST', 'class' => 'form-horizontal well']) !!}

        <div class="form-group{{ (count($errors) > 0) ? (($errors->has('title')) ? ' has-feedback has-error' : ' has-feedback has-success') : '' }}">
            {!! Form::label('book_id', 'Book', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-5">
                {!! Form::select('book_id', $books->lists('title', 'id'), $selectedBook, ['class' => 'form-control', ((Auth::user()->hasPermissionTo('change', 'any', 'page')) ? 'enabled' : 'disabled') => '']) !!}
                @if (count($errors))
                    <span class="glyphicon {{ ($errors->has('title')) ? ' glyphicon-remove' : ' glyphicon-ok' }} form-control-feedback"></span>
                @endif
            </div>
            {{ $errors->first('title', '<span class="help-block col-sm-5">:message</span>') }}
        </div>

        <div class="form-group{{ (count($errors) > 0) ? (($errors->has('title')) ? ' has-feedback has-error' : ' has-feedback has-success') : '' }}">
            {!! Form::label('title', 'Title', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-5">
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                @if (count($errors))
                    <span class="glyphicon {{ ($errors->has('title')) ? ' glyphicon-remove' : ' glyphicon-ok' }} form-control-feedback"></span>
                @endif
            </div>
            {{ $errors->first('title', '<span class="help-block col-sm-5">:message</span>') }}
        </div>
        <div class="form-group{{ (count($errors) > 0) ? (($errors->has('summary')) ? ' has-feedback has-error' : ' has-feedback has-success') : '' }}">
            {!! Form::label('summary', 'Summary', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-5">
                {!! Form::textarea('summary', null, ['class' => 'form-control', 'data-provide' => 'markdown']) !!}
                @if (count($errors))
                    <span class="glyphicon {{ ($errors->has('summary')) ? ' glyphicon-remove' : ' glyphicon-ok' }} form-control-feedback"></span>
                @endif
            </div>
            {{ $errors->first('summary', '<span class="help-block col-sm-5">:message</span>') }}
        </div>
        <div class="form-group{{ (count($errors) > 0) ? (($errors->has('content')) ? ' has-feedback has-error' : ' has-feedback has-success') : '' }}">
            {!! Form::label('content', 'Content', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-5">
                {!! Form::textarea('content', null, ['class' => 'form-control', 'data-provide' => 'markdown']) !!}
                @if (count($errors))
                    <span class="glyphicon {{ ($errors->has('content')) ? ' glyphicon-remove' : ' glyphicon-ok' }} form-control-feedback"></span>
                @endif
            </div>
            {{ $errors->first('content', '<span class="help-block col-sm-5">:message</span>') }}
        </div>
        <div class="form-group{{ (count($errors) > 0) ? (($errors->has('message')) ? ' has-feedback has-error' : ' has-feedback has-success') : '' }}">
            <div class="col-sm-2">
                {!! link_to_route('pages.index', 'Cancel', null, ['class' => 'btn btn-default pull-right']) !!}
            </div>
            <div class="col-sm-10">
                {!! Form::submit('Add Page', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    @else
        <div class="panel panel-danger">
            <div class="panel-heading">Access Forbidden</div>
            <div class="panel-body">
                You don't have access to create pages. Please contact your admin to check if you have the necessary permissions.
            </div>
            <div class="panel-footer">
                {!! link_to('/', 'Return to home page.', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    @endif
@stop
