@extends('genealabs-bones-library::master')

@section('innerContent')
        <h1 class="page-header">Edit Book</h1>
        @if (Auth::check() && Auth::user()->hasPermissionTo('change', 'any', 'book'))
        <div class="well">
            {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'id' => 'editForm']) !!}
                <div class="form-group{{ (count($errors) > 0) ? (($errors->has('title')) ? ' has-feedback has-error' : ' has-feedback has-success') : '' }}">
                    {!! Form::label('title', 'Title', ['class' => 'control-label col-sm-2']) !!}
                    <div class="col-sm-5">
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        @if (count($errors))
                        <span class="glyphicon {{ ($errors->has('title')) ? ' glyphicon-remove' : ' glyphicon-ok' }} form-control-feedback"></span>
                        @endif
                    </div>
                    {{ $errors->first('name', '<span class="help-block col-sm-5">:message</span>') }}
                </div>
                <div class="form-group{{ (count($errors) > 0) ? (($errors->has('description')) ? ' has-feedback has-error' : ' has-feedback has-success') : '' }}">
                    {!! Form::label('description', 'Description', ['class' => 'control-label col-sm-2']) !!}
                    <div class="col-sm-5">
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        @if (count($errors))
                        <span class="glyphicon {{ ($errors->has('description')) ? ' glyphicon-remove' : ' glyphicon-ok' }} form-control-feedback"></span>
                        @endif
                    </div>
                    {{ $errors->first('description', '<span class="help-block col-sm-5">:message</span>') }}
                </div>
            {!! Form::close() !!}
            {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'deleteForm']) !!}
            {!! Form::close() !!}
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-2">
                        {!! link_to_route('books.index', 'Cancel', null, ['class' => 'btn btn-default pull-left']) !!}
                    </div>
                    <div class="col-sm-10 btn-group">
                        {!! Form::button('Update Book', ['class' => 'btn btn-success', 'onclick' => 'submitForm($("#editForm"))']) !!}
                        {!! Form::button('Delete Book', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#deleteModal']) !!}
                    </div>
                </div>
            </div>
        </div>
    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content panel-danger">
                <div class="modal-header panel-heading">
                    <h4 class="modal-title">Delete this Book?</h4>
                </div>
                <div class="modal-body">
                    <p>Are you absolutely sure you want to destroy this poor book? It will be blasted to oblivion, if you continue to the affirmative.</p>
                </div>
                <div class="modal-footer panel-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger pull-right" onclick="submitForm($('#deleteForm'))">Delete Book</button>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="panel panel-danger">
        <div class="panel-heading">Access Forbidden</div>
        <div class="panel-body">
            You don't have access to edit (this, or perhaps any) book. Please contact your admin to check if you have the necessary permissions.
        </div>
        <div class="panel-footer">
            {!! link_to('/', 'Return to home page.', ['class' => 'btn btn-success']) !!}
        </div>
    </div>
    @endif
@stop
