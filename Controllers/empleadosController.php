<?php namespace Controllers;

	/**
	* Empleados Controlador
	*/
	class empleadosController
	{
		
		public function index()
		{
			print "INdice empleadosController";
		}
		public function ver(){

			$arr = array('name' => $_POST["pname"], 'lastname' => $_POST["plastname"], 'dni' => $_POST["pdni"], 'email' => $_POST["pemail"]);

			echo "<script> 
			var datos ='" .json_encode($arr). "'; 
			</script>";

		}
	}
 ?>