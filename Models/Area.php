<?php namespace Models;
	/**
	* 
	*/

	use Models\Query as Query;
    include_once "Query.php";
	class Area
	{
		var $query;	
		var $nombre_area;
		var $descripcion_area;
		var $id_area;
		function __construct()
		{
			$this->query=new Query();
		}

		public function registrarArea($nombre_area,$descripcion_area)
		{
			$request="INSERT INTO `area`(`Nom_Area`, `Descripcion`) VALUES ('".$nombre_area."','".$descripcion_area."')";
				$this->query->consulta($request);
				$this->obtenerDatosAreaById($this->query->get_id());
		}

		public function obtenerDatosAreaById($id_area)
		{
			$request="SELECT `Id_Area`, `Nom_Area`, `Descripcion` FROM `area` WHERE Id_Area=".$id_area;
			$result=$this->query->consulta($request);
			if ($result->num_rows != 0) {
			    $datos = $result->fetch_assoc();
			    $this->id_area=$datos["Id_Area"];
			    $this->nombre_area=$datos["Nom_Area"];
			    $this->descripcion_area=$datos["Descripcion"];
			    return true;
			}
			else {
			    return false;
			}
		}


		public function obtenerAreas()
		{
			$request="SELECT `Id_Area`, `Nom_Area`, `Descripcion` FROM `area` WHERE 1";
				$result=$this->query->consulta($request);
				
    			$nombresAreas=array();
				if ($result->num_rows > 0) {
			    // output data of each row
				    while($datos = $result->fetch_assoc()) {
				        array_push($nombresAreas,$datos["Nom_Area"]);
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

		

	}


 ?>

 <?php 
	/* 
 	$cosa=new Area();
 	$cosa->registrarArea("Gerencia","Aqui se hacen cosas");
 	echo $cosa->getNombreArea();
 	*/
  

  ?>