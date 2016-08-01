<?php

	ob_start(); //Redirects
	session_start(); //Sesiones

	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);

	
	define('VIEW', ROOT . "Views" . DS);

	//Deben ser rutas absolutas porque el router las va a transformar
	require_once 'config.php';
	define('ASD', "192.168.43.81/tramitedocumentariocs/");
	
	//Carga automatica de clases
	require_once 'Config/Autoload.php';
	Config\Autoload::run();

	//HELpers
	require_once 'Config/Helpers.php';
	//Auth
	require_once 'Config/Auth.php';
	
	require_once 'Views/Template.php';



	Config\Router::run(new Config\Request());


?>
