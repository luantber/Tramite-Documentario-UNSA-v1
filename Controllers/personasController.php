<?php namespace Controllers;

	/**
	* PErsonas Controllers
	*/
	use Models\Persona as Persona;
	

	class personasController
	{
		
		public function index()
		{
			$p = new Persona();
			$p->getPersona(0);

		}
	}	