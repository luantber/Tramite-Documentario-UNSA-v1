<?php namespace Controllers;

	use Models\Tramite as Tramite;
	use Models\Empleado as Empleado;
	use Models\Area as Area;
	use Config\Auth as Auth;
	use Models\Js as Js;
	use Models\MesaDePartes as Mesa;
	class tramitesController
	{
		function index(){
			/*
				Necesito getAllTRamites()
			*/
			$t= new Tramite();
			//print_r($t->getAllTRamitesDatos());
			Js::prints($t->getAllTRamitesDatos(),True,"data");
			render("tramites/barraTramites");
			render("tramites/todos");
		}

		function mover()
		{
			logueado();
			if (!empty($_POST)){

				$t = new Tramite;
				$t->obtenerDatosTramiteId($_POST["idtramite"]);
				print_r("here".$_POST["idtramite"]."<br>");
				//$t->moverTramite($_POST["destino"]);
				$datos = array($t->id_expediente,Auth::getareaId(),$_POST["destino"]);
				print_r($datos);
				$m = new Mesa;
				$m->moverTramite(...$datos);


				//redirect("panel",true);


			}else{

			echo "OLA KE ASE, VIOLANDO LA SEGURIDAD O KE ASE";	
			}
		}

		function buscar()
		{
			# code...
			//$_POST = dat,
			//bus
			//0 apellido
			//1 dni
			render("tramites/buscar");
		}

		
	
		function ver($id){
			/*
				Checkear seguridad
			*/
			if (isset($id)){

			$a = new Area;
			$at = $a->obtenerAreas();
			Js::prints($at,true,"areas");
				

			echo $id;
			$t = new Tramite();
			$r = $t->obtenerDatosTramiteId($id);
			if ($r){
				$tramite = $t->getAllDatosNombres();
				Js::prints($tramite,True);
						

			$e = new Empleado();
			$d = $e->getEmpleadosIdNombreByIdArea(Auth::getareaId());
			Js::prints($d,True,"empleados");


			render("tramites/asignar");
			render("tramites/editar");

			}
			else{
				JS::prints("No existe un tramite con id,".$id,"error",True);
			}
			}
			#redirect("error/e404");
			echo "NO se recibiio..";
			print($id);
			
		}

		function editar($id){
			/*
				Checkear seguridad
			*/
			if (!empty($_POST)){
				echo "CONTROLADOR EDITAR POST";
			}
			else{
				echo "Formulario prellenado para refresh";
				$t = new Tramite;
				if ($t->obtenerDatosTramiteId($id)){
					$tramite = array(
					'id' => $t->id_expediente, 
					'asunto'=>$t->getAsunto(),
					'estado'=>$t->getEstado()
					);
					Js::prints($tramite,True);
				}
				else{
					
					JS::prints("No existe un tramite con id,".$id,"error",True);
				}

			}
			render("tramites/editar");
			
		}

		function crear(){
			if (!empty($_POST)){
				
				$t = new Tramite();
				
				//registrarTramiteByDni($Folios,$Asunto,$Dni_Persona,$Id_Area_Destino,$Tipo_Tramite,$Prioridad,$Estado,$DescripcionEstado)
				echo "Destino".$_POST["destino"];


				if($t->registrarTramiteByDni(
					$_POST["folios"],
					$_POST["asunto"],
					$_POST["ident"],
					$_POST["destino"],
					"tipo", //Tipo de tramite
					$_POST["prioridad"],
					"Pendiente",
					 //Estado: Enproceso, finalizado y rechazado
					"..."

					)
					) 
				{

					//error e
					echo " Exito";
					echo $t->getAsunto();
				}
				else{

					JS::error("HUbo un error al registrar el Tramite, probablemente no exista el DNI");

					//render("registrar/exito");

				}

			}
			else{
				$a = new Area;
				$at = $a->obtenerAreas();
				Js::prints($at,true,"areas");
				render("tramites/crear");
				
			}
		}

		function imprimir()
		{
			render("tramites/imprimir");
			# code...
		}

		function recibido(){
			if (!empty($_POST)){
				$idt = $POST["idtramite"];
				$r = $_POST["recibido"];

				$t = new Tramite;
				$t->recibido = $r;
				$t->save();

				redirect("panel");

			}else{
				
			echo "OLA KE ASE, VIOLANDO LA SEGURIDAD O KE ASE";	
			}

		}

		function proceso(){
			
			render("tramites/barraTramites");
			render("tramites/todos");
		}

		function finalizado(){
			render("tramites/barraTramites");
			render("tramites/todos");
		}

		function rechazado(){
			render("tramites/barraTramites");
			render("tramites/todos");
		}
	}
?>
