<?php namespace Controllers;
/**
* 
*/
use Config\Auth as Auth;
use Models\Persona as Persona;
use Models\Js as Js;
use Models\Empleado as Empleado;
class perfilController
{
	
	function index()
	{
		$id = Auth::getuserId();
		//echo $id;
		$t = new Persona;
			if ($t->obtenerDatosPersona($id)){
				$e = new Empleado;
				if($e->obtenerDatosId($t->getID())){
					$tramite = array(
					'id' => $t->getID(), 
					'nombres'=>$t->getNombres(),
					'apellidos'=>$t->getApellidos(),
					'dni'=>$t->getDni(),
					'empresa'=>$t->getNombreEmpresa(),
					'email' => $e->correo,
					"cargo" =>$e->nombre_cargo,
					"area" =>$e->nombre_area,
					"activo"=>$e->activo
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
		
				Js::prints($tramite,true);
				render("perfil/barrita");
			}
			else{
				JS::prints("No existe una persona con id,".$id,"error",false);
			}
			# code...
	}

	function barrita()
	{
		render("perfil/barrita");
		# code...
	}

	function finalizado()
	{
		render("perfil/finalizado");
		# code...
	}

	function miTramite()
	{
		render("perfil/miTramite");
		# code...
	}

	function proceso()
	{
		render("perfil/proceso");
		# code...
	}

	function rechazado()
	{
		render("perfil/rechazado");
		# code...
	}

}