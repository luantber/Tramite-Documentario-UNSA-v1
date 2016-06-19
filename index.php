<?php 	

	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	define('URL', 'http://localhost/tramite/views/');

	//Carga automatica de clases
	require_once 'Config/Autoload.php';
	Config\Autoload::run();
	require_once 'Views/Template.php';
	Config\Router::run(new Config\Request());

?>
