<?php namespace Controllers;

	/**
	* Empleados Controlador
	*/
	use Models\Js as Js;
	use Models\Cargo as Cargo;
	use Models\Area as Area;
	use Models\Empleado as Empleado;
	use Config\Auth as Auth;
	use Models\Persona as Persona;

	class empleadosController
	{
		
		public function index()
		{
			$p = new Empleado();
			$pd = $p->getAllEmpleadosDatos();
			$noa = array();
			$noa = array_merge($noa, $pd);
			Js::prints("Empleados ",false,"title");
			print_r($noa);
			Js::prints($noa,false);
			
			render("personas/todas");
	
		}

		public function editar($id=0){
			logueado();
			if (empty($_POST)){
				$t = new Persona;
				$t->obtenerDatosPersona($id);
				$e = new Empleado;
				if ($e->obtenerDatosId($id)){
					$ae = $e->getAllDatos();

					$tramite = array(
					'id' => $t->getID(), 
					'nombres'=>$t->getNombres(),
					'apellidos'=>$t->getApellidos(),
					'dni'=>$t->getDni(),
					'empresa'=>$t->getNombreEmpresa(),
					'email' => $ae["nombre_area"],
					'nombre_cargo' => $ae["nombre_cargo"],
					'activo' => $ae["activo"]

					);
					$a = new Area;
					$at = $a->obtenerAreas();

					$c = Cargo::getCargos();
					//print_r($at);
					Js::prints($at,true,"areas");
					Js::prints($c,true,"cargos");
					Js::prints($tramite,True);
					Js::prints(Auth::getuser("Gerente"),True,"sudo");
					render("empleados/crear");
				}
				else{
					echo "No se encontro el id".$id;
				}
			}
			else{
				$e = new Empleado;
				$e->obtenerDatosId($_POST["id"]);

				$e->correo = $_POST["emaile"];
				$e->nombres = $_POST["nome"];
				$e->apellidos = $_POST["apee"];

				$e->password = $_POST["password"];

				$e->id_cargo = $_POST["cargo"];
				$e->id_area = $_POST["area"];
				$e->activo = $_POST["activo"];

				$e->save();
				
			}
			


		}

		function crear(){
			if (!empty($_POST)){
				
				$r = new Empleado();
				//registrarEmpleado($Nombres,$Apellidos,$Id_Area,$Activo,$Correo,$Dni_Empleado,$Password)
				$data = array(
					$_POST["nome"],
					$_POST["apee"],
					1, //Area Trabajo
					"activo", //Activo?
					$_POST["emaile"],
					$_POST["dnie"],
					123456 
				);

				$r->registrarEmpleado(...$data);
				echo "exito";
				Js::prints($data,false);

				redirect('empleados');
			}
			else{
				$a = new Area;
				$at = $a->obtenerAreas();

				$c = Cargo::getCargos();
				//print_r($at);
				Js::prints($at,false,"areas");
				Js::prints($c,false,"cargos");
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
						$ar=$emp->getAllDatos();
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

		
	}
 ?>

