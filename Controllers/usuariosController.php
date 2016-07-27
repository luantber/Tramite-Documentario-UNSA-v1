<?php namespace Controllers;

	use Models\Persona as Persona;
	use Models\Js as Js;
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

		function ver()
		{
			# code...
			render("usuarios/ver");
		}

	}
?>