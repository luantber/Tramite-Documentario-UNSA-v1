<?php 
	function logueado(){
		if (!Config\Auth::exist()) redirect("empleados/ingresar");

	}
	
	function render($view)
	{
		//echo "C?".str_replace("/", DS, $view).".php";
		require_once(ROOT . "Views" . DS . str_replace("/", DS, $view).".php");
	}

	function redirect($ruta,$data="",$nameData="sesion1")
	{
		//isset($_SESSION[$nameData]
		if ($data) {
			$_SESSION[$nameData] = $data;
		}
		header("Location: ".URLM.$ruta); /* Redirect browser */
				exit();
	}

	function getSesion($nameData="session1"){
		if (isset($_SESSION[$nameData])){
			$s  = $_SESSION[$nameData];
			unset($_SESSION[$nameData]);
			return $s;
		}
		return false;
	}


 ?>
