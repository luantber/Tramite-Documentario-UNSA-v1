<?php 	


	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);

	//Deben ser rutas absolutas porque el router las va a transformar
	require_once 'config.php';
	define('URL', 'http://localhost/'.$nombre_carpeta.'/views/');
	define('URLM', 'http://localhost/'.$nombre_carpeta.'/');

	//Carga automatica de clases
	require_once 'Config/Autoload.php';
	Config\Autoload::run();
	require_once 'Views/Template.php';
	Config\Router::run(new Config\Request());

?>
