<?php namespace Controllers;

	/**
	* Empleados Controlador
	*/

	use Models\Auth as Auth;
	use Models\Empleado as Empleado;

	class ingresarController
	{
		
		public function index()
		{
			
			print "Indice ingresarController";
		}

		public function empleado(){

			#$arpost=array('name'=>$_POST["username"],'pass'=>$_POST["password"]);
			if (!empty($_POST)){
				
				$emp = new Empleado;
				if ($emp->obtenerDatosDni($_POST["username"]))
				{
					if ($emp->getPassword()==$_POST["password"])
						//render("ingresar/exito");
						redirect("tramites");
					else
						echo "<br>Contraseña incorrecta";
				}
				else
					echo "No estas registrado";

			}
			else{
				
				render("ingresar/empleado");
				
			}

		}



	}
 ?>

