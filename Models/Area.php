<?php namespace Models;
	/**
	* 
	*/

	include_once "Query.php";
	include_once "Empleado.php";
	include_once "Persona.php";
	
	use Models\Query as Query;
	use Models\Persona as Persona;
	use Models\Empleado as Empleado;
	
	class Area
	{
		var $query;	
		var $nombre_area;
		var $descripcion_area;
		var $id_area;
		var $id_jefe_de_area;
		function __construct()
		{
			$this->query=new Query();
		}

		

		public function registrarArea($nombre_area,$descripcion_area,$Id_JefedeArea)
		{
			$request="INSERT INTO `area`(`Nom_Area`, `Descripcion`, `Id_JefedeArea`) VALUES ('".$nombre_area."','".$descripcion_area."',".$Id_JefedeArea.")";
				$this->query->consulta($request);
				$this->obtenerDatosAreaById($this->query->get_id());
		}

		public function obtenerDatosAreaById($id_area)
		{
			$request="SELECT `Id_Area`, `Nom_Area`, `Descripcion`, `Id_JefedeArea` FROM `area` WHERE Id_Area=".$id_area;
			$result=$this->query->consulta($request);
			if ($result->num_rows != 0) {
			    $datos = $result->fetch_assoc();
			    $this->id_area=$datos["Id_Area"];
			    $this->nombre_area=$datos["Nom_Area"];
			    $this->descripcion_area=$datos["Descripcion"];
			    $this->id_jefe_de_area=$datos["Id_JefedeArea"];
			    return true;
			}
			else {
			    return false;
			}
		}

		public function getAllAreasDatos()
		{
			$request="SELECT `Id_Area` FROM `area` WHERE 1";
			$result=$this->query->consulta($request);
			$areasIds=array();
			$areasDatos=array();
			if ($result->num_rows > 0) {
		    
			    while($datos = $result->fetch_assoc()) {

			        array_push($areasIds,$datos["Id_Area"]);
			    }
			}

			foreach ($areasIds as $id_area) {
				
				$area_temp=new Area();
				$area_temp->obtenerDatosAreaById($id_area);
				array_push($areasDatos,$area_temp->getAllDatos());

			}

			return $areasDatos; 
		}

		#devuelve array de los datos de este area orden id , nombre, descripcion
		public function getAllDatos()
		{
			$datos=array();
			array_push($datos,$this->id_area);
			array_push($datos,$this->nombre_area);
			array_push($datos,$this->descripcion_area);
			array_push($datos,$this->getNombreJefe($this->id_jefe_de_area));
			return $datos;
		}

		public function obtenerAreas()
		{
			$request="SELECT `Id_Area`, `Nom_Area`, `Descripcion` FROM `area` WHERE 1";
				$result=$this->query->consulta($request);
				
    			$nombresAreas=array();
				if ($result->num_rows > 0) {
			    // output data of each row
				    while($datos = $result->fetch_assoc()) {
				        array_push($nombresAreas,
				        	array(
				        		$datos["Id_Area"],
				        		$datos["Nom_Area"]
				        		)
				        	);
				    }
				}
				return $nombresAreas; 
		}

		public function getNombreArea()
		{
			return $this->nombre_area;
		}

		public function getDescripcionArea()
		{
			return $this->descripcion_area;
		}

		public function getIdArea()
		{
			return $this->id_area;
		}

		public function getIdJefe()
		{
			return $this->id_jefe_de_area;
		}		

		public function getNombreJefe()
		{
			$temp=new Persona();
			$temp->obtenerDatosPersona($this->id_jefe_de_area);
			return $temp->nombres." ".$temp->apellidos;
		}

	}


 ?>

 <?php 
	/* 
 	$cosa=new Area();
 	$cosa->registrarArea("Gerencia","Aqui se hacen cosas");
 	echo $cosa->getNombreArea();
 	*/
  
 	//$cosa=new Area();
 	//echo $cosa->getAllAreasDatos()[0][1];
 	/*
 	$cosas= new Area();
 	
 	$cosa=$cosas->getAllAreasDatos();
	foreach ($cosa as $key) {
		foreach ($key as $value) {
			echo $value." ";
		}
		echo "</br>";
	}
	*/
  ?>