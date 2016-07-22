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
			
			//logueado();			

			$t = new Tramite;
			$areas = $t->getAllTramitesDatosByIdAreaActual(Auth::get_session()->getIdArea());
			$s = getSesion("sesion1");

			if ($s){
				Js::prints($s,true,"exitoMover");
			}

			Js::prints($areas,true);
			render("tramites/todos");
		}
	}