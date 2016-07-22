<?php namespace Controllers;

	/**
	* PErsonas Controllers
	*/
	//use Models\Persona as Persona;
	use Models\Tramite as Tramite;
	use Models\Js as Js;
	use Config\Auth as Auth;

	class panelController
	{
		function index(){
			
			logueado();			

			$t = new Tramite;
			$areas = $t->getAllTramitesDatosByIdAreaActual(Auth::getareaId());
			Js::prints($areas,true);

			
			$s = getSesion("sesion1");
			if ($s){
				Js::prints($s,true,"exitoMover");
			}
			render("tramites/todos");
		}
	}