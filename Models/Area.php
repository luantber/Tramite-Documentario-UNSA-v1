<?php namespace Models;
	/**
	* 
	*/

	use Models\Query as Query;
    include_once "Query.php";
	class Area
	{
		var $query;	
		
		function __construct()
		{
			$this->query=new Query();
		}

		function obtenerAreas()
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
	}


 ?>

 <?php 
 /*
 	$cosa=new Area();
 	$otraCosa=$cosa->obtenerAreas();
 	echo $otraCosa[0];
  */

  ?>