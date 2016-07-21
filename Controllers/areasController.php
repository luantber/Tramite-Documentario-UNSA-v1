<?php namespace Controllers;

	use Models\Area as Area;
	use Models\Js as Js;
	class areasController
	{
		
		public function index()
		{

			$a = new Area();
			$areas = $a->getAllAreasDatos();

			Js::prints($areas,true,"areas");
		}

		public function buscar()
		{
			# code..
			render("areas/buscar");
		}

		public function crear()
		{
			# code...
			render("areas/crear");
		}

		public function editar()
		{
			# code...
			render("areas/editar");
		}

		public function ver()
		{
			
			render("areas/ver");
		}
		
	}
 ?>

