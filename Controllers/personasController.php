<?php namespace Controllers;

	/**
	* PErsonas Controllers
	*/
	use Models\Persona as Persona;
	use Models\Empleado as Empleado;
	use Models\Js as Js;

	class personasController
	{
		function index(){
			$p = new Persona();
			Js::prints("Todas las personas ",True,"title");
			Js::prints($p->getAllPersonasDatos(),True);
			render("personas/todas");

		}

		function ver($id){
			echo $id;
			$t = new Persona;
			if ($t->obtenerDatosPersona($id)){
				$e = new Empleado;
				
				if ($e->obtenerDatosId($t->getID())){
				$ae = $e->getAllDatos();

				$tramite = array(
				'id' => $t->getID(), 
				'nombres'=>$t->getNombres(),
				'apellidos'=>$t->getApellidos(),
				'dni'=>$t->getDni(),
				'empresa'=>$t->getNombreEmpresa(),
				'email' => $ae["nombre_area"],
				'nombre_cargo' => $ae["nombre_cargo"],
				'activo' => $ae["activo"]

				);

				}
				else{
					$tramite = array(
				'id' => $t->getID(), 
				'nombres'=>$t->getNombres(),
				'apellidos'=>$t->getApellidos(),
				'dni'=>$t->getDni(),
				'empresa'=>$t->getNombreEmpresa()

				);

				}

				
				Js::prints($tramite,True);
				render("perfil/barrita");
			}
			else{
				JS::prints("No existe una persona con id,".$id,"error",True);
			}
		}

		function borrar(){
			if (!empty($_POST)){
				echo "BOrraste el usuario:".$_POST["iduser"];
				echo "Aun no funciona OJO";
			}else{
				echo "nada.. que borrar ";
			}
		}	

		function eliminar($id){
			Js::prints($id,True,"idpersona");
			$p = new Persona();
			$p->obtenerDatosPersona($id);
			$data = $p->getAllDatos();
			Js::prints($data,True);
			render("personas/borrar");
		}

	}	