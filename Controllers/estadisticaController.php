<?php namespace Controllers;
use Models\Area as Area;
use Models\Js as Js;

class estadisticaController{
	function index(){
		$a = new Area;
			$at = $a->obtenerAreas();
			Js::prints($at,false,"areas");
		//echo "separado: <br>";
		render("estadisticas/estadisticas");
	}
}