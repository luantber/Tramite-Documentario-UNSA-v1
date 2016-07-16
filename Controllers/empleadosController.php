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

			if (empty($_POST)){
				$r = new Registrador();
				$r->registrarPersona($_POST[""]);
			}
			else{
				$ruta = URLV."registrar/usuario.php";
				echo $ruta;
				#require_once URLV."registrar/usuario.php";
			}
			
		}
		

	}
 ?>

