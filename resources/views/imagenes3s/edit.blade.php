@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit imagenes3</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($imagenes3, ['route' => ['imagenes3s.update', $imagenes3->id], 'method' => 'patch']) !!}

            @include('imagenes3s.fields')

            {!! Form::close() !!}
        </div>
    </div>
@endsection