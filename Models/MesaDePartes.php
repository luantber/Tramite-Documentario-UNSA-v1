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

    function __construct(argument)
    {
      # code...
    }

    public function crearTramiteMesa($Id_Persona)
    {
      $tramite = new Tramite();

    }


    public function editarTramiteMesa($Id_Tramite)
    {

    }

    public function verEstadoTramiteIdExpe($Id_Expediente)
    {

    }

    public function verEstadoTramiteDNI($Dni)
    {

    }

    public function registrarUsuario($Nombres,$Apellidos,$Dni)
    {
      $persona = new Persona();
      $persona -> registrarPersona($Nombres,$Apellidos,$Dni);
    }
  }




 ?>
