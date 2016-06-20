<?php namespace Config;
	/**
	* @brief Clase Request que recibe un peticion Get Proporcionada por el archivo .htacces
	*
	* El archivo .htacces transforma una peticion /asdf/asd  en index.php?ruta= asdf/asd
	*/
	class Request
	{
		private $controlador;
		private $metodo;
		private $argumento;

		function __construct()
		{
			if (isset($_GET['url'])){
				/*
					Elimina todos los caracteres excepto letras, dígitos y $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=.
				*/
				$ruta = filter_input(INPUT_GET, 'url',FILTER_SANITIZE_URL);
				/*
					Separa la ruta en un arreglo
				*/	
				
				$ruta = explode("/",$ruta);

				/*
					Filtra el arreglo, elimina valores False, Null, o '', pero conserva el indice
				*/
				$ruta = array_filter($ruta);
				//print_r($ruta);

				$this->controlador = strtolower(array_shift($ruta));
				$this->metodo = strtolower(array_shift($ruta));

				if (!$this->metodo){
					$this->metodo = "index";
				}
				$this->argumento = $ruta;
			}
			else{
				if (!$this->metodo){
					$this->metodo = "index";
				}
				$this->controlador = "index";
			}
		}

		public function getControlador()
		{
			/**
			* Retorna el String Controlador
			*/
			return $this->controlador;
		}

		public function getMetodo()
		{
			/**
			* Retorna el String Metodo
			*/
			return $this->metodo;
		}

		public function getArgumento()
		{
			/**
			* Retorna el String Metodo
			*/
			return $this->argumento;
		}
	}
 ?>