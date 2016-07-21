<?php namespace Controllers;

/**
* 		
*/
class movimientosController 
{
	
	function index()
	{
		# code...
		
		render("movimientos/todos");
	}

	function ver()
	{
		# code...
		render("movimientos/ver");
	}
}