<?php namespace Cinema\Http\Controllers;

/**
* 1
*/
class PruebaControlador extends Controller
{
	
	public function index()
	{
		return "Hola desde controlador :D";
	}
	public function nombre($nombre)
	{
		return "Hola su nombre es: ".$nombre;
	}


}


 ?>