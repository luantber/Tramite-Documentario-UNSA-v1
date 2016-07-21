<?php namespace Models;
	/**
	* 
	*/

	include_once "Query.php";
   	include_once "Empleado.php";	
   	include_once "Tramite.php";
   	use Models\Query as Query;
	use Models\Empleado as Empleado;
	use Models\Tramite as Tramite;
	class Encargado extends Empleado
	{
		var $idsTramitesEncargados;
		function __construct()
		{
			$this->query=new Query();
		}

		function getIdsTramitesEncargados()
		{
			$request="SELECT `Id_Expediente` FROM `tramites` WHERE Id_Encargado=".$this->id;
			$result=$this->query->consulta($request);
			$idsTramitesEncargados=array();
			if ($result->num_rows > 0) {
		    
			    while($datos = $result->fetch_assoc()) {
			        array_push($idsTramitesEncargados,$datos["Id_Expediente"]);
			    }
			}
			return $idsTramitesEncargados;
		}


	}
	
 ?>


 <?php 
 	/*
 	$encargado=new Encargado();
 	$encargado->obtenerDatosId(4);
 	echo $encargado->getIdsTramitesEncargados()[0];
 	*/
  ?>