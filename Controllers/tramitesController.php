<?php namespace Controllers;

	class tramitesController
	{
		function index(){
			echo "Aqui estaran todos los tramites";
		}

		function crear(){
			if (!empty($_POST)){
//function registrarTramite($Folios,$Asunto,$Id_Persona,$Id_Area_Destino,$Tipo_Tramite,$Prioridad,$Estado,$DescripcionEstado)				
				$t = new Tramite();
				$t->registrarTramite(
					$_POST["nomusu"],
					$_POST["apeusu"],
					$_POST["dniusu"]
					);

				render("registrar/exito");
			}
			else{
				
				render("tramites/crear");
				
			}
		}
	}
?>