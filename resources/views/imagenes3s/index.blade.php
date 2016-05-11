@extends('layouts.admin')

@section('content')

    <div class="container">

        <h1 class="pull-left">imagenes3s</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('imagenes3s.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @if($imagenes3s->isEmpty())
            <div class="well text-center">No imagenes3s found.</div>
        @else
            @include('imagenes3s.table')
        @endif
        
    </div>
@endsection