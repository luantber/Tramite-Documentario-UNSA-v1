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
			echo Auth::getareaId();
			$areas = $t->getAllTramitesDatosByIdAreaActual(Auth::getareaId());
			Js::prints($areas,true);

			
			$s = getSesion("sesion1");
			if ($s){
				Js::prints($s,true,"exitoMover");
			}
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
				redirect("panel");
			}
			else{
				echo "nada recibido";			
			}
		}

		
	}