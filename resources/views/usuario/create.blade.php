@extends('layouts.admin')


	@section('content')

	
	@include('alerts.request')

	{!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
	
	@include('usuario.forms.usr')

	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
	
	

	<!--

	lo que hacemos es no usar html si no blade. y los comandos del framwork para hacer menos codigo

	 se crea un formulario, un form-group seria como un panelcito, el cual puede contener lable, txts, password, etc. 

	 en el form::text es un form de entrada por lo tanto se debe guardar su valor, 


	primero creamos una ruta para crear nuestro usuaio se hace mediante un array que se representa mediante los corchetes en php, se especifica una ruta, y el metodo

	para los snippets: div.form-group decimos que adentro del div se cree una clase fomr group (para txts, lbl, etc), el primer  
	parametro es su nombre, el seguno su valor por default y el tercero son los atributos, se le agrega una clase (las 
	proporciona boostrap: form-control, placeholder, btn btn-primary etc)

	pregunta: como mierda se ordenan?? :o

	submit para enviar
	-->
