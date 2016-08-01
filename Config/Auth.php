<?php namespace Config;

	class Auth
	{
		//nombres,cargo,id_area
		static function start()
		{
			@session_start();
		}



		static function get_session($sesion="sesion")
		{
			return $_SESSION[$sesion];
		}

		static function is_empleado($sesion="sesion")
		{
			if (isset($_SESSION[$sesion]["correo"])){
				return true;
			}
			else{
				return false;
			}

		}

		static function exist($sesion="sesion")
		{
			if (isset($_SESSION[$sesion]))
				return true;
			return false;
		}	

		static function set_session($obj,$ses="sesion")
		{
			$_SESSION[$ses]=$obj;
		}


		static function getuser($cargo,$ses="sesion")
		{
			if ($_SESSION[$ses]["nombre_cargo"]==$cargo)
				return true;
			return false;
		}

		static function getusername($ses="sesion")
		{
			return $_SESSION[$ses]["nombres"];
				
		}		

		static function getareaId($ses="sesion")
		{
			return $_SESSION[$ses]["id_area"];
		}

		static function getdato($dato,$ses="sesion")
		{
			return $_SESSION[$ses][$dato];
		}
		

		static function getuserId($ses="sesion")
		{
			return $_SESSION[$ses]["id"];
		}

		static function revisarArea($area,$ses="sesion")
		{
			if ($_SESSION[$ses]["nombre_cargo"]==$area)
				return true;
			return false;
		}

		static function getCargo(){
			return $_SESSION[$ses]["nombre_cargo"];
		}

		static function destroy()
		{
			@session_destroy();
		}

		static function getDni($ses="sesion"){
			return $_SESSION[$ses]["dni"];
		}
	}

?>

