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
			Js::prints($p->getAllPersonasDatos(),true);
			render("personas/todas");

		}

		function todas()
		{
			# code...
			render("personas/todas");
		}

	}	