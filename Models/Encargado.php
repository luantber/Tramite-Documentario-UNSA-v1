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
			$request="SELECT `Id_Expediente`, `Folios`, `Fecha_Ingreso`, `Fecha_Termino`, `Asunto`, `Id_Persona`, `Id_Area_Destino`, `Id_Encargado`, `Recibido`, `Id_Area_Actual` FROM `tramites` WHERE Id_Encargado=".$this->id;
		}
	}
	
 ?>