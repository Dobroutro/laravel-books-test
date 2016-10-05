@extends('layouts.master')

@section('title') Create Book @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>


    
    <h1><i class='fa fa-book'></i> Add Book</h1>


    {{ Form::open(['role' => 'form', 'url' => '/books', 'files' => 'true']) }}

    <div class='form-group @if ($errors->has('name')) has-error @endif'>
        {{ Form::label('title', 'Book title') }}
        {{ Form::text('title', null, ['placeholder' => 'Book title', 'class' => 'form-control']) }}
        @if ($errors->has('title'))
            <div class='help-block'> {{ $errors->first('title') }} </div> 
        @endif
    </div>
    <div class='form-group @if ($errors->has('purchase_year')) has-error @endif'>
        {{ Form::label('purchase_year', 'Purchase year') }}
        {{ Form::text('purchase_year', null, ['placeholder' => 'Purchase year', 'class' => 'form-control']) }}
        @if ($errors->has('purchase_year'))
            <div class='help-block'> {{ $errors->first('purchase_year') }} </div> 
        @endif
    </div>
    <div class='form-group'>
        {{ Form::label('note', 'Note') }}
        {{ Form::text('note', null, ['placeholder' => 'Note', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ Form::label('author_id', 'Author') }}
        <select name="author_id" class="form-control">
            @foreach($authors as $author)
                <option value="{{$author->id}}" >{{$author->name}}</option>
            @endforeach
        </select>
    </div>

    <div class='form-group'>
        {{ Form::label('image', 'Image') }}
        {{ Form::file('image', array('class' => 'form-control')) }}    
        @if ($errors->has('image'))
            <div class='help-block'> {{ $errors->first('image') }} </div> 
        @endif        
    </div>

    <div class='form-group'>
        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}


</div>

@stop