<?php namespace Controllers;

	/**
	* Empleados Controlador
	*/
	use Models\Empleado as Empleado;
	class empleadosController
	{
		
		public function index()
		{

			print "INdice empleadosController";
		}

		function crear(){
			if (!empty($_POST)){
				
				$r = new Empleado();
				//registrarEmpleado($Nombres,$Apellidos,$Id_Area,$Activo,$Correo,$Dni_Empleado,$Password)
				$data = array(
					$_POST["nome"],
					$_POST["apee"],
					1,
					true,
					"mail@mail"
					,$_POST["dnie"],
					$_POST["contrae"] 
				);

				$r->registrarEmpleado(...$data);
				render("registrar/exito");
			}
			else{
				
				render("registrar/empleado");
				
			}
		}
		
	}
 ?>

