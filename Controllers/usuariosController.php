<?php namespace Controllers;

	use Models\Persona as Persona;
	use Models\Js as Js;
	use Config\Auth as Auth;
	use Models\Area as Area;
	use Models\Cargo as Cargo;
	class usuariosController
	{
		function index(){
			$p = new Persona();
			$pd = $p->getAllClientes();

			Js::prints("Clientes(ususarios)",false,"title");
			Js::prints($pd,false);
			render("personas/todas");
		}

		function crear(){
			if (!empty($_POST)){
				
				$r = new Persona();

				$data = array(
					$_POST["nomusu"],
					$_POST["apeusu"],
					$_POST["dniusu"]
				);

				//Lo se esto .. esta bien fumado
				$r->registrarPersona(...$data);
				echo "exito";
				Js::prints($data,false);
				
				//render("usuarios/crear");
				redirect("tramites/crear");
			}
			else{
				
				render("usuarios/crear");
				
			}

		}

		function buscar()
		{
			# code...
			//bus , dat .... 0 apel
 			$t = new Persona;
			$ar = array();
			if(!empty($_POST)){
				if($_POST["bus"]==0){
					$ar = $t->getAllClientesByNombreLike($_POST["dat"]);
					
				}
				else if($_POST["bus"]==1){
					echo "here";
					$t->obtenerDatosPersonaByDni($_POST["dat"]);
					$ar = $t->getAllDatos();
					$ar = array($ar);
				}
				//print_r($ar);
				Js::prints($ar,false);
				render("usuarios/buscar");
				render("personas/todas");
			}
			
			render("usuarios/buscar");
		}

		function editar($id=0){
		logueado();
		if (empty($_POST)){
			if(Auth::revisarArea("Mesa de Partes") or Auth::getuser("Gerente") or Auth::getuserId() == $id){
				$t = new Persona;
								
				if ($t->obtenerDatosPersona($id)){
					//$ae = $e->getAllDatos();
					//print_r($ae);
					$persona = array(
						'id' => $t->getID(), 
						'nombres'=>$t->getNombres(),
						'apellidos'=>$t->getApellidos(),
						'dni'=>$t->getDni(),
						'empresa'=>$t->getNombreEmpresa()
						//
					);

					$a = new Area;
					$c = Cargo::getCargos();
					$at = $a->obtenerAreas();
					//print_r($at);
					Js::prints($at,true,"areas");
					Js::prints($c,true,"cargos");
					Js::prints($persona,true);
					Js::prints(Auth::getuser("Gerente"),true,"sudo");
					render("usuarios/editar");
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

		function ver()
		{
			# code...
			render("usuarios/ver");
		}

	}
?>