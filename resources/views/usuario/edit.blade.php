@extends('layouts.admin')

@section('content')
@include('alerts.request')

{!!Form::model($user, ['route' =>['usuario.update',$user->id], 'method'=>'PUT'])!!}
	
	@include('usuario.forms.usr')

	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}

{!!Form::open( ['route' =>['usuario.destroy',$user->id], 'method'=>'DELETE'])!!}   <!--estos es lo que va a hacer el boton eliminar-->

	{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}
	


@stop


<!-- el open model llena el formulario, donde los atributos del modelo se van a ajustar a cada valor del campo, recibimos el elemento ($user), luego se especifica la ruta con lo que se va a hacer después y ella se le pasa los parametros, el metodo por la que va a ser enviada la informacion(put para actualizar)





-->