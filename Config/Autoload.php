<?php namespace Config;
	/**
	* Archivo para automatizar Includes
	*/
	class Autoload
	{
		
		public static function run()
		{
			/**
			* Esta funcion cargara automaticamente las clases que sean llamadas
			*/
			spl_autoload_register(function($class){
				$ruta = str_replace("\\", "/", $class).".php";
				
				require_once($ruta);
			});
		}
	}
 ?>