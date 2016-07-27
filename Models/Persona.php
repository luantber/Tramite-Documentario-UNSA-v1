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
			var $password_persona;


			function  __construct()
			{
				$this->query =  new Query();

			}

			//------------------------------------------crear , eliminar  y modificar personas--------------------------
			public function registrarPersona($Nombres,$Apellidos,$Dni)
			{
				if(!$this->repetidoDniPersona($Dni)){
					$request="INSERT INTO `personas`(`Dni`, `Nombres`, `Apellidos`) VALUES (".$Dni.",'".$Nombres."','".$Apellidos."')";
					$this->query->consulta($request);
					$this->obtenerDatosPersona($this->query->get_id());	
					return true;
				}
				return false;
				

			}
			public function registrarPersonaPassword($Nombres,$Apellidos,$Dni,$Password)
			{
				if(!$this->repetidoDniPersona($Dni)){
					$request="INSERT INTO `personas`(`Dni`, `Nombres`, `Apellidos`, `PasswordPersona`) VALUES (".$Dni.",'".$Nombres."','".$Apellidos."','".$Password."')";
					$this->query->consulta($request);
					$this->obtenerDatosPersona($this->query->get_id());	
					return true;
				}
				return false;
				

			}

			public function deletePersona($Id_Persona)
			{
				$request="DELETE FROM `personas` WHERE Id_Persona=".$Id_Persona;
				$this->query->consulta($request);
				$request2="DELETE FROM `empleados` WHERE Id_Empleado=".$Id_Persona;
				$this->query->consulta($request2);
			}

			public function save()
			{
				$this->cambiarNombres($this->nombres);
				$this->cambiarApellidos($this->apellidos);
				$this->cambiarDni($this->dni);
				$this->cambiarEmpresa($this->nombre_empresa);
				$this->cambiarPasswordPersona($this->password_persona);

			}


			//-------------------------------metodos para obtener datos de la db a esta clase---------------------------

			public function obtenerDatosPersona($Id_Persona)
			{

				$request="SELECT `Id_Persona`, `Dni`, `Nombres`, `Apellidos`, `Nombre_Empresa` , `PasswordPersona` FROM `personas` WHERE Id_Persona=".$Id_Persona;
				$result=$this->query->consulta($request);
				if ($result->num_rows != 0) {
				    $datos = $result->fetch_assoc();
				    $this->id=$datos["Id_Persona"];
				    $this->dni=$datos["Dni"];
				    $this->nombres=$datos["Nombres"];
				    $this->apellidos=$datos["Apellidos"];
				    $this->nombre_empresa=$datos["Nombre_Empresa"];
				    $this->password_persona=$datos["PasswordPersona"];
				    return true;
				}
				else {
				    return false;
				}
			}


			public function obtenerDatosPersonaByDni($Dni)
			{

				$request="SELECT `Id_Persona`, `Dni`, `Nombres`, `Apellidos`, `Nombre_Empresa`, `PasswordPersona` FROM `personas` WHERE Dni=".$Dni;
				$result=$this->query->consulta($request);
				if ($result->num_rows != 0) {
				    $datos = $result->fetch_assoc();
				    $this->id=$datos["Id_Persona"];
				    $this->dni=$datos["Dni"];
				    $this->nombres=$datos["Nombres"];
				    $this->apellidos=$datos["Apellidos"];
				    $this->nombre_empresa=$datos["Nombre_Empresa"];
				    $this->password_persona=$datos["PasswordPersona"];
				    return true;
				}
				else {
				    return false;
				}
			}




			//-------------------------------metodos para obtener arrays de datos
			public function getAllClientes()
			{
				$request="SELECT Id_Persona FROM personas  WHERE Id_Persona NOT IN (SELECT Id_Empleado FROM empleados)";
				$result=$this->query->consulta($request);
				$clientesIds=array();
				$clientesDatos=array();
				if ($result->num_rows > 0) {
			    
				    while($datos = $result->fetch_assoc()) {
				        array_push($clientesIds,$datos["Id_Persona"]);
				    }
				}
				foreach ($clientesIds as $id_cliente) {
					
					$persona_temp=new Persona();
					$persona_temp->obtenerDatosPersona($id_cliente);
					array_push($clientesDatos,$persona_temp->getAllDatos());

				}
				return $clientesDatos;
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
				array_push($datos,$this->password_persona);

				return $datos;
			}

			

			
			

			public function getAllClientesByNombreLike($Nombre_pattern)
			{

					
				$request="SELECT Id_Persona FROM personas  WHERE (Id_Persona NOT IN (SELECT Id_Empleado FROM empleados)) and (Nombres LIKE '%".$Nombre_pattern."%' OR Apellidos Like '%".$Nombre_pattern."%')";
				$result=$this->query->consulta($request);
				$clientesIds=array();
				$clientesDatos=array();
				if ($result->num_rows > 0) {
			    
				    while($datos = $result->fetch_assoc()) {
				        array_push($clientesIds,$datos["Id_Persona"]);
				    }
				}
				foreach ($clientesIds as $id_cliente) {
					
					$persona_temp=new Persona();
					$persona_temp->obtenerDatosPersona($id_cliente);
					array_push($clientesDatos,$persona_temp->getAllDatos());

				}
				return $clientesDatos;
			}	

			




			//--------------------------------------------otros---------------------------------------
			
			public function repetidoDniPersona($Dni)
			{
				$request="SELECT `Dni` FROM `personas` WHERE 1";
				$result=$this->query->consulta($request);
				if($result->num_rows!=0){

					while ($dato=$result->fetch_assoc()) {
						if($dato["Dni"]==$Dni){
							return true;
						}
					}
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

			public function getPasswordPersona()
			{
				return $this->password_persona;
			}

			public function cambiarPasswordPersona($PasswordPersona)
			{
				$request="UPDATE `personas` SET `PasswordPersona`='".$PasswordPersona."' WHERE Id_Persona=".$this->id;
				$this->query->consulta($request);
				$this->password_persona=$PasswordPersona;
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
  	$result=$persona->registrarPersonaPassword("Yara","de Zuñiga",06233420,"holi :3");
  	if($result==true){
  		echo $persona->getId()."</br>";
 		echo $persona->getNombres()."</br>";
 		echo $persona->getApellidos()."</br>";
 		echo $persona->getDni()."</br>";
 		echo $persona->getNombreEmpresa()."</br>";	
 		echo $persona->getPasswordPersona()."</br>";	
  	}
  	*/
  	/*
  	$persona=new Persona();
  	$persona->obtenerDatosPersona(28);
  	$persona->PasswordPersona=":D";
  	$persona->save();
  	echo $persona->getId()."</br>";
	echo $persona->getNombres()."</br>";
	echo $persona->getApellidos()."</br>";
	echo $persona->getDni()."</br>";
	echo $persona->getNombreEmpresa()."</br>";	
	echo $persona->getPasswordPersona()."</br>";	
  	*/
  	
	
 	/*
 	$p=new Persona();
 	echo $p->getAllPersonasDatos()[1][3];
	*/
 	/*
 	$p=new Persona();
 	$p->obtenerDatosPersona(14);
 	$p->dni=99999999;
 	$p->save();
	*/
 	/*
	$tram=new Persona();
 	$cosa=$tram->getAllClientes();
	
	foreach ($cosa as $key) {
		foreach ($key as $value) {
			echo $value." ";
		}
		echo "</br>";
	}
	*/
 	
 	/*
 	$cosa=new Persona();
 	$otraCosa=$cosa->estaRepetidoDniPersona(76452714);
 	if($otraCosa==true){
 		echo "true";	
 	}
 	else{
 		echo "false";
 	}
 	*/
 	
  ?>
