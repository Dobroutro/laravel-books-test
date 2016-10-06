@extends('layouts.master')

@section('title') Books @stop

@section('content')

@if(session()->has('ok'))
    <div class="col-lg-10 col-lg-offset-1">
        @include('partials/error', ['type' => 'success', 'message' => session('ok')])
    </div>

@endif
<div class="col-lg-10 col-lg-offset-1">
 
    <div class="pull-right">
        <form method="POST" action="{{ URL::to('/books/search') }}">
            {{ csrf_field() }}
            <input type="submit" name="Search" value="Search" class="btn btn-info"/>        
            <input type="text" name="search" value="{{ $search }}" >
        </form>
    </div>    
</div>
<div class="col-lg-10 col-lg-offset-1">

    <h1>
        <i class="fa fa-book"></i> Books Administration        
    </h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Purchase Year</th>
                    <th>Note</th>

                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->author->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->purchase_year }}</td>
                    <td>{{ $item->note }}</td>

                    <td>
                        <a href="/books/{{ $item->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        <form method="POST" action="{{ URL::to('/books') }}/{{ $item->id }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" name="Delete" value="Delete" class="btn btn-danger"/>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="/books/create" class="btn btn-success">Add Book</a>

    <div class="pull-right link">{!! $links !!}</div>
</div>

@stop