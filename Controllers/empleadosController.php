<?php namespace Controllers;

	/**
	* Empleados Controlador
	*/
	use Models\Js as Js;
	use Models\Cargo as Cargo;
	use Models\Area as Area;
	use Models\Empleado as Empleado;
	use Config\Auth as Auth;

	class empleadosController
	{
		
		public function index()
		{
			$p = new Empleado();
			$pd = $p->getAllEmpleadosDatos();

			Js::prints("Empleados ",True,"title");
			Js::prints($pd,True);
			render("personas/todas");
	
		}

		function crear(){
			if (!empty($_POST)){
				
				$r = new Empleado();
				//registrarEmpleado($Nombres,$Apellidos,$Id_Area,$Activo,$Correo,$Dni_Empleado,$Password)
				$data = array(
					$_POST["nome"],
					$_POST["apee"],
					1, //Area Trabajo
					true, //Activo?
					$_POST["emaile"],
					$_POST["dnie"],
					$_POST["contrae"] 
				);

				$r->registrarEmpleado(...$data);
				echo "exito";
				Js::prints($data,true);

				redirect('empleados');
			}
			else{
				$a = new Area;
				$at = $a->obtenerAreas();

				$c = Cargo::getCargos();
				//print_r($at);
				Js::prints($at,true,"areas");
				Js::prints($c,true,"cargos");
				render("empleados/crear");
				
			}
		}

		function ingresar()
		{
			Auth::set_session("Esta es prueba auth completa","prueba");
			if (!empty($_POST)){
				
				$emp = new Empleado;
				if ($emp->obtenerDatosDni($_POST["username"]))
				{
					if ($emp->getPassword()==$_POST["password"])
					{
						$ar=array(); 
						array_push($ar, $emp->getNombres());
						array_push($ar,$emp->getNombreCargo());
						Auth::set_session($ar);
						//$_SESSION["sesion"]=$emp->getNombres();
						//echo "desde controlador:".Auth::get_session()->getNombres();	
						redirect("tramites");
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

		function salir()
		{
			Auth::destroy();
			header("Location:".URLM);
		}

		function editar(){
			
		}
		
	}
 ?>

