<!DOCTYPE html>
<html>
<head>
	<title>Tramite Documentario</title>
</head>
<body>
<h1>	Hello World¡</h1>

<?php 	
	//Carga automatica de clases
	require_once 'Config/Autoload.php';
	Config\Autoload::run();

	$e = new Models\Empleado;
	$e->ver();
	
?>

</body>
</html>