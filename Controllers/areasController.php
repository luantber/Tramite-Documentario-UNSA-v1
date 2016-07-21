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


		public function crear()
		{
			# code...
			render("areas/crear");
		}

		public function ver()
		{
			
			render("areas/ver");
		}
		
	}
 ?>

