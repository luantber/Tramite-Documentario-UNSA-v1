<?php namespace Controllers;

	/**
	* Empleados Controlador
	*/

	use Models\Auth as Auth;
	use Models\Empleado as Empleado;

	class ingresarController
	{
		
		public function index()
		{
			
			print "Indice ingresarController";
		}

		public function empleado(){

			#$arpost=array('name'=>$_POST["username"],'pass'=>$_POST["password"]);
			if (!empty($_POST)){
				
				$emp = new Empleado;
				if ($emp->obtenerDatosDni($_POST["username"]))
				{
					if ($emp->getPassword()==$_POST["password"])
						render("ingresar/exito");
					else
						echo "<br>Contraseña incorrecta";
				}
				else
					echo "No estas registrado";

			}
			else{
				
				render("ingresar/empleado");
				
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

				echo $js;
				render("acciones/nuevo");
				
			}

		}
		

	}
 ?>

