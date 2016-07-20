<?php namespace Models;
		/**
		*
		*/
		use Models\Query as Query;
		use Models\Persona as Persona;
		#include_once "Query.php";
		include_once "Persona.php";
		class Empleado extends Persona
		{

			var $id_cargo;
			var $id_area;
			var $activo;
			var $correo;
			var $password;

			public function  __construct()
			{
				$this-> query =  new Query();
			}


			function registrarEmpleado($Nombres,$Apellidos,$Id_Area,$Activo,$Correo,$Dni_Empleado,$Password)
			{
				$request2="INSERT INTO `personas`(`Dni`, `Nombres`, `Apellidos`) VALUES (".$Dni_Empleado.",'".$Nombres."','".$Apellidos."')";
				$this->query->consulta($request2);
				$id=$this->query->get_id();
				$request="INSERT INTO `empleados`(`Id_Empleado`,`Id_Cargo`, `Id_Area`, `Activo`, `Correo`,`Dni_Empleado`, `Password`) VALUES (".$id.",4,".$Id_Area.",'".$Activo."','".$Correo."',".$Dni_Empleado.",'".$Password."')";
				$this->query->consulta($request);
				$this->obtenerDatosId($id);
			}


			public function obtenerDatosId($Id_Empleado)
			{

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

			public function obtenerDatosDni($Dni_Empleado)
			{

				$request_empleado="SELECT `Id_Empleado`, `Id_Cargo`, `Id_Area`, `Activo`, `Correo`, `Dni_Empleado`, `Password` FROM `empleados` WHERE Dni_Empleado=".$Dni_Empleado;
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

					$request_persona="SELECT `Id_Persona`, `Dni`, `Nombres`, `Apellidos`, `Nombre_Empresa` FROM `personas` WHERE Dni=".$Dni_Empleado;
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

			public function obtenerDatosCorreo($Correo_Empleado)
			{

				$request_empleado="SELECT `Id_Empleado`, `Id_Cargo`, `Id_Area`, `Activo`, `Correo`, `Dni_Empleado`, `Password` FROM `empleados` WHERE Correo='".$Correo_Empleado."'";
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


					$request_persona="SELECT `Id_Persona`, `Dni`, `Nombres`, `Apellidos`, `Nombre_Empresa` FROM `personas` WHERE Id_Persona=".$this->id;
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




			public function getNombreCargo()
			{
				$request="SELECT Nombre_cargo FROM empleados  JOIN cargos ON empleados.Id_Cargo=cargos.Id_Cargo WHERE Id_Empleado=".$this->id;
				$result=$this->query->consulta($request);
				$datos=$result->fetch_assoc();

				return $datos["Nombre_cargo"];
			}

			public function getIdCargo()
			{
				return $this->id_cargo;
			}

			public function getIdArea()
			{
				return $this->id_area;
			}

			public function getNombreArea()
			{

				$request="SELECT Nom_Area FROM empleados  JOIN area ON empleados.Id_Area=area.Id_Area WHERE Id_Empleado=".$this->id;
				$result=$this->query->consulta($request);
				$datos=$result->fetch_assoc();
				return $datos["Nom_Area"];
			}

			public function getActivo()
			{
				return $this->activo;
			}

			public function getCorreo()
			{
				return $this->correo;
			}

			public function cambiarCorreo($Correo)
			{
				$request="UPDATE `empleados` SET `Correo`='".$Correo."' WHERE Id_Empleado=".$this->id;
				$this->query->consulta($request);
				$this->correo=$Correo;
			}

			public function getPassword()
			{
				return $this->password;
			}

			

			public function cambiarPassword($Password)
			{
				$request="UPDATE `empleados` SET `Password`='".$Password."' WHERE Id_Empleado=".$this->id;
				$this->query->consulta($request);
				$this->password=$Password;
			}
		}


 ?>

<?php
	/*
	$cosa= new Empleado();
	$cosa->obtenerDatosCorreo('lla@la');
	echo $cosa->getApellidos();
	*/
 ?>
