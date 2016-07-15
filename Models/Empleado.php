<?php 	namespace Models;
		/**
		* 	
		*/
		
		use Models\Query as Query;
		include_once "Include.php";
		class Empleado extends Persona
		{
			
			var $id_cargo;
			var $id_area;
			var $activo;
			var $correo;
			var $password;

			public function  __construct($Id_Empleado){
				$this->query =  new Query();
				$request_empleado="SELECT `Id_Empleado`, `Id_Cargo`, `Id_Area`, `Activo`, `Correo`, `Dni_Empleado`, `Password` FROM `empleados` WHERE Id_Empleado=".$Id_Empleado;
				$result_empleado=$this->query->consulta($request_empleado);
				if($result_empleado->num_rows != 0){
					$datos_empleado = $result_empleado->fetch_assoc();
					$this->id=$datos_empleado["Id_Empleado"];
					$this->id_cargo=$datos_empleado["Id_Cargo"];
					$this->id_area=$datos_empleado["Id_Area"];
					$this->activo=$datos_empleado["Activo"];
					$this->correo=$datos_empleado["Correo"];
					$this->id_cargo=$datos_empleado["Id_Cargo"];
					$this->dni=$datos_empleado["Dni_Empleado"];
					$this->password=$datos_empleado["Password"];
				
					$request_persona="SELECT `Id_Persona`, `Dni`, `Nombres`, `Apellidos`, `Nombre_Empresa` FROM `personas` WHERE Id_Persona=".$Id_Empleado;
					$result2=$this->query->consulta($request_persona);
				    $datos_persona = $result2->fetch_assoc();				    			
				    $this->nombres=$datos_persona["Nombres"];
				    $this->apellidos=$datos_persona["Apellidos"];
				    $this->nombre_empresa=$datos_persona["Nombre_Empresa"];
					return true;
				}
				else{
					return false;
				}

					

			}
			
			public function get_nombre_cargo()
			{
				$request="SELECT Nombre_cargo FROM empleados  JOIN cargos ON empleados.Id_Cargo=cargos.Id_Cargo WHERE Id_Empleado=".$this->id;
				$result=$this->query->consulta($request);
				$datos=$result->fetch_assoc();

				return $datos["Nombre_cargo"];
			}

			public function get_id_cargo()
			{
				return $this->id_cargo;
			}

			public function get_id_area()
			{
				return $this->id_area;
			}

			public function get_nombre_area()
			{

				$request="SELECT Nom_Area FROM empleados  JOIN area ON empleados.Id_Area=area.Id_Area WHERE Id_Empleado=".$this->id;
				$result=$this->query->consulta($request);
				$datos=$result->fetch_assoc();
				return $datos["Nom_Area"];
			}			

			public function get_activo()
			{
				return $this->activo;
			}

			public function get_correo()
			{
				return $this->correo;
			}

			public function get_password()
			{
				return $this->password;
			}
			
		}


 ?>

<?php 
	
	$persona= new Empleado(8);
	echo $persona->get_id()."</br>";
 	echo $persona->get_nombres()."</br>";
 	echo $persona->get_apellidos()."</br>";
 	echo $persona->get_dni()."</br>";
 	echo $persona->get_nombre_empresa()."</br>";
 	echo $persona->get_id_cargo()."</br>";
 	echo $persona->get_nombre_cargo()."</br>";
 	echo $persona->get_id_area()."</br>";
 	echo $persona->get_nombre_area()."</br>";
 	echo $persona->get_activo()."</br>";
 	echo $persona->get_correo()."</br>";
 	echo $persona->get_password()."</br>";
	
 ?>
