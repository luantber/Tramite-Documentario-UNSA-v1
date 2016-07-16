<?php namespace Controllers;

	/**
	* Empleados Controlador
	*/

	
	use Models\Empleado as Empleado;
	use Models\Registrador as Registrador;
	class registrarController
	{
		
		public function index()
		{
			
			print "INdice empleadosController";
		}

		public function usuario(){

			if (!empty($_POST)){
				
				$r = new Registrador();
				$r->registrarPersona($_POST["nomusu"],$_POST["apeusu"],$_POST["dniusu"]);
				render("registrar/exito");
			}
			else{
				
				render("registrar/usuario");
				
			}
			
			
		}
		public function empleado(){

			if (!empty($_POST)){
				echo "<br> POST";
				$r = new Registrador();
				$r->registrarPersona($_POST["nome"],$_POST["apee"],$_POST["dnie"]);
				echo "Exito!";
			}
			else{
				$ruta = URLV."registrar/usuario.php";
				echo $ruta;
				#require_once URLV."registrar/usuario.php";
			}
			
			
		}
		

	}
 ?>

