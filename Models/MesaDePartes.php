<?php namespace Models;

  /**
   *
   */

   use Models\Query as Query;
   use Models\Empleado as Empleado;
   use Models\Tramite as Tramite;
   use Models\Persona as Persona;

  class MesaDePartes extends Empleado
  {

    function __construct()
    {
      # code...
    }

    public function crearTramiteMesa($idPersona,$idAreaDestino,$asunto,$folios)
    {
      $tramite = new Tramite();
      $tramite -> crearTramite($idPersona,$idAreaDestino,$asunto,$folios);

    }


    public function editarTramiteMesa($Id_Tramite)
    {
      $tramite = new Tramite();
      $tramite -> obtenerDatosTramiteId($Id_Tramite);
      $tramite -> editarDatosTramite();
    }

    public function verEstadoTramiteIdExpe($Id_Expediente)
    {
      $tramite = new Tramite();
      $tramite -> obtenerDatosTramiteId($Id_Tramite);
      $tramite -> getEstado();
    }

    public function verMovimiento($Id_Tramite)
    {
      $tramite = new Tramite();
      $tramite -> obtenerDatosTramiteId($Id_Tramite);
      $tramite -> getMovimiento();
    }


    public function registrarUsuario($Nombres,$Apellidos,$Dni)
    {
      $persona = new Persona();
      $persona -> registrarPersona($Nombres,$Apellidos,$Dni);
    }
  }




 ?>
