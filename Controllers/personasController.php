<?php namespace Controllers;

	/**
	* PErsonas Controllers
	*/
	use Models\Persona as Persona;
	use Models\Js as Js;

	class personasController
	{
		function index(){
			$p = new Persona();
			Js::prints("Empleados ",True,"title");
			Js::prints($p->getAllPersonasDatos(),True);
			render("personas/todas");

		}

		function ver($id){
			echo $id;
			$t = new Persona;
			if ($t->obtenerDatosPersona($id)){
				$tramite = array(
				'id' => $t->getID(), 
				'nombres'=>$t->getNombres(),
				'apellidos'=>$t->getApellidos(),
				'dni'=>$t->getDni(),
				'empresa'=>$t->getNombreEmpresa()
				);
				Js::prints($tramite,True);
			}
			else{
				JS::prints("No existe una persona con id,".$id,"error",True);
			}
		}

	}	