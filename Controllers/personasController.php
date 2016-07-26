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
				print_r($ae);
				$tramite = array(
				'id' => $t->getID(), 
				'nombres'=>$t->getNombres(),
				'apellidos'=>$t->getApellidos(),
				'dni'=>$t->getDni(),
				'empresa'=>$t->getNombreEmpresa(),
				'email' => $ae["correo"],
				'area' => $ae["nombre_area"],
				'cargo' => $ae["nombre_cargo"],
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



	}	