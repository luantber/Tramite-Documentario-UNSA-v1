<?php


	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);

	//Deben ser rutas absolutas porque el router las va a transformar
	require_once 'config.php';
	define('URLV', 'http://localhost/'.$nombre_carpeta.'/Views/');
	define('URLM', 'http://localhost/'.$nombre_carpeta.'/');
/*
	define('server', $server );
	define('base_datos', $base_datos);
	define('user_bd',$user_bd );
	define('pass_bd', $pass_bd );
*/
	//Carga automatica de clases
	require_once 'Config/Autoload.php';
	Config\Autoload::run();
	
	require_once 'Views/Template.php';
	Config\Router::run(new Config\Request());


?>
