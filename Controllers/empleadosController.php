<?php namespace Controllers;

	/**
	* Empleados Controlador
	*/
	use Models\Auth as Auth;
	use Models\Js as Js;
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
					true, //Activo?
					$_POST["emaile"],
					$_POST["dnie"],
					$_POST["contrae"] 
				);

				$r->registrarEmpleado(...$data);
				echo "exito";
				Js::prints($data,true);
				render("empleados/crear");
			}
			else{
				
				render("empleados/crear");
				
			}
		}

		function ingresar()
		{
			if (!empty($_POST)){
				
				$emp = new Empleado;
				if ($emp->obtenerDatosDni($_POST["username"]))
				{
					if ($emp->getPassword()==$_POST["password"])
					{
						Auth::set_session($emp);
						echo Auth::get_session()->getNombres();	
						render("ingresar/exito");
					}
					else
						echo "<br>Contraseña incorrecta";
				}
				else
					echo "No estas registrado";

			}
			else{
				
				render("empleados/ingresar");
				
			}
		}

		function editar(){
			
		}
		
	}
 ?>

