<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<title>Tramite Documentario</title>
</head>
<body>
<h1>	Hello World! </h1>

	<?php
		include "Include.php";
		echo "<h2>Si ves esto ... funciona tu PHP</h2>";
		echo "<h2> Sistema SI </h2>";
		$prub = new Empleado;
		$prub -> _Empleado();
	?>
</body>
</html>
=======
<?php 	


	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);

	//Deben ser rutas absolutas porque el router las va a transformar
	require_once 'config.php';
	define('URL', 'http://localhost/'.$nombre_carpeta.'/Views/');
	define('URLM', 'http://localhost/'.$nombre_carpeta.'/');

	//Carga automatica de clases
	require_once 'Config/Autoload.php';
	Config\Autoload::run();
	require_once 'Views/Template.php';
	Config\Router::run(new Config\Request());

?>
>>>>>>> origin/master
