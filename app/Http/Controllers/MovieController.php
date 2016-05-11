<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;

class MovieController extends Controller
{
    

	public function index()
	{
		
		return view('index');
	}
	public function create()
	{
		
		return "Estoy en el create de MovieController";
		
	}





}

?>