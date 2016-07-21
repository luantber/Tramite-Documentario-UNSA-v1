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

		function mover()
		{
			if (!empty($_POST)){

				$t = new Tramite;
				$t->obtenerDatosTramiteId($_POST["idtramite"]);

				$t->moverTramite($_POST["destino"]);


				redirect("panel",true);


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
			echo $id;
			$t = new Tramite;
			if ($t->obtenerDatosTramiteId($id)){
				$tramite = array(
				'id' => $t->id_expediente, 
				'asunto'=>$t->getAsunto(),
				'estado'=>$t->getEstado()
				);
				Js::prints($tramite,True);
				render("tramites/ver");
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
					echo " Exito";
					echo $t->getAsunto();
				}
				else{

					JS::error("HUbo un error al registrar el Tramite, probablemente no exista el DNI");

					//render("registrar/exito");

				}

			}
			else{
				
				render("tramites/crear");
				
			}
		}
		function todos()
		{
			# code...
			render("tramites/todos");
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
	}
?>
