<?php namespace Controllers;

	/**
	* Empleados Controlador
	*/

	

	use Models\Empleado as Empleado;
	use Models\Registrador as Registrador;
	class empleadosController
	{
		
		public function index()
		{
			
			print "INdice empleadosController";
		}

		public function registrar(){

			//$u = new Empleado(5);
			//$u =  new Models\Registrador();
			//echo $u->get_correo();
			$r = new Registrador()
		}
		

	}
 ?>

