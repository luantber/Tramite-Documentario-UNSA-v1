<?php namespace Controllers;

	use Models\Tramite as Tramite;
	use Models\Js as Js;
	class tramitesController
	{
		function index(){
			/*
				Necesito getAllTRamites()
			*/
			echo "todos los tramites";
			$t= new Tramite();
			//print_r($t->getAllTRamitesDatos());
			Js::prints($t->getAllTRamitesDatos(),"data",True);
		}

		function buscar()
		{
			# code...
			render("tramites/buscar");
		}

		function ver($id){
			/*
				Checkear seguridad
			*/

			echo $id;
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
			

		}

		function crear(){
			if (!empty($_POST)){
//function registrarTramite($Folios,$Asunto,$Id_Persona,$Id_Area_Destino,$Tipo_Tramite,$Prioridad,$Estado,$DescripcionEstado)				
				$t = new Tramite();
				/*print_r(array($_POST["folios"],
					$_POST["descrip"],
					$_POST["ident"],
					$_POST["destino"],
					$_POST["tipo"],
					$_POST["prioridad"]));
				*/


				if($t->registrarTramiteByDni(
					$_POST["folios"],
					$_POST["descrip"],
					$_POST["ident"],
					$_POST["destino"],
					$_POST["tipo"],
					$_POST["prioridad"],
					//$_POST["estado"]
					//$_POST["descripcion_estado"]
					"",
					""
					)) 
				{

					//error e
					JS::error("HUbo un error al registrar el Tramite");
				}
				else{
					//Exito
					echo $t->getAsunto();

					render("registrar/exito");

				}

			}
			else{
				
				render("tramites/crear");
				
			}
		}
	}
?>
