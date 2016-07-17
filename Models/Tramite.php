<?php namespace Models;
	/**
	*
	*/

	include_once "Query.php";
	use Models\Query as Query;
	class Tramite
	{
		var $id_expediente;
		var $folios;
		var $fecha_ingreso;
		var $fecha_termino;
		var $asunto;
		var $id_persona;
		var $id_area_destino;
		var $estado;
		var $descripcionEstado;
		var $query;

		function __construct()
		{
			# code...
			$this->query= new Query();
			
		}

		function obtenerDatosTramiteId($IdTramite)
		{
			$request="SELECT `Id_Expediente`, `Folios`, `Fecha_Ingreso`, `Fecha_Termino`, `Asunto`, `Id_Persona`, `Id_Area_Destino` FROM `tramites` WHERE Id_Expediente=".$IdTramite;
				$result=$this->query->consulta($request);
				if ($result->num_rows != 0) {
				    $datos = $result->fetch_assoc();
				    $this->id_persona=$datos["Id_Persona"];
				    $this->folios=$datos["Folios"];
				    $this->fecha_termino=$datos["Fecha_Termino"];
				    $this->fecha_ingreso=$datos["Fecha_Ingreso"];
				    $this->asunto=$datos["Asunto"];
				    $this->id_expediente=$datos["Id_Expediente"];

				    $request2="SELECT * FROM tramites  JOIN estado ON tramites.Id_Expediente=estado.Id_Expediente WHERE tramites.Id_Expediente=".$IdTramite;
				    $result2=$this->query->consulta($request2);
				    $datos2=$result2->fetch_assoc();
				    $this->descripcionEstado=$datos2["Descripcion"];
				    $this->estado=$datos2["Estado"];



				    return true;
				}
				else {
				    return false;
				}

		}

		function getFolios()
		{
			return $this->folios;
		}

		function getFechaIngreso()
		{

		}

		function crearTramite($idPersona,$idAreaDestino,$asunto,$folios)
		{

		}

		public function getFechaTermino()
		{

		}

		public function getAsunto()
		{

		}

		public function getIdAreaDestino()
		{

		}

		public function getEstado()
		{

		}

		public function getDescripcionEstado()
		{

		}




	}

 ?>


<?php 
	$tram=new Tramite();
	$tram->obtenerDatosTramiteId(2);
	echo $tram->getFolios();
 ?>