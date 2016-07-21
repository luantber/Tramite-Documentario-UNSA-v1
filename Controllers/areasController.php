<?php namespace Controllers;

	use Models\Area as Area;
	use Models\Js as Js;
	class areasController
	{
		
		public function index()
		{

			$a = new Area();
			$areas = $a->obtenerAreas();

			Js::prints($areas,true,"areas");

		}
		
	}
 ?>

