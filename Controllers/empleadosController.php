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

			//print_r($pd);
			
			Js::prints("Empleados ",false,"title");
			Js::prints($pd,false);
			
			render("empleados/todosEmpleados");
	
		}

		function borrar(){
			logueado();
			if (!empty($_POST)){
				$e = new Empleado;
				$e->deleteEmpleado($_POST["iduser"]);
				redirect("empleados");
			}else{
				echo "Violacion de Seguridad";
			}
		}	

		function eliminar($id=0){
			Js::prints($id,false,"idpersona");
			$p = new Empleado();
			$p->obtenerDatosId($id);
			$data = $p->getAllDatos();
			Js::prints($data,false);
			render("empleados/borrar");
		}


	function editar($id=0){
	logueado();
	if (empty($_POST)){
		if(Auth::getuser("Gerente") or Auth::getuserId() == $id){
			$t = new Persona;
			$t->obtenerDatosPersona($id);
			$e = new Empleado;

			if ($e->obtenerDatosId($id)){
				$ae = $e->getAllDatos();
				//print_r($ae);
				$tramite = array(
					'id' => $t->getID(), 
					'nombres'=>$t->getNombres(),
					'apellidos'=>$t->getApellidos(),
					'dni'=>$t->getDni(),
					'empresa'=>$t->getNombreEmpresa(),
					'email' => $ae["correo"],
					'id_cargo' => $ae["id_cargo"],
					'id_area' => $ae["id_area"],
					'activo' => $ae["activo"],
					'password' => $ae["password"]
				);
				$a = new Area;
				$c = Cargo::getCargos();
				$at = $a->obtenerAreas();
				//print_r($at);
				Js::prints($at,true,"areas");
				Js::prints($c,true,"cargos");
				Js::prints($tramite,true);
				Js::prints(Auth::getuser("Gerente"),true,"sudo");
				render("empleados/editar");
			}
			else{
				echo "No hay un usuario con este ID:".$id;	
			}
		}
		else{
			echo "No tienes permisos para editar estop";
		}		
	}
	else{
		$e = new Empleado;

		$e->obtenerDatosId($_POST["id"]);
		
		if(isset($_POST["cargo"])){
			$e->id_cargo = $_POST["cargo"];
			$e->id_area = $_POST["area"];
		}

		if(isset($_POST["emaile"])){
			$e->correo = $_POST["emaile"];
			$e->password = $_POST["password"];
	
		}
			
		//$e->nombres = $_POST["nome"];
		//$e->apellidos = $_POST["apee"];
		
		//$e->activo = $_POST["activo"];

		$e->saveEmpleado();
		redirect("empleados");
	}
}

		public function crear(){
			if (!empty($_POST)){
				
				$r = new Empleado();
				//registrarEmpleado($Nombres,$Apellidos,$Id_Area,$Activo,$Correo,$Dni_Empleado,$Password)
				$data = array(
					$_POST["nome"],
					$_POST["apee"],
					$_POST["cargo"],
					$_POST["area"], //Area Trabajo
					"activo", //Activo?
					$_POST["emaile"],
					$_POST["dnie"],

					123456 
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
						$ar=$emp->getAllDatos();
						Auth::set_session($ar);
						//$_SESSION["sesion"]=$emp->getNombres();
						//echo "desde controlador:".Auth::get_session()->getNombres();	
						redirect("panel");
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
