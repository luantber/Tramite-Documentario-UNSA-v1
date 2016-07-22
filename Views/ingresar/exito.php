<?php
	use Config\Auth as Auth;


	echo "<h2>Exito al ingresar!!, Bienvenido ".Auth::get_session()[0]." eres ".Auth::get_session()[1]." </h2>";
?>



