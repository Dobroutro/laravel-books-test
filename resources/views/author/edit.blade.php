@extends('layouts.master')

@section('title') Create Author @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>


    
    <h1><i class='fa fa-user'></i> Edit Author</h1>


    {{ Form::model($item, ['role' => 'form', 'url' => '/authors/' . $item->id, 'method' => 'PUT']) }}

    <div class='form-group @if ($errors->has('name')) has-error @endif'>
        {{ Form::label('name', 'Author name') }}
        {{ Form::text('name', null, ['placeholder' => 'Author name', 'class' => 'form-control']) }}
        @if ($errors->has('name'))
            <div class='help-block'> {{ $errors->first('name') }} </div> 
        @endif
    </div>

    <div class='form-group'>
        {{ Form::label('note', 'Note') }}
        {{ Form::text('note', null, ['placeholder' => 'Note', 'class' => 'form-control']) }}
    </div>


    <div class='form-group'>
        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}


</div>

@stop