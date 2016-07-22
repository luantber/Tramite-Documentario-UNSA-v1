<?php namespace Models;
	
	/**
	* 
	*/
	include_once "Query.php";
	include_once "Empleado.php";
	include_once "Persona.php";
	include_once "Area.php";
	include_once "Tramite.php";
	use Models\Query as Query;
	use Models\Persona as Persona;
	use Models\Empleado as Empleado;
	use Models\Area as Area;
	use Models\Tramite as Tramite;
	class Movimiento
	{
		var $id_movimiento;
		var $id_expediente;
		var $id_remitente;
		var $id_destino;
		var $id_estado;
		var $id_persona;
		var $query;
		var $fecha;
		function __construct()
		{
			$this->query=new Query();
		}

		function obtenerDatosById($id_movimiento)
		{
			$request="SELECT `Id_Movimiento`, `Id_Expediente`, `Id_Remitente`, `Id_Destino`, `Id_Estado`, `Id_Personas`, `Fecha` FROM `movimientos` WHERE Id_Movimiento=".$id_movimiento;
			$result=$this->query->consulta($request);
			if ($result->num_rows > 0) {
			    $datos = $result->fetch_assoc();
			    $this->id_movimiento=$datos["Id_Movimiento"];
			    $this->id_expediente=$datos["Id_Expediente"];
			    $this->id_remitente=$datos["Id_Remitente"];
			    $this->id_destino=$datos["Id_Destino"];
			    $this->id_estado=$datos["Id_Estado"];
			    $this->id_persona=$datos["Id_Personas"];
			    $this->fecha=$datos["Fecha"];			    	    
			}
		}

		function getAllDatosNombres()
		{
			$datos=array();
			$tramite_temp=new Tramite();
			$tramite_temp->obtenerDatosTramiteId($this->id_expediente);
			$persona_temp=new Persona();
			$persona_temp->obtenerDatosPersona($this->id_persona);
			$area_remitente=new Area();
			$area_remitente->obtenerDatosAreaById($this->id_remitente);
			$area_destino=new Area();
			$area_destino->obtenerDatosAreaById($this->id_destino);
			array_push($datos, $this->id_movimiento);
			array_push($datos, $this->id_expediente);
			array_push($datos, $area_remitente->nombre_area);
			array_push($datos, $area_destino->nombre_area);
			array_push($datos, $tramite_temp->estado);
			array_push($datos, $persona_temp->nombres." ".$persona_temp->apellidos);
			array_push($datos, $this->fecha);
			return $datos;
		}

		function getAllDatos()
		{

			$datos=array();
			array_push($datos, $this->id_movimiento);
			array_push($datos, $this->id_expediente);
			array_push($datos, $this->id_remitente);
			array_push($datos, $this->id_destino);
			array_push($datos, $this->id_estado);
			array_push($datos, $this->id_persona);
			array_push($datos, $this->fecha);
			return $datos;
		}

		function getIdsMovimientos($Id_Expediente)
		{
			$request="SELECT `Id_Movimiento` FROM `movimientos` WHERE Id_Expediente=".$this->Id_Expediente;
			$result=$this->query->consulta($request);
			$IdsMovimientos=array();
			if ($result->num_rows > 0) {
		    
			    while($datos = $result->fetch_assoc()) {
			        array_push($IdsMovimientos,$datos["Id_Movimiento"]);
			    }
			}
			return $IdsMovimientos; 
		}

		function getAllMovimientos(){

			$request="SELECT `Id_Movimiento` FROM `movimientos` WHERE 1";
			$result=$this->query->consulta($request);
			$movimientosIds=array();
			$movimientosDatos=array();
			if ($result->num_rows > 0) {
		    
			    while($datos = $result->fetch_assoc()) {

			        array_push($movimientosIds,$datos["Id_Movimiento"]);
			    }
			}

			foreach ($movimientosIds as $id_movimiento) {
				
				$movimiento_temp=new Movimiento();
				$movimiento_temp->obtenerDatosById($id_movimiento);
				array_push($movimientosDatos,$movimiento_temp->getAllDatosNombres());

			}

			return $movimientosDatos; 
		}

		//obtiene los datos de un movimiento en un array usando el id_movimiento
		function getMovimientoDatosById($Id_Movimiento)
		{
			$request="SELECT `Id_Movimiento`, `Id_Expediente`, `Id_Remitente`, `Id_Destino`, `Id_Estado`, `Id_Personas`, `Fecha` FROM `movimientos` WHERE Id_Movimiento=".$Id_Movimiento;
			$result=$this->query->consulta($request);
			$datos=$result->fetch_assoc();
			$DatosMovimientos=array();
			
		    array_push($DatosMovimientos,$datos["Id_Movimiento"]);
		    array_push($DatosMovimientos,$datos["Id_Expediente"]);
		    array_push($DatosMovimientos,$datos["Id_Remitente"]);
		    array_push($DatosMovimientos,$datos["Id_Destino"]);
		    array_push($DatosMovimientos,$datos["Id_Estado"]);
		    array_push($DatosMovimientos,$datos["Id_Personas"]);
		    array_push($DatosMovimientos,$datos["Fecha"]);
			
			return $DatosMovimientos; 
		}

	}

 ?>


 <?php 
 	/*
 	$cosas= new Movimiento();
 	
 	$cosa=$cosas->getAllMovimientos();
	foreach ($cosa as $key) {
		foreach ($key as $value) {
			echo $value." ";
		}
		echo "</br>";
	}
	*/
  ?>