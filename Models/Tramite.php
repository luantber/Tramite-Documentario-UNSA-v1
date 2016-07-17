<?php namespace Models;
	/**
	*
	*/

	include_once "Query.php";
	use Models\Query as Query;
	class Tramite
	{
		var $folios;
		var $fecha_ingresa;
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

		function obtenerDatosId()
		{


		}

		function getFolios()
		{

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
