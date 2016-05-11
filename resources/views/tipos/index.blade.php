@extends('layouts.admin')

@section('content')

    <div class="container">

        <h1 class="pull-left">tipos</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tipos.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @if($tipos->isEmpty())
            <div class="well text-center">No tipos found.</div>
        @else
            @include('tipos.table')
        @endif
        
    </div>
@endsection