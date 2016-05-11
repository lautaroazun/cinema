@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit tipo</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tipo, ['route' => ['tipos.update', $tipo->id], 'method' => 'patch']) !!}

            @include('tipos.fields')

            {!! Form::close() !!}
        </div>
    </div>
@endsection