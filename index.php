<?php

	ob_start(); //Redirects
	session_start(); //Sesiones

	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	//define('VIEW', ROOT . "Views" . DS);

	//Deben ser rutas absolutas porque el router las va a transformar
	require_once 'config.php';
	
	define('URLV', 'http://localhost/'.$nombre_carpeta.'/Views/');
	define('URLM', 'http://localhost/'.$nombre_carpeta.'/');

	//Carga automatica de clases
	require_once 'Config/Autoload.php';
	Config\Autoload::run();

	//HELpers
	require_once 'Config/Helpers.php';
	
	require_once 'Views/Template.php';



	Config\Router::run(new Config\Request());


?>
