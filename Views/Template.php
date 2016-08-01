<?php namespace Views;

  use Config\Auth as Auth;



  //Auth::get_session()->getNombres();
  //echo Auth::get_session("prueba");
	$template = new Template();


	/**
	* Clase para Plantilla
	*/
  //use Models\Js as Js;

	class Template
	{

		public function  __construct()
		{
      //Js::prints("heyy",True);
      //Auth::get_session()->getNombres();
    /*
    if (Auth::get_session()[1]=="Jefe de Area")
      echo "Cargo: bien";
    else
      echo "No igual";
  */
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Trámite Documentario</title>
	<script type="text/javascript" src="<?php echo URLV ?>js/jquery-1.9.1.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo URLV ?>css/fileinput.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URLV ?>css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo URLV ?>css/alertify.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URLV ?>css/default.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URLV ?>css/semantic.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo URLV ?>css/alertify.rtl.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLV ?>css/default.rtl.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLV ?>css/semantic.rtl.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLV ?>css/bootstrap.rtl.mincss">

<script src="{PATH}/alertify.min.js"></script>
  <script type="text/javascript" src="<?php echo URLV ?>js/fileinput.min.js"></script> 
  <script type="text/javascript" src="<?php echo URLV ?>js/esinputfile.js"></script>
	<script type="text/javascript" src="<?php echo URLV ?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo URLV ?>js/alertify.min.js" ></script>


<!-- include the style -->
<link rel="stylesheet" href="{PATH}/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="{PATH}/themes/default.min.css" />


</head>

<body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<!-- BARRA DE NAVEGACION !!!!-->
<style type="text/css">
  nav.navbar {
    background-color: #2C3E50;
}
nav.navbar {
    @font-family-monospace:   Menlo, Monaco, Consolas, "Courier New", monospace;
}
</style>
	<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo URLM ?>">Trámite Documentario</a>
    </div>
    <ul class="nav navbar-nav active">
   <?php
    if (Auth::exist())
    {                                    ?>
      <li><a href="<?php echo URLM ?>movimientos">Movimientos</a></li>
    <?php

     if (Auth::getuser("Mesa de Partes"))
      {                         ?>

      <!-- PARA USUARIOS !-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="">Acciones Usuarios
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo URLM ?>usuarios/crear">Registrar</a></li>
          <li><a href="<?php echo URLM ?>usuarios/buscar">Buscar</a></li>
          <li><a href="<?php echo URLM ?>usuarios">Todos</a></li>
        </ul>
      </li> <!-- AQUI TERMINA ... !-->
    <?php
      }

      if (Auth::getuser("Jefe de Area"))
      {                     ?>

      <?php
      }                 ?>

      <!-- TRÁMITES !-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Trámites
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="<?php echo URLM ?>panel">Panel/Cola</a></li>
          <li><a href="<?php echo URLM ?>tramites/crear">Nuevo</a></li>
          <li><a href="<?php echo URLM ?>tramites/buscar">Buscar</a></li>
          <li><a href="<?php echo URLM ?>tramites/responder">Responder</a></li>


        </ul>
      </li> <!-- AQUI TERMINA ... !-->

      <?php

      if (Auth::getuser("Gerente"))
      {                       ?>
      <!-- PARA SUPER USUARIO !-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">AccionesSU
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo URLM ?>empleados/crear">Registrar Empleado</a></li>
          <li><a href="<?php echo URLM ?>personas">Todas personas</a></li>
          <li><a href="<?php echo URLM ?>empleados">Todos Empleados</a></li>
          <li><a href="<?php echo URLM ?>estadistica">Estadisticas</a></li>
          <li><a href="<?php echo URLM ?>tramites">Todos Trámites</a></li>
        </ul>
      </li> <!-- AQUI TERMINA ... !-->

      <!-- PARA AREAS !-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Areas
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo URLM ?>areas/crear">Crear</a></li>
          <li><a href="<?php echo URLM ?>areas">Todos</a></li>
        </ul>
      </li> <!-- AQUI TERMINA ... !-->
      <?php
      }
    }
      if(Auth::exist())
      {
        ?>


       </ul>
    <ul class="nav navbar-nav navbar-right">

         <!--Cargo -->
      <li class="active"><a href="#"><span class="glyphicon glyphicon-briefcase"></span> <?php echo Auth::get_session()["nombre_area"]."/".Auth::get_session()["nombre_cargo"]?></a></li>
    <!--PERFIL !-->
      <li><a href="<?php echo URLM ?>perfil"><span class="glyphicon glyphicon-user"></span><?php echo Auth::get_session()["nombres"] ?></a></li>
<!--
      <li><a href="<?php echo URLM ?>perfil"><span class="glyphicon glyphicon-user"></span> <?php echo Auth::getusername();
        ?></a></li>  -->

      <!--SALIR!-->
      <li><a href="<?php echo URLM ?>tutorial"><span class="glyphicon glyphicon-question-sign" ></span> Tutorial</a></li>
      <li><a href="<?php echo URLM ?>empleados/salir"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
    </ul>
    <?php
    }

    else
    {
    ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--INGRESAR!-->
        <li><a href="<?php echo URLM ?>tutorial"><span class="glyphicon glyphicon-question-sign" ></span> Tutorial</a></li>
        <!--INGRESAR!-->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-log-in"></span> Ingresar</a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo URLM ?>empleados/ingresar">Empleado</a></li>
            <li><a href="<?php echo URLM ?>usuarios/ingresar">Usuario</a></li>
            
        </li> <!-- AQUI TERMINA ... !-->
        </ul>
      </ul>
    <?php
    }

     ?>
  </div>
</nav>
          <!-- ..............FIN BARRA DE NAVEGACION !!!......................!-->

<div>

<br><br>
<br><br>
	<?php
		}
		public function __destruct(){
 ?>
</div>



						<!-- ..............TÍTULO  !!!!.......................-->
<div class="jumbotron text-center  ">
  <h3>TRÁMITE DOCUMENTARIO</h3>
  <p> ¡ Bienvenidos !</p>
</div>

						<!-- ..............TÍTULO !!!!.......................-->



	</div>
<p align="center" class="parrafo">By CS unsa <span class="glyphicon glyphicon-copyright-mark"></span> Todos Los Derechos Reservados</p>
</body>
</html>

<?php
		}

	}


 ?>
