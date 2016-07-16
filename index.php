<?php


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
	
	require_once 'Views/Template.php';

	function render($view)
	{
		//echo "C?".str_replace("/", DS, $view).".php";
		require_once(ROOT . "Views" . DS . str_replace("/", DS, $view).".php");
	}

	Config\Router::run(new Config\Request());


?>
