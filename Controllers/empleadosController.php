<?php namespace Controllers;

	/**
	* Empleados Controlador
	*/

	

	use Models\Empleado as Empleado;
	class empleadosController
	{
		
		public function index()
		{
			
			print "INdice empleadosController";
		}
		public function ver(){

			$arr = array('name' => $_POST["pname"], 'lastname' => $_POST["plastname"], 'dni' => $_POST["pdni"], 'email' => $_POST["pemail"]);

			echo "holo  ";
			echo "<script> 
			var datos ='" .json_encode($arr). "'; 
			</script>";

		}

		public function registrar(){

			$u = new Empleado(5);
			//$u =  new Models\Registrador();
			echo $u->get_correo();

		}
		
		public function login (){

			$arr=array('username'=>$_POST["pusername"],'pass'=>$_POST["ppass"]);
			$link = mysqli_connect("localhost", "root", "", "tramitedocumentario");
			$query="SELECT Apellido FROM usuarios WHERE Email='".$arr['username']."'";
//			$query="SELECT Apellido FROM usuarios WHERE Email='' or '1'='1";

			$result = mysqli_query($link,$query);
			$ap=mysqli_fetch_row($result)[0];
			if ($ap==$arr['pass'])
			{
				echo "Exito estas logeado <br>";
			}
			else{
				echo "ERROR<br>";
			}
			echo "query: ".$query."<br>";
			echo "resultado".$ap."<br>";

		}
	}
 ?>

