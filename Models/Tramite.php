<?php namespace Models;
	/**
	*
	*/

	include_once "Query.php";
	include_once "Empleado.php";
	use Models\Query as Query;
	use Models\Persona as Persona;
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
		var $tipo_tramite;
		var $prioridad;
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

				    $request3="SELECT `Id_Expediente`, `Tipo_Tramite`, `Prioridad` FROM `tipo_tramite` WHERE Id_Expediente=".$IdTramite;
				    $result3=$this->query->consulta($request3);
				    $datos3=$result3->fetch_assoc();
				    $this->tipo_tramite=$datos3["Tipo_Tramite"];
				    $this->prioridad=$datos3["Prioridad"];


				    return true;
				}
				else {
				    return false;
				}

		}

		

		function registrarTramite($Folios,$Asunto,$Id_Persona,$Id_Area_Destino,$Tipo_Tramite,$Prioridad,$Estado,$DescripcionEstado)
		{
			$request="INSERT INTO `tramites`(`Folios`, `Fecha_Ingreso`, `Asunto`, `Id_Persona`, `Id_Area_Destino`) VALUES (".$Folios.",'2016-07-15','".$Asunto."',".$Id_Persona.",".$Id_Area_Destino.")";
			$this->query->consulta($request);
			$tramite_id=$this->query->get_id();
			$request2="INSERT INTO `tipo_tramite`(`Id_Expediente`, `Tipo_Tramite`, `Prioridad`) VALUES (".$tramite_id.",'".$Tipo_Tramite."',".$Prioridad.")";
			$this->query->consulta($request2);
			$request3="INSERT INTO `estado`(`Id_Expediente`, `Estado`, `Descripcion`) VALUES (".$tramite_id.",'".$Estado."','".$DescripcionEstado."')";
			$this->query->consulta($request3);

			$request4="INSERT INTO `movimientos`(`Id_Expediente`, `Id_Remitente`, `Id_Destino`, `Id_Estado`, `Fecha`) VALUES ($tramite_id,0,$Id_Area_Destino,$tramite_id,'2016-07-15')";
			$this->query->consulta($request4);

			$this->obtenerDatosTramiteId($tramite_id);

		}


		function registrarTramiteByDni($Folios,$Asunto,$Dni_Persona,$Id_Area_Destino,$Tipo_Tramite,$Prioridad,$Estado,$DescripcionEstado)
		{
			$persona=new Persona();
			$persona->obtenerDatosPersonaByDni($Dni_Persona);
			$Id_Persona=$persona->getId();
			$request="INSERT INTO `tramites`(`Folios`, `Fecha_Ingreso`, `Asunto`, `Id_Persona`, `Id_Area_Destino`) VALUES (".$Folios.",'2016-07-15','".$Asunto."',".$Id_Persona.",".$Id_Area_Destino.")";
			$this->query->consulta($request);
			$tramite_id=$this->query->get_id();
			$request2="INSERT INTO `tipo_tramite`(`Id_Expediente`, `Tipo_Tramite`, `Prioridad`) VALUES (".$tramite_id.",'".$Tipo_Tramite."',".$Prioridad.")";
			$this->query->consulta($request2);
			$request3="INSERT INTO `estado`(`Id_Expediente`, `Estado`, `Descripcion`) VALUES (".$tramite_id.",'".$Estado."','".$DescripcionEstado."')";
			$this->query->consulta($request3);

			$request4="INSERT INTO `movimientos`(`Id_Expediente`, `Id_Remitente`, `Id_Destino`, `Id_Estado`, `Fecha`) VALUES ($tramite_id,0,$Id_Area_Destino,$tramite_id,'2016-07-15')";
			$this->query->consulta($request4);

			$this->obtenerDatosTramiteId($tramite_id);

		}



		//esto retorna un array con los Ids de los movimientos de este Tramite
		function getIdsMovimientos()
		{
			$request="SELECT `Id_Movimiento` FROM `movimientos` WHERE Id_Expediente=".$this->id_expediente;
			$result=$this->query->consulta($request);
			$IdsMovimientos=array();
			if ($result->num_rows > 0) {
		    
			    while($datos = $result->fetch_assoc()) {
			        array_push($IdsMovimientos,$datos["Id_Movimiento"]);
			    }
			}
			return $IdsMovimientos; 
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
		/*
		function getAllTramitesDatos()
		{
			$request="SELECT `Id_Expediente` FROM `tramites` WHERE 1";
			$result=$this->query->consulta->($request);
			$tramitesIds=array();
			if ($result->num_rows > 0) {
		    
			    while($datos = $result->fetch_assoc()) {
			        array_push($tramite,$datos["Id_Expediente"]);
			    }
			}

			foreach ($tramite_id as $key => $value) {
				# code...
			}

			return $IdsMovimientos; 
		}
		*/

		function getFolios()
		{
			return $this->folios;
		}

		function getFechaIngreso()
		{
			return $this->fecha_ingreso;
		}

		public function getFechaTermino()
		{
			return $this->fecha_termino;
		}

		public function getAsunto()
		{
			return $this->asunto;
		}

		public function getIdAreaDestino()
		{
			return $this->id_area_destino;
		}

		public function getEstado()
		{
			return $this->estado;
		}

		public function getDescripcionEstado()
		{
			return $this->descripcionEstado;
		}

		public function getPrioridad()
		{
			return $this->prioridad;
		}

		public function getIdPersona()
		{
			return $this->id_persona;
		}

		public function getTipoTramite()
		{
			return $this->tipo_tramite;
		}

		public function getIdExpediente()
		{
			return $this->id_expediente;
		}

		

		//------------------------------------funciones para editar
		
		public function editarFolios()
	    {
	      $request="UPDATE `tramites` SET `Folios`=".$this->folios." WHERE Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
	    }

	    public function editarFechaIngreso()
	    {
	      $request="UPDATE `tramites` SET `Fecha_Ingreso`=".$this->fecha_ingreso." WHERE Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
	    }  


	    public function editarFechaTermino()
	    {
	      $request="UPDATE `tramites` SET `Fecha_Termino`=".$this->fecha_termino." WHERE Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
	    }

	    public function editarAsunto()
	    {
	      $request="UPDATE `tramites` SET `Asunto`='".$this->asunto."' WHERE Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
	    }

	    public function editarIdPersona()
	    {
	      $request="UPDATE `tramites` SET `Id_Persona`=".$this->id_persona." WHERE Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
	    }

	    public function editarIdAreaDestino()
	    {
	      $request="UPDATE `tramites` SET `Id_Area_Destino`=".$this->id_area_destino." WHERE Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
	    }

	    public function editarTipoTramite()
	    {
	      $request="UPDATE `tipo_tramite` SET `Tipo_Tramite`='".$this->tipo_tramite."' WHERE  Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
	    }

	    public function editarTramitePrioridad()
	    {
	      $request="UPDATE `tipo_tramite` SET `Prioridad`=".$this->prioridad." WHERE  Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
	    }

	    public function editarEstado()
	    {
	      $request="UPDATE `estado` SET `Estado`='".$this->estado."' WHERE Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
	    }

	    
	    public function editarDescripcionEstado()
	    {
	      $request="UPDATE `estado` SET `Descripcion`='".$this->descripcionEstado."' WHERE Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
	    }


		public function save()
		{
			$this->editarFolios();
			$this->editarFechaIngreso();
			$this->editarFechaTermino();
			$this->editarAsunto();
			$this->editarIdPersona();
			$this->editarIdAreaDestino();
			$this->editarTipoTramite();
			$this->editarTramitePrioridad();
			$this->editarEstado();
			$this->editarDescripcionEstado();

		}



	}

 ?>
	    


<?php 
	/*
	$tram=new Tramite();
	//$tram->registrarTramiteByDni(34,"dadsad",11111111,1,"jasas",2,"en proceso","asdaddsa");
	
	$tram->obtenerDatosTramiteId(8);
	echo $tram->getFolios()."</br>";
	echo $tram->getIdsMovimientos()[0];
	$tram->estado="cambiando";
	$tram->save();
	*/




 ?>