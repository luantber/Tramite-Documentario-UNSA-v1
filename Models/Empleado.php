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

			
			var $id_cargo; //int
			var $id_area;	//int
			var $activo;	//varchar
			var $correo;	//varchar
			var $password;	//varchar
			var $nombre_area;	//string
			var $nombre_cargo;	//string

			public function  __construct()
			{
				$this-> query =  new Query();
			}

			#el orden de los datos de cada Empleado esta en la funcion getAllDatos , aqui abajo
			function getAllEmpleadosDatos()
			{
				$request="SELECT `Id_Empleado` FROM `empleados` WHERE 1";
				$result=$this->query->consulta($request);
				$empleadosIds=array();
				$empleadosDatos=array();
				if ($result->num_rows > 0) {
			    
				    while($datos = $result->fetch_assoc()) {

				        array_push($empleadosIds,$datos["Id_Empleado"]);
				    }
				}

				foreach ($empleadosIds as $id_empleado) {
					
					$empleado_temp=new Empleado();
					$empleado_temp->obtenerDatosId($id_empleado);
					array_push($empleadosDatos,$empleado_temp->getAllDatos());

				}

				return $empleadosDatos; 
			}

			# retorna array de datos de esta persona el orden seria id, dni , nombres .... mire abajo
			function getAllDatos()
			{
				$datos=array();
				array_push($datos,$this->id);
				array_push($datos,$this->dni);
				array_push($datos,$this->nombres);
				array_push($datos,$this->apellidos);
				array_push($datos,$this->nombre_empresa);
				array_push($datos,$this->id_area);
				array_push($datos,$this->nombre_area);
				array_push($datos,$this->id_cargo);
				array_push($datos,$this->nombre_cargo);
				array_push($datos,$this->activo);
				array_push($datos,$this->correo);
				array_push($datos,$this->password);
				return $datos;

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
					$this->getNombreArea();
					$this->getNombreCargo();
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
						$this->getNombreArea();
						$this->getNombreCargo();
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
						$this->getNombreArea();
						$this->getNombreCargo();
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
				$this->nombre_cargo=$datos["Nombre_cargo"];
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
				$this->nombre_area=$datos["Nom_Area"];
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

			public function getPassword()
			{
				return $this->password;
			}

			public function cambiarCorreo($Correo)
			{
				$request="UPDATE `empleados` SET `Correo`='".$Correo."' WHERE Id_Empleado=".$this->id;
				$this->query->consulta($request);
				$this->correo=$Correo;
			}

			public function cambiarActivo($Activo)
			{
				$request="UPDATE `empleados` SET `Activo`='".$Activo."' WHERE Id_Empleado=".$this->id;
				$this->query->consulta($request);
				$this->activo=$Activo;
			}

			public function cambiarIdCargo($Id_Cargo)
			{
				$request="UPDATE `empleados` SET `Id_Cargo`='".$Id_Cargo."' WHERE Id_Empleado=".$this->id;
				$this->query->consulta($request);
				$this->id_cargo=$Id_Cargo;
			}			

			public function cambiarIdArea($Id_Area)
			{
				$request="UPDATE `empleados` SET `Id_Area`='".$Id_Area."' WHERE Id_Empleado=".$this->id;
				$this->query->consulta($request);
				$this->id_area=$Id_Area;
			}			

			public function cambiarPassword($Password)
			{
				$request="UPDATE `empleados` SET `Password`='".$Password."' WHERE Id_Empleado=".$this->id;
				$this->query->consulta($request);
				$this->password=$Password;
			}

			public function saveEmpleado()
			{
				$this->cambiarNombres($this->nombres);
				$this->cambiarApellidos($this->apellidos);
				$this->cambiarDni($this->dni);
				$this->cambiarEmpresa($this->nombre_empresa);
				$this->cambiarActivo($this->activo);
				$this->cambiarPassword($this->password);
				$this->cambiarCorreo($this->correo);
				$this->cambiarIdArea($this->id_area);
				$this->cambiarIdCargo($this->id_cargo);


			}


		}


 ?>

<?php
	/*
	$cosa= new Empleado();
	$cosa->obtenerDatosCorreo('lla@la');
	echo $cosa->getApellidos();
	*/
	/*
	$cosa=new Empleado();
	$cosa->obtenerDatosId(14);
	$cosa->correo="hhhh@hhh";
	$cosa->saveEmpleado();
	*/
 ?>
