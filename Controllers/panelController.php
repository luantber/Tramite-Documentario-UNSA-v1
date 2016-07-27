<?php namespace Controllers;

	/**
	* PErsonas Controllers
	*/
	//use Models\Persona as Persona;
	use Models\Tramite as Tramite;
	use Models\Js as Js;
	use Config\Auth as Auth;

	class panelController
	{
		function index(){
			
			logueado();			
			$t = new Tramite;

			if (Auth::getuser("Jefe de Area")){
				//echo Auth::getareaId();
				$areas = $t->getAllTramitesDatosByIdAreaActual(Auth::getareaId(),False);
				//print_r($areas);
				Js::prints($areas,true);
			}
			else if (Auth::getuser("Encargado")){
				//echo "here";
				$a = $t->getAllTramitesDatosByIdEncargado(Auth::getuserId(),False);
				Js::prints($a,true);
			}
			

			
			/*$s = getSesion("sesion1");
			if ($s){
				Js::prints($s,true,"exitoMover");
			}
			*/
			render("tramites/todos");
		}

		function recibido($id){
			if(isset($id)){
				$t = new Tramite;
				$t->obtenerDatosTramiteId($id);
				$actual = $t->recibido ;
				echo $actual;
				//echo gettype($actual);
				if ($actual == "0"){
					$t->recibido = "1";
				}
				else{
					$t->recibido = "0";
				}
				$t->save();

				$ruta = $t->getRutaIds();

				foreach ($ruta as $key) {
					$ul = $key;
				}

				echo "-->".$ul;
				$t->id_area_actual = $ul;
				$t->save();

				redirect("panel");
			}
			else{
				echo "nada recibido";			
			}
		}

		
	}