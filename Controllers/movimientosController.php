<?php namespace Controllers;

use Models\Movimiento as Movimiento;
use Models\Js as Js;
class movimientosController 
{
	
	function index()
	{
		# code...
		$m = new Movimiento;
		$dm = $m->getAllMovimientos();
		Js::prints($dm,True);
		render("movimientos/todos");
	}

}