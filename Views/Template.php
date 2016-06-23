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
	<title>Trámite Documentario</title>

	<link rel="stylesheet" type="text/css" href="<?php echo URL ?>css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
</head>

<body>

	<header class="header2">
		<div class="wrapper">
			<div class="logo">
				Trámite Documentario
			</div>

			<nav>
				<a href="<?php echo URLM ?>">Inicio</a>
				<a href="<?php echo URLM ?>clientes/registrocli" >Cliente Nuevo</a>
				<a href="">nuevo </a>
				<a href="">Hello</a>
				<a href="#">Otro</a>
				<a href="#">Help</a>
			</nav>
		</div>
	</header>

	<div id="div-grande">

<?php 
		}
		public function __destruct(){
 ?>
	</div>
<p align="center" class="parrafo">By CS unsa</p>
</body>
</html>	

<?php			
		}
		
	}


 ?>
