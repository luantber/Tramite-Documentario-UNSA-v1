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

		public function registro(){

			if (empty($_POST)){
				return;
			}


			$arr = array('name' => $_POST["pname"], 'lastname' => $_POST["plastname"], 'dni' => $_POST["pdni"], 'email' => $_POST["pemail"]);
			
			$link = mysqli_connect("localhost", "root", "", "tramitedocumentario"); //localhost por ahora será el servidor local 
			//Estos datos los pasare despues al config.php ... 
			
			$query="INSERT INTO usuarios (Nombre,Apellido, DNI,Email,Sexo,Fecha_registro) VALUES ('".$arr['name']."','".$arr['lastname']."','".$arr['dni']."','".$arr['email']."','1','2016-06-20')";
			$result = mysqli_query($link,$query);

			if ($result){
				echo "<br>Bueno\n";
			}
			else{
				echo "<br>ERROR\n";
			}
			print_r($query);

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