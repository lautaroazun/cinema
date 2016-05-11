@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New imagenes3</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'imagenes3s.store']) !!}

            @include('imagenes3s.fields')

        {!! Form::close() !!}
    </div>
</div>
@endsection