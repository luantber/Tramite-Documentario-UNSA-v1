<?php namespace Models;
    /**
     *
     */
    include_once "Include.php";
    use Models\Query as Query;
    class Usuario
    {
      var $nombre;
      var $apellido;
      var $dni;
      var $email;
      var $genero;
      var $contraseña;
      var $fecha_registro;

      function __construct($nombre,$apellido,$dni,$email,$genero,$fecha_registro)
      {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->dni=$dni;
        $this->email=$email;
        $this->genero=$genero;
        $this->fecha_registro=$fecha_registro;
      }
      
      function registrar($servername, $username, $password, $dbname){
        $query= new query($servername, $username, $password, $dbname);
        $query->make_query("INSERT INTO usuarios (Nombre,Apellido, DNI, Email, Sexo, Fecha_registro) VALUES ('".$this->nombre."','".$this->apellido."','".$this->dni."','".$this->email."','1','2016-06-20')");
      }

    }
    $que=new Query();
    echo $que->dbname;
 ?>

 <?php 

    
 ?>
