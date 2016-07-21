<?php namespace Controllers;

/**
* 		
*/
class movimientosController 
{
	
	function index()
	{
		# code...
		print "INdice movimientosController";
	}
	function todos()
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