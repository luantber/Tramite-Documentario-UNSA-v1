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
   use Models\Persona as Persona;
   

  class MesaDePartes extends Empleado
  {
    var $idLastTramite;
    var $query;
    function __construct()
    {
      $this->query=new Query();
    }

    public function crearTramite($Folios,$Asunto,$Id_Persona,$Id_Area_Destino,$Tipo_Tramite,$Prioridad,$Estado,$DescripcionEstado)
    {
      $tramite = new Tramite();
      $tramite -> registrarTramite($Folios,$Asunto,$Id_Persona,$Id_Area_Destino,$Tipo_Tramite,$Prioridad,$Estado,$DescripcionEstado);
      $this->idLastTramite=$tramite->getIdExpediente();
    }


    public function editarTramiteMesa($Id_Tramite)
    {
      $tramite = new Tramite();
      $tramite -> obtenerDatosTramiteId($Id_Tramite);
      $tramite -> editarDatosTramite();
    }

    public function editarFoliosById($Id_Tramite,$Folios)
    {
      $request="UPDATE `tramites` SET `Folios`=".$Folios." WHERE Id_Expediente=".$Id_Tramite;
    }

    public function editarFechaIngresoById($Id_Tramite,$Fecha_Ingreso)
    {
      $request="UPDATE `tramites` SET `Fecha_Ingreso`=".$Fecha_Ingreso." WHERE Id_Expediente=".$Id_Tramite;
    }  


    public function editarFechaTerminoById($Id_Tramite,$Fecha_Termino)
    {
      $request="UPDATE `tramites` SET `Fecha_Termino`=".$Fecha_Termino." WHERE Id_Expediente=".$Id_Tramite;
    }

    public function editarAsunto($Id_Tramite,$Asunto)
    {
      $request="UPDATE `tramites` SET `Asunto`='".$Asunto."' WHERE Id_Expediente=".$Id_Tramite;
    }

    public function editarIdPersonaById($Id_Tramite,$Id_Persona)
    {
      $request="UPDATE `tramites` SET `Id_Persona`=".$Id_Persona." WHERE Id_Expediente=".$Id_Tramite;
    }

    public function editarFechaTerminoById($Id_Tramite,$Id_Area_Destino)
    {
      $request="UPDATE `tramites` SET `Id_Area_Destino`=".$Id_Area_Destino." WHERE Id_Expediente=".$Id_Tramite;
    }

    public function editarTipoTramiteById($Id_Tramite,$Tipo_Tramite)
    {
      $request="UPDATE `tipo_tramite` SET `Tipo_Tramite`='".$Tipo_Tramite."' WHERE  Id_Expediente=".$Id_Tramite;
    }

    public function editarTramitePrioridadById($Id_Tramite,$Prioridad)
    {
      $request="UPDATE `tipo_tramite` SET `Prioridad`='".$Prioridad."' WHERE  Id_Expediente=".$Id_Tramite;
    }

    public function verEstadoTramiteIdExpe($Id_Expediente)
    {
      $tramite = new Tramite();
      $tramite -> obtenerDatosTramiteId($Id_Tramite);
      $tramite -> getEstado();
    }

    function getListIdMovimientos($Id_Expediente)
    {
      $tramite=new Tramite();
      $tramite->obtenerDatosTramiteId($Id_Expediente);
      return $tramite->getIdMovimientos();
    }


    function getMovimientoDatos($IdMovimiento)
    {
      $request="SELECT `Id_Movimiento`, `Id_Expediente`, `Id_Remitente`, `Id_Destino`, `Id_Estado`, `Id_Personas`, `Fecha` FROM `movimientos` WHERE Id_Movimiento=".$IdMovimiento;
      $result=$this->query->consulta($request);
      
      if($result->num_rows>0){
        $data=$result->fetch_assoc();
        $datos=array("idMovimiento" => $data["Id_Movimiento"],"idExpediente" => $data["Id_Expediente"],"idRemitente" => $data["Id_Remitente"],"idDestino" => $data["Id_Destino"],"idEstado" => $data["Id_Estado"],"idPersona" => $data["Id_Personas"],"fecha" => $data["Fecha"]);
        
      }
      return $datos;
    }

    /*   
    public function registrarUsuario($Nombres,$Apellidos,$Dni)
    {
      $persona = new Persona();
      $persona -> registrarPersona($Nombres,$Apellidos,$Dni);
    }
    */
    public function getIdLastTramite()
    {
      return $this->idLastTramite;
    }

  }




 ?>

<?php
  /* 
  $mesa=new MesaDePartes();
  $ids=$mesa->getListIdMovimientos(8)[0];
  echo $mesa->getMovimientoDatos($ids)["idDestino"];
  */
 ?>
