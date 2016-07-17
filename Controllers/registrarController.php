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
				
				$r = new Registrador();
				//registrarEmpleado($Nombres,$Apellidos,$Id_Area,$Activo,$Correo,$Dni_Empleado,$Password)
				$r->registrarEmpleado($_POST["nome"],$_POST["apee"],1,true,"mail@mail",$_POST["dnie"],$_POST["contrae"]);
				render("registrar/exito");
			}
			else{
				
				render("registrar/empleado");
				
			}

		}

		public function tramite(){

			if (!empty($_POST)){
				
				$r = new Registrador();

				//crearTramite(Folios,$Asunto,$Id_Persona,$Id_Area_Destino,$Tipo_Tramite,$Prioridad)
				$r->crearTramite(7,$_POST["descrip"],$_POST["ident"],1,1,1);
				render("registrar/exito");
			}
			else{
				$js = "
				************************************************************
				************************************************************
				<script>
					var cars = ['Saab', 'Volvo', 'BMW'];
				</script>
				";

				echo "js";
				render("acciones/nuevo");
				
			}

		}
		

	}
 ?>

