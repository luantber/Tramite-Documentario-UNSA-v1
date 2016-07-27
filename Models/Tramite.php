<?php namespace Models;
	/**
	*
	*/

	include_once "Query.php";
	include_once "Empleado.php";
	include_once "Persona.php";
	include_once "Area.php";
	use Models\Query as Query;
	use Models\Persona as Persona; 
	use Models\Empleado as Empleado;
	use Models\Area as Area;
	class Tramite
	{
		var $id_expediente; //int
		var $fecha_ingreso; //date
		var $fecha_termino;	//date		
		var $estado;	//varchar		
		var $tipo_tramite;	//varchar
		var $asunto; //varchar
		var $prioridad;	//int supuestamente puede ser 1,2,o 3
		var $asignado;
		var $adjuntado;

		var $id_area_actual;
		var $nombre_area_actual;

		var $id_area_destino; //int
		var $nombre_area_destino;

		//Datos de la persona
		var $id_persona; 
		var $nombres_persona;
		var $apellidos_persona;
		var $dni_persona;
		var $nombre_empresa_persona;

		//Datos del encargado
		var $id_encargado;//int
		var $nombres_encargado;
		var $apellidos_encargado;
		var $dni_encargado;
		var $id_area_encargado;
		var $nombre_area_encargado;





		var $query;  //query xD
		var $fecha; // fecha actual
		

		function __construct()
		{
			# code...
			$this->query= new Query();
			$this->fecha = $this->query->getFecha();
		}

		//------------------------------------------------------REGISTRAR-------------------------------------------------

		function registrarTramite($Asunto,$Id_Persona,$Id_Encargado,$Id_Area_Destino,$Estado,$Tipo_Tramite,$Prioridad)
		{
			$request="INSERT INTO `tramites`(`Fecha_Ingreso`, `Asunto`, `Id_Persona`, `Id_Encargado`, `Id_Area_Actual`, `Id_Area_Destino`, `Estado`, `Asignado`, `Adjuntado`, `Tipo_Tramite`, `Prioridad`) VALUES ('".$this->fecha."','".$Asunto."',".$Id_Persona.",'".$Id_Encargado."',".$Id_Area_Destino.",".$Id_Area_Destino.",'".$Estado."','0','0','".$Tipo_Tramite."',".$Prioridad.")";
			//print_r($request);
			$this->query->consulta($request);
			
		}

		function registrarTramiteByDni($Asunto,$Dni_Persona,$Id_Encargado,$Id_Area_Destino,$Estado,$Tipo_Tramite,$Prioridad)
		{
			$persona=new Persona();
			$resultado=$persona->obtenerDatosPersonaByDni($Dni_Persona);
			if($resultado==true){
				$Id_Persona=$persona->id;
				$this->registrarTramite($Asunto,$Id_Persona,$Id_Encargado,$Id_Area_Destino,$Estado,$Tipo_Tramite,$Prioridad);
			}

		}

		//-------------------------------------------------OBTENCION DE DATOS EN UN OBJETO-----------------------------------------

		function obtenerDatosTramiteId($IdTramite)
		{
			$request="SELECT `Id_Expediente`, `Fecha_Ingreso`, `Fecha_Termino`, `Asunto`, `Id_Persona`, `Id_Encargado`, `Id_Area_Actual`, `Id_Area_Destino`, `Estado`, `Asignado`, `Adjuntado`, `Tipo_Tramite`, `Prioridad` FROM `tramites` WHERE Id_Expediente=".$IdTramite;
			$result=$this->query->consulta($request);
			if ($result->num_rows != 0) {
			    $datos = $result->fetch_assoc();
			    $this->id_expediente=$datos["Id_Expediente"];			    
			    $this->fecha_ingreso=$datos["Fecha_Ingreso"];
			    $this->fecha_termino=$datos["Fecha_Termino"];			    
			    $this->asunto=$datos["Asunto"];
			    $this->id_persona=$datos["Id_Persona"];
			    $this->id_encargado=$datos["Id_Encargado"];
			    $this->id_area_actual=$datos["Id_Area_Actual"];
			    $this->id_area_destino=$datos["Id_Area_Destino"];
			    $this->estado=$datos["Estado"];
			    $this->asignado=$datos["Asignado"];
			    $this->adjuntado=$datos["Adjuntado"];
			    $this->tipo_tramite=$datos["Tipo_Tramite"];
			    $this->prioridad=$datos["Prioridad"];
			    
			    $this->obtenerDatosCliente();
			    $this->obtenerDatosEncargado();
   				$this->obtenerDatosAreas();


			    return true;
			}
			else {
			    return false;
			}

		}

		function obtenerDatosAreas()
		{
			$area_actual=new Area();
			$area_actual->obtenerDatosAreaById($this->id_area_actual);
			$area_destino=new Area();
			$area_destino->obtenerDatosAreaById($this->id_area_destino);
			$this->nombre_area_actual=$area_actual->nombre_area;
			$this->nombre_area_destino=$area_destino->nombre_area;
		}


		function obtenerDatosCliente()
		{
						
			$cliente=new Persona();
			$cliente->obtenerDatosPersona($this->id_persona);
			$this->dni_persona=$cliente->dni;
			$this->nombres_persona=$cliente->nombres;
			$this->apellidos_persona=$cliente->apellidos;
			$this->nombre_empresa_persona=$cliente->nombre_empresa;
		}

		function obtenerDatosEncargado()
		{
			$encargado=new Empleado();
			$encargado->obtenerDatosId($this->id_encargado);
			$this->dni_encargado=$encargado->dni;
			$this->nombres_encargado=$encargado->nombres;
			$this->apellidos_encargado=$encargado->apellidos;
			$this->nombre_area_encargado=$encargado->nombre_area;
			$this->id_area_encargado=$encargado->id_area;
			
		}

		//---------------------------------------OPERACIONES CON EL TRAMITE---------------------------------

		public function save()
		{			
			$request="UPDATE `tramites` SET `Id_Expediente`=".$this->id_expediente.",`Fecha_Ingreso`=".$this->fecha_ingreso.",`Fecha_Termino`=".$this->fecha_termino.",`Asunto`='".$this->asunto."',`Id_Persona`=".$this->id_persona.",`Id_Encargado`=".$this->id_encargado.",`Id_Area_Actual`=".$this->id_area_actual.",`Id_Area_Destino`=".$this->id_area_destino.",`Estado`='".$this->estado."',`Asignado`=".$this->asignado.",`Adjuntado`=".$this->adjuntado.",`Tipo_Tramite`='".$this->tipo_tramite."',`Prioridad`=".$this->prioridad." WHERE Id_Expediente=".$this->id_expediente;

			$this->query->consulta($request);
			$this->obtenerDatosCliente();
			$this->obtenerDatosEncargado();
		}




		function moverTramite($Id_Area_Destino)
		{

			$request="INSERT INTO `movimientos`(`Id_Expediente`, `Id_Remitente`, `Id_Destino`, `Id_Estado`, `Id_Personas`, `Fecha`)  VALUES (".$this->id_expediente.",".$this->id_area_actual.",".$Id_Area_Destino.",".$this->id_expediente.",".$this->id_persona.",'".$this->fecha."')";
			$this->query->consulta($request);
			$this->id_area_actual=$Id_Area_Destino;
			$this->id_encargado=0;
			$this->asignado=0;
			$this->obtenerDatosEncargado();
			$this->obtenerDatosAreas();
			$this->save();
		}


		function cancelarTramite($Id_Tramite)
		{
			$this->estado="cancelado";
			$this->save();
		}


		//------------------------------------------------>GET DATOS<----------------------------------------------

		public function getAllDatos()
		{
			$datos=array();
			array_push($datos,$this->id_expediente);
			array_push($datos,$this->fecha_ingreso);
			array_push($datos,$this->fecha_termino);
			array_push($datos,$this->estado);
			array_push($datos,$this->tipo_tramite);
			array_push($datos,$this->asunto);
			array_push($datos,$this->prioridad);
			array_push($datos,$this->asignado);
			array_push($datos,$this->adjuntado);
			array_push($datos,$this->id_area_actual);
			array_push($datos,$this->nombre_area_actual);
			array_push($datos,$this->id_area_destino);
			array_push($datos,$this->nombre_area_destino);
			array_push($datos,$this->id_persona);
			array_push($datos,$this->nombres_persona);
			array_push($datos,$this->apellidos_persona);
			array_push($datos,$this->dni_persona);
			array_push($datos,$this->nombre_empresa_persona);
			array_push($datos,$this->id_encargado);
			array_push($datos,$this->apellidos_encargado);
			array_push($datos,$this->dni_encargado);
			array_push($datos,$this->id_area_encargado);
			array_push($datos,$this->nombre_area_encargado);
			return $datos;
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

		public function getAllTramitesDatosByIdEncargado($Id_Encargado,$finalizado)
		{
			if($finalizado==true){
				$request="SELECT `Id_Expediente` FROM `tramites` WHERE Id_Encargado=".$Id_Encargado." AND Estado='finalizado'";
			}
			else{
				$request="SELECT `Id_Expediente` FROM `tramites` WHERE Id_Encargado=".$Id_Encargado." AND Estado!='finalizado'";	
			}
			
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
				if($tramite_temp->estado!="cancelado")
				{
					array_push($tramitesDatos,$tramite_temp->getAllDatos());
				}


			}

			return $tramitesDatos;
		}


		function getAllTramitesDatosByDniPersona($Dni_Persona)
		{
			$persona_temp=new Persona();
			$persona_temp->obtenerDatosPersonaByDni($Dni_Persona);
			$request="SELECT `Id_Expediente` FROM `tramites` WHERE Id_Persona=".$persona_temp->id;
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
				if($tramite_temp->estado!="finalizado" && $tramite_temp->estado!="cancelado")
				{
					array_push($tramitesDatos,$tramite_temp->getAllDatos());
				}


			}

			return $tramitesDatos;
		}

		function getAllTramitesDatosByNombreLike($Nombres)
		{
			
			
			$request="SELECT `Id_Expediente` FROM tramites JOIN personas ON tramites.Id_Persona=personas.Id_Persona WHERE (Nombres LIKE '%".$Nombres."%' OR Apellidos LIKE '%".$Nombres."%')";
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
				if($tramite_temp->estado!="finalizado" && $tramite_temp->estado!="cancelado")
				{
					array_push($tramitesDatos,$tramite_temp->getAllDatos());
				}


			}

			return $tramitesDatos;
		}

		function getAllTramitesDatosByIdAreaActual($Id_Area,$finalizado)
		{
			if($finalizado==true){
				$request="SELECT `Id_Expediente` FROM `tramites` WHERE Id_Area_Actual=".$Id_Area." AND Estado='finalizado' AND Asignado!=1";
			}
			else{
				$request="SELECT `Id_Expediente` FROM `tramites` WHERE Id_Area_Actual=".$Id_Area." AND Estado!='finalizado' AND Asignado!=1";	
			}
			
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
				if($tramite_temp->estado!="cancelado")
				{
					array_push($tramitesDatos,$tramite_temp->getAllDatos());
				}


			}

			return $tramitesDatos;
		}


		///////////////////////////------------------------------>MOVIMIENTOS<-------------------------------------------------


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



		


		function getRutaIds()
		{
			$request="SELECT `Id_Movimiento`, `Id_Remitente`, `Id_Destino` FROM `movimientos` WHERE Id_Expediente=".$this->id_expediente;
			$result=$this->query->consulta($request);
			$idsRuta=array();
			$destino="";
			if($result->num_rows==0)
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
				if($this->adjuntado==1)
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

	



	}

 ?>



<?php
	/*
	$cosa= new Tramite();
	//$cosa->registrarTramite("mas pruebas",4,6,2,"pendiente","no se",3);
	$cosa->obtenerDatosTramiteId(17);
	$cosas=$cosa->getRutaNombres();
	foreach ($cosas as $key) {
		echo $key."</br>";
	}
	*/
	/*
	$cosa=new Tramite();
	$cosas=$cosa->getAllTramitesDatosByIdAreaActual(1,false);
	foreach ($cosas as $key ) {
		foreach ($key as  $value) {
			echo $value." ";
		}
		echo "</br>";
	}
	*/
	


 ?>
