<?php

	/*
	*	Archivo de Configuracion personalizada, por Default será ignorada por Git.
	*/
	//Coloquen aquí el nombre de su carpeta base
	$nombre_carpeta = "tramitedocumentariocs";


	$ip = "localhost";

	define('URLV', 'http://'.$ip.'/'.$nombre_carpeta.'/Views/');
	define('URLM', 'http://'.$ip.'/'.$nombre_carpeta.'/');

	//define('URLV', 'http://localhost/'.$nombre_carpeta.'/Views/');
	//define('URLM', 'http://localhost/'.$nombre_carpeta.'/');

	//Datos Futuros para conexion con bases de datos
	global $server,$base_datos,$user_bd, $pass_bd;

	// Listo para red local
	
	$server = $ip;
	$base_datos = "tramite";
	$user_bd = "user";
	$pass_bd = "12345";
*/

	$server = "localhost";
	$base_datos = "tramite";
	$user_bd = "root";
	$pass_bd = "";

?>
