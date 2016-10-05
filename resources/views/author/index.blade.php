@extends('layouts.master')

@section('title') Authors @stop

@section('content')

@if(session()->has('ok'))
    <div class="col-lg-10 col-lg-offset-1">
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
    </div>

@endif
<div class="col-lg-10 col-lg-offset-1">

    <h1>
        <i class="fa fa-users"></i> Authors Administration 

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th width="40%">Note</th>
                    <th>Books Count</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->note }}</td>
                    <td>{{ $item->books->count() }}</td>
                    <td>
                        <a href="/authors/{{ $item->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        <form method="POST" action="{{ URL::to('/authors') }}/{{ $item->id }}">
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

    <a href="/authors/create" class="btn btn-success">Add Author</a>

    <div class="pull-right link">{!! $links !!}</div>
</div>

@stop