<?php namespace Controllers;

	use Models\Area as Area;
	use Models\Empleado as Empleado;
	use Models\Js as Js;
	use Config\Auth as Auth;
	class areasController
	{
		
		public function index()
		{

			$a = new Area();
			$areas = $a->getAllAreasDatos();

			Js::prints($areas,false,"areas");
			render("areas/ver");
		}


		public function crear()
		{
			if (!empty($_POST)){

			}
			
			$e = new Empleado();
			$d = $e->getEmpleadosIdNombreByIdArea(Auth::getareaId());
			Js::prints($d,false,"empleados");

			render("areas/crear");
		}

		public function ver()
		{			
			echo "Nada aun.";
		}
		
	}

	//$a = new Area();
	//$a->obtenerDatosAreaById(Auth::getareaId());
 ?>

