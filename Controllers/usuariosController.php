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

					//print_r($at);
					$var = false;
					if (Auth::revisarArea("Mesa de Partes") or Auth::getuser("Gerente")){
						$var = true;
					}

					Js::prints($var,true,"usuario");					

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

				$t = new Persona;
				$t->obtenerDatosPersona($_POST["id"]);
				print_r($_POST);
				$t->nombres = $_POST["nome"];
				$t->apellidos = $_POST["apee"];
				$t->dni = $_POST["dnie"];
				$t->save();

				redirect("usuarios");
			}
		}

		function ver()
		{
			# code...
			render("usuarios/ver");
		}

	}
?>