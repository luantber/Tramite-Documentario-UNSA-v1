<?php namespace Models;

	class Auth
	{
		static function start()
		{
			@session_start();
		}

		static function get_session($sesion="sesion")
		{
			return $_SESSION[$sesion];
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

		static function getuser($cargo,$sesion="sesion")
		{
			if ($_SESSION[$sesion]->getNombreCargo()==$cargo)
				return true;
			return false;
		}

		static function destroy()
		{
			@session_destroy();
		}
	}

?>

