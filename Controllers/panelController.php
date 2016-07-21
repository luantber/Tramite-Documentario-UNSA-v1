<?php namespace Controllers;

	/**
	* PErsonas Controllers
	*/
	//use Models\Persona as Persona;
	use Models\Tramite as Tramite;
	use Models\Js as Js;

	class panelController
	{
		function index(){
			$t = new Tramite;
			$areas = $t->getAllTramitesDatosByIdAreaActual(1);
			$s = getSesion("sesion1");

			if ($s){
				Js::prints($s,true,"exitoMover");
			}

			Js::prints($areas,true);
		}
	}