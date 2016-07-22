<?php namespace Models;
	/**
	*
	*/

	include_once "Query.php";
	include_once "Empleado.php";
	include_once "Area.php";
	use Models\Query as Query;
	use Models\Persona as Persona;
	use Models\Area as Area;
	class Tramite
	{
		var $id_expediente; //int
		var $folios;  //int
		var $fecha_ingreso; //date
		var $fecha_termino;	//date
		var $asunto; //varchar
		var $id_persona; //int
		var $id_area_destino; //int
		var $estado;	//varchar
		var $descripcionEstado;	//string
		var $query;  //query xD
		var $tipo_tramite;	//varchar
		var $prioridad;	//int supuestamente puede ser 1,2,o 3
		var $id_encargado;//int
		var $recibido;//1 o 0
		var $id_area_actual;
		var $fecha; // fecha actual
		function __construct()
		{
			# code...
			$this->query= new Query();
			$this->fecha = $this->query->getFecha();
		}


		function obtenerDatosTramiteId($IdTramite)
		{
			$request="SELECT `Id_Expediente`, `Folios`, `Fecha_Ingreso`, `Fecha_Termino`, `Asunto`, `Id_Persona`,`Id_Area_Destino`, `Id_Encargado`,`Recibido`, `Id_Area_Actual` FROM `tramites` WHERE Id_Expediente=".$IdTramite;
			
			$result=$this->query->consulta($request);
				print_r($result);
				if ($result->num_rows != 0) {
			echo "here";
				    $datos = $result->fetch_assoc();

				    $p = new Persona();
				    $p->obtenerDatosPersona($datos["Id_Persona"]);
				    $this->id_persona=$p->getNombres().$p->getApellidos();


				    $this->folios=$datos["Folios"];
				    $this->fecha_termino=$datos["Fecha_Termino"];
				    $this->fecha_ingreso=$datos["Fecha_Ingreso"];
				    $this->asunto=$datos["Asunto"];
				    $this->id_expediente=$datos["Id_Expediente"];

					$p2 = new Persona();
				    $p2->obtenerDatosPersona($datos["Id_Encargado"]);
				   $this->id_encargado=$p2->getNombres().$p2->getApellidos();

				   $a = new Area();
				   $a->obtenerDatosAreaById($datos["Id_Area_Destino"]);

				   	$this->id_area_destino = $a->getNombreArea();

				    $this->recibido=$datos["Recibido"];


				   $a2 = new Area();
				   $a2->obtenerDatosAreaById($datos["Id_Area_Actual"]);
				    $this->id_area_actual=$a2->getNombreArea();

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

			$request="INSERT INTO `tramites`(`Folios`, `Fecha_Ingreso`, `Asunto`, `Id_Persona`,`Id_Area_Actual`) VALUES (".$Folios.",'".$this->fecha."','".$Asunto."',".$Id_Persona.",'1')";
			$this->query->consulta($request);
			$tramite_id=$this->query->get_id();
			$request2="INSERT INTO `tipo_tramite`(`Id_Expediente`, `Tipo_Tramite`, `Prioridad`) VALUES (".$tramite_id.",'".$Tipo_Tramite."',".$Prioridad.")";
			$this->query->consulta($request2);
			$request3="INSERT INTO `estado`(`Id_Expediente`, `Estado`, `Descripcion`) VALUES (".$tramite_id.",'".$Estado."','".$DescripcionEstado."')";
			$this->query->consulta($request3);

			$request4="INSERT INTO `movimientos`(`Id_Expediente`, `Id_Remitente`, `Id_Destino`, `Id_Estado`, `Fecha`,`Id_Personas`) VALUES (".$tramite_id.",'0','1',".$tramite_id.",'".$this->fecha."',".$Id_Persona.")";
				$this->query->consulta($request4);

			$request5="INSERT INTO `movimientos`(`Id_Expediente`, `Id_Remitente`, `Id_Destino`, `Id_Estado`, `Fecha`,`Id_Personas`) VALUES (".$tramite_id.",'1',".$Id_Area_Destino.",".$tramite_id.",'".$this->fecha."',".$Id_Persona.")";
			$this->query->consulta($request5);


		}


		function registrarTramiteByDni($Folios,$Asunto,$Dni_Persona,$Id_Area_Destino,$Tipo_Tramite,$Prioridad,$Estado,$DescripcionEstado)
		{
			$persona=new Persona();
			$resultado=$persona->obtenerDatosPersonaByDni($Dni_Persona);

			if($resultado==true){
				$Id_Persona=$persona->getId();


				$request="INSERT INTO
				`tramites`
				(`Folios`,
				 `Fecha_Ingreso`,
				 `Asunto`,
				 `Id_Persona`,
				  `Id_Area_Actual`,
				  `Id_Area_Destino`
				  )

				  VALUES (".$Folios.",'".$this->fecha."','".$Asunto."',".$Id_Persona.",1,".$Id_Area_Destino.")";


				$this->query->consulta($request);

				$tramite_id=$this->query->get_id();
				$request2="INSERT INTO `tipo_tramite`(`Id_Expediente`, `Tipo_Tramite`, `Prioridad`) VALUES (".$tramite_id.",'".$Tipo_Tramite."',".$Prioridad.")";
				$this->query->consulta($request2);
				$request3="INSERT INTO `estado`(`Id_Expediente`, `Estado`, `Descripcion`) VALUES (".$tramite_id.",'".$Estado."','".$DescripcionEstado."')";
				$this->query->consulta($request3);

				$request4="INSERT INTO `movimientos`(`Id_Expediente`, `Id_Remitente`, `Id_Destino`, `Id_Estado`, `Fecha`,`Id_Personas`) VALUES (".$tramite_id.",'0','1',".$tramite_id.",'".$this->fecha."',".$Id_Persona.")";
				$this->query->consulta($request4);

				$request5="INSERT INTO `movimientos`(`Id_Expediente`, `Id_Remitente`, `Id_Destino`, `Id_Estado`, `Fecha`,`Id_Personas`) VALUES (".$tramite_id.",'1',".$Id_Area_Destino.",".$tramite_id.",'".$this->fecha."',".$Id_Persona.")";
				$this->query->consulta($request5);


				$this->obtenerDatosTramiteId($tramite_id);
				return true;
			}
			else{
				return false;
			}

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

		function moverTramite($Id_Area_Destino)
		{

			$request="INSERT INTO `movimientos`(`Id_Expediente`, `Id_Remitente`, `Id_Destino`, `Id_Estado`, `Id_Personas`, `Fecha`)  VALUES (".$this->id_expediente.",".$this->id_area_actual.",".$Id_Area_Destino.",".$this->id_expediente.",".$this->id_persona.",'2016-06-20')";
			$this->query->consulta($request);
			$this->estado=0;
			$this->save();
		}

		function getRutaIds()
		{
			$request="SELECT `Id_Movimiento`, `Id_Remitente`, `Id_Destino` FROM `movimientos` WHERE Id_Expediente=".$this->id_expediente;
			$result=$this->query->consulta($request);
			$idsRuta=array();
			$destino="";
			if($result->num_rows==2)
			{
				array_push($idsRuta,$this->id_area_actual);
			}
			else
			{
				while ($datos = $result->fetch_assoc()) {
					if($datos["Id_Remitente"]!=0){
						array_push($idsRuta,$datos["Id_Remitente"]);
						$destino=$datos["Id_Destino"];
					}

				}
				if($this->recibido==1)
				{
					array_push($idsRuta,$destino);
				}

			}

			return $idsRuta;

		}

		function getRutaNombres()
		{
			$idsRutas=$this->getRutaIds();
			$idsRutasNombres=array();
			foreach($idsRutas as $idRuta) {
				$area_temp=new Area();
				$area_temp->obtenerDatosAreaById($idRuta);
				array_push($idsRutasNombres,$area_temp->getNombreArea());
			}
			return $idsRutasNombres;
		}

		function getAllTramitesDatos()
		{
			$request="SELECT `Id_Expediente` FROM `tramites` WHERE 1";
			$result=$this->query->consulta($request);
			$tramitesIds=array();
			$tramitesDatos=array();
			if ($result->num_rows > 0) {

			    while($datos = $result->fetch_assoc()) {

			        array_push($tramitesIds,$datos["Id_Expediente"]);
			    }
			}

			foreach ($tramitesIds as $id_tramite) {

				$tramite_temp=new Tramite();
				$tramite_temp->obtenerDatosTramiteId($id_tramite);
				array_push($tramitesDatos,$tramite_temp->getAllDatos());

			}

			return $tramitesDatos;
		}


		function getAllTramitesDatosByIdAreaActual($Id_Area)
		{
			$request="SELECT `Id_Expediente` FROM `tramites` WHERE Id_Area_Actual=".$Id_Area;
			$result=$this->query->consulta($request);
			$tramitesIds=array();
			$tramitesDatos=array();
			if ($result->num_rows > 0) {

			    while($datos = $result->fetch_assoc()) {

			        array_push($tramitesIds,$datos["Id_Expediente"]);
			    }
			}

			foreach ($tramitesIds as $id_tramite) {

				$tramite_temp=new Tramite();
				$tramite_temp->obtenerDatosTramiteId($id_tramite);
				if($tramite_temp->estado!="finalizado")
				{
					array_push($tramitesDatos,$tramite_temp->getAllDatos());
				}


			}

			return $tramitesDatos;
		}

		function getAllTramitesDatosByIdAreaDestino($Id_Area_Destino)
		{
			//por implementar
			//$rutasIds=$this->getRutaIds();

		}

		function getFolios()
		{
			return $this->folios;
		}

		function getRecibido()
		{
			return $this->recibido;
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
			//return $this->id_area_destino;
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

		public function getIdEncargado()
		{
			return $this->id_encargado;
		}

		public function getAreaActual()
		{
			return $this->id_area_actual;
		}
		//devuelve todos los datos como un array
		public function getAllDatos()
		{
			$datos=array();
			array_push($datos,$this->id_expediente);
			array_push($datos,$this->folios);
			array_push($datos,$this->fecha_ingreso);
			array_push($datos,$this->fecha_termino);
			array_push($datos,$this->asunto);
			array_push($datos,$this->id_persona);
			array_push($datos,$this->tipo_tramite);
			array_push($datos,$this->prioridad);
			array_push($datos,$this->estado);
			array_push($datos,$this->descripcionEstado);
			array_push($datos,$this->id_encargado);
			array_push($datos,$this->recibido);
			return $datos;
		}

		//------------------------------------funciones para editar
		//

		public function editarIdAreaActual()
		{
		  $request="UPDATE `tramites` SET `Id_Area_Actual`=".$this->id_area_actual." WHERE Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
		}

		public function editarRecibido()
	    {
	      $request="UPDATE `tramites` SET `Recibido`=".$this->recibido." WHERE Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
	    }
		public function editarEncargado()
	    {
	      $request="UPDATE `tramites` SET `Id_Encargado`=".$this->id_encargado." WHERE Id_Expediente=".$this->id_expediente;
	      $this->query->consulta($request);
	    }


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
	      //$request="UPDATE `tramites` SET `Id_Area_Destino`=".$this->id_area_destino." WHERE Id_Expediente=".$this->id_expediente;
	      //$this->query->consulta($request);
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
			//$this->editarIdAreaDestino();
			$this->editarTipoTramite();
			$this->editarTramitePrioridad();
			$this->editarEstado();
			$this->editarDescripcionEstado();
			$this->editarEncargado();
			$this->editarRecibido();
			$this->editarIdAreaActual();

		}



	}

 ?>



<?php

	//$tram=new Tramite();
	//$tram->obtenerDatosTramiteId(9);
	//$tram->moverTramite(2);
/*
	$tram=new Tramite();
	$tram->registrarTramite(41,"mas testing",18,3,"con fe funciona",1,"pendiente","en redireccionamiento");


*/








 ?>
