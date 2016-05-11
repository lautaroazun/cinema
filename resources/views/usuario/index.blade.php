@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif



@section('content')
	
	<table class="table">
		<thread>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Operacion</th>
		</thread>

		@foreach ($users as $user)
		<tbody>
			<th> {{ $user->name}}</th>
			<th> {{ $user->email }}</th>
			<th>
				{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user, $attributes = ['class'=>'btn btn-primary'])!!}	

			</th>
		</tbody>
		@endforeach

	</table>
	
	{!! $users->render() !!}
	
@stop

<!--
table.table>(thread>th*3)>(tbody>th*3) para hacer mas rapido
 No me muesstra el msj :C
!-->