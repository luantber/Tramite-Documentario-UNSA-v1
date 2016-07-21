<?php namespace Controllers;

	use Models\Tramite as Tramite;
	use Models\Area as Area;
	use Models\Js as Js;
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

		function asignar()
		{
			render("tramites/asignar");
			render("tramites/editar");
			# code...

		}
		function ver($id){
			/*
				Checkear seguridad
			*/
			if (isset($id)){

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
			redirect("error/e404");
			
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
