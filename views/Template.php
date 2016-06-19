<?php namespace Views;

	$template = new Template();
	/**
	* Clase para Plantilla
	*/
	class Template
	{
		
		public function __construct()
		{
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario</title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL ?>css/main.css">
	<!--<link rel="stylesheet" type="text/css" href="<?php echo URL ?>css/registrar.css">-->
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
</head>

<body>
	<nav>
		<a href="<?php echo URLM ?>registrar/index" class="espacio-derecha">Cliente Nuevo</a>
	</nav>

<?php 
		}
		public function __destruct(){
 ?>

<p align="center" class="parrafo">By CS unsa</p>
</body>
</html>	

<?php			
		}
		
	}


 ?>