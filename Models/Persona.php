<?php namespace Models;
		/**
		*
		*/
		use Models\Query as Query;
		include_once "Query.php";
		class Persona
		{
			var $query;
			var $id;
			var $dni;
			var $nombres;
			var $apellidos;
			var $nombre_empresa;


			function  __construct()
			{
				$this->query =  new Query();

			}

			public function getAllPersonasDatos()
			{
				$request="SELECT `Id_Persona` FROM `personas` WHERE 1";
				$result=$this->query->consulta($request);
				$personasIds=array();
				$personasDatos=array();
				if ($result->num_rows > 0) {
			    
				    while($datos = $result->fetch_assoc()) {

				        array_push($personasIds,$datos["Id_Persona"]);
				    }
				}

				foreach ($personasIds as $id_persona) {
					
					$persona_temp=new Persona();
					$persona_temp->obtenerDatosPersona($id_persona);
					array_push($personasDatos,$persona_temp->getAllDatos());

				}

				return $personasDatos; 
			}

			public function getAllDatos()
			{
				$datos=array();
				array_push($datos,$this->id);
				array_push($datos,$this->dni);
				array_push($datos,$this->nombres);
				array_push($datos,$this->apellidos);
				array_push($datos,$this->nombre_empresa);
				return $datos;
			}

			public function registrarPersona($Nombres,$Apellidos,$Dni)
			{
				$request="INSERT INTO `personas`(`Dni`, `Nombres`, `Apellidos`) VALUES (".$Dni.",'".$Nombres."','".$Apellidos."')";
				$this->query->consulta($request);
				$this->obtenerDatosPersona($this->query->get_id());

			}



			public function obtenerDatosPersona($Id_Persona)
			{

				$request="SELECT `Id_Persona`, `Dni`, `Nombres`, `Apellidos`, `Nombre_Empresa` FROM `personas` WHERE Id_Persona=".$Id_Persona;
				$result=$this->query->consulta($request);
				if ($result->num_rows != 0) {
				    $datos = $result->fetch_assoc();
				    $this->id=$datos["Id_Persona"];
				    $this->dni=$datos["Dni"];
				    $this->nombres=$datos["Nombres"];
				    $this->apellidos=$datos["Apellidos"];
				    $this->nombre_empresa=$datos["Nombre_Empresa"];
				    return true;
				}
				else {
				    return false;
				}
			}

			public function obtenerDatosPersonaByDni($Dni)
			{

				$request="SELECT `Id_Persona`, `Dni`, `Nombres`, `Apellidos`, `Nombre_Empresa` FROM `personas` WHERE Dni=".$Dni;
				$result=$this->query->consulta($request);
				if ($result->num_rows != 0) {
				    $datos = $result->fetch_assoc();
				    $this->id=$datos["Id_Persona"];
				    $this->dni=$datos["Dni"];
				    $this->nombres=$datos["Nombres"];
				    $this->apellidos=$datos["Apellidos"];
				    $this->nombre_empresa=$datos["Nombre_Empresa"];
				    return true;
				}
				else {
				    return false;
				}
			}

			public function getId()
			{
				return $this->id;
			}

			public function getNombres()
			{
				return $this->nombres;
			}

			public function cambiarNombres($Nombres)
			{
				$request="UPDATE `personas` SET `Nombres`='".$Nombres."' WHERE Id_Persona=".$this->id;
				$this->query->consulta($request);
				$this->nombres=$Nombres;
			}

			public function getApellidos()
			{
				return $this->apellidos;
			}

			public function cambiarApellidos($Apellidos)
			{
				$request="UPDATE `personas` SET `Apellidos`='".$Apellidos."' WHERE Id_Persona=".$this->id;
				$this->query->consulta($request);
				$this->apellidos=$Apellidos;
			}

			public function getDni()
			{
				return $this->dni;
			}

			public function cambiarDni($Dni)
			{
				$request="UPDATE `personas` SET `Dni`='".$Dni."' WHERE Id_Persona=".$this->id;
				$this->query->consulta($request);
				$this->dni=$Dni;
			}

			public function getNombreEmpresa()
			{
				return $this->nombre_empresa;
			}

			public function cambiarEmpresa($Empresa)
			{
				$request="UPDATE `personas` SET `Nombre_Empresa`='".$Empresa."' WHERE Id_Persona=".$this->id;
				$this->query->consulta($request);
				$this->nombre_empresa=$Empresa;
			}



		}

 ?>

 <?php
 	/*
 	$result=$persona=new Persona(7);

 	echo $persona->get_id()."</br>";
 	echo $persona->get_nombres()."</br>";
 	echo $persona->get_apellidos()."</br>";
 	echo $persona->get_dni()."</br>";
 	echo $persona->get_nombre_empresa()."</br>";
  	$persona->cambiar_nombres("Panfilo");
  	$persona->cambiar_apellidos("Smith");
  	$persona->cambiar_dni(66666666);
  	$persona->cambiar_empresa("ACME");
  	echo $persona->get_nombres()."</br>";
  	echo $persona->get_apellidos()."</br>";
  	echo $persona->get_dni()."</br>";
  	echo $persona->get_nombre_empresa()."</br>";
  	*/
  	/*
  	$persona = new Persona();
  	$persona->registrarPersona("Yara","de Zuñiga",04623424);
  	echo $persona->getId()."</br>";
 	echo $persona->getNombres()."</br>";
 	echo $persona->getApellidos()."</br>";
 	echo $persona->getDni()."</br>";
 	echo $persona->getNombreEmpresa()."</br>";
	*/
 	/*
 	$p=new Persona();
 	echo $p->getAllPersonasDatos()[1][3];
	*/
  ?>
