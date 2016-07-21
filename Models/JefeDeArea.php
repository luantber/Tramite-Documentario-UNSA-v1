<?php namespace Models;
	/**
	* 
	*/

	include_once "Query.php";
   	include_once "Empleado.php";	
   	include_once "Tramite.php";
   	include_once "Encargado.php";
   	use Models\Query as Query;
	use Models\Persona as Persona;
	use Models\Tramite as Tramite;
	use Models\Encargado as Encargado;
	class JefeDeArea extends Encargado
	{
		
		function __construct()
		{
			$this->query=new Query();
		}

		function delegarTramite($Id_Empleado,$Id_tramite)
		{
			$request="UPDATE `tramites` SET `Id_Encargado`=".$Id_Empleado." WHERE Id_Expediente=".$Id_tramite;
			$this->query->consulta($request);
		}


	}
	
 ?>

 <?php 
 	/*
 	$jefe=new JefeDeArea();
 	$jefe->delegarTramite(5,9);
 	$jefe->obtenerDatosId(5);
	*/
  ?>