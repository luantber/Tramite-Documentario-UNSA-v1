<?php namespace Config;
	
	/**
	* Enrutador 
	*/
	class Router
	{
				
		public static function run(Request $request)
		{
			$controlador = $request->getControlador() . "Controller";
			$ruta = ROOT . "Controllers" . DS . $controlador . ".php";
			$metodo = $request->getMetodo();
			$argumento = $request->getArgumento();
			
			print "<br> Controlador: " . $ruta;
			if (is_readable($ruta)){
				require_once $ruta;
				$cont = "Controllers\\". $controlador;
				//print $cont . "<br>";
				$controlador = new $cont;
				//echo  $metodo;
				//print_r($argumento);
				if(!isset($argumento)){
					call_user_func(array($controlador,$metodo));
				}
				else{
					call_user_func_array(array($controlador,$metodo),$argumento);
				}
			}
			else
			{
				print "<br> Advertencia_NO_GRAVE: No se encontro una Controlador para la ruta: ". $ruta." , ignorar si no estas cargando algun controlador.";
			}

			// Ahora sera MANUAL
			/*
			$ruta = ROOT . "Views" . DS . $request->getControlador() . DS . $metodo . ".php";
			if(is_readable($ruta)){
				print "<br> View: ". $ruta;
				require_once $ruta;
			}
			else{
				print "<br> No se encontro una vista para la ruta: ". $ruta;
			}*/
			
		}
	}
	
 ?>