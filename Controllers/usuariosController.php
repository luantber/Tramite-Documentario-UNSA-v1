<?php namespace Controllers;

	use Models\Persona as Persona;
	use Models\Js as Js;
	class usuariosController
	{
		function index(){
			/*
				GetALlUsers
			*/
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
				Js::prints($data,true);
				render("usuarios/crear");
			}
			else{
				
				render("usuarios/crear");
				
			}

		}

		function buscar()
		{
			# code...
			//bus , dat .... 0 apel

			render("usuarios/buscar");
		}

		function ver()
		{
			# code...
			render("usuarios/ver");
		}


		
	}
?>