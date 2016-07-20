<?php namespace Controllers;

	class areasController
	{
		
		public function index()
		{

			print "INdice empleadosController";
		}

		public function buscar()
		{
			# code..
			render("areas/buscar");
		}

		public function crear()
		{
			# code...
			render("areas/crear");
		}

		public function editar()
		{
			# code...
			render("areas/editar");
		}

		public function ver()
		{
			# code...
			render("areas/ver");
		}
		
	}
 ?>

