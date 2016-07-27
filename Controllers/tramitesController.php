<?php namespace Controllers;

	use Models\Tramite as Tramite;
	use Models\Empleado as Empleado;
	use Models\Persona as Persona;
	use Models\Area as Area;
	use Config\Auth as Auth;
	use Models\Js as Js;
	use Models\MesaDePartes as Mesa;
	class tramitesController
	{
		function index(){
			/*
				Necesito getAllTRamites()
			*/ 
			$t= new Tramite();
			//print_r($t->getAllTRamitesDatos());
			Js::prints($t->getAllTRamitesDatos(),true,"data");
			//render("tramites/barraTramites");
			render("tramites/todos");
		}

		function asignar()
		{
			logueado();
			if (!empty($_POST)){
				print_r($_POST);
				echo "Asignando";
				$t = new Tramite;
				$t->obtenerDatosTramiteId($_POST["envi"]);
				$t->id_encargado = $_POST["id_empleado"];
				$t->asignado = true;
				$t->save();

				//redirect("panel",true);


			}else{

			echo "OLA KE ASE, VIOLANDO LA SEGURIDAD O KE ASE";	
			}
		}

		function mover()
		{
			logueado();
			if (!empty($_POST)){

				$t = new Tramite;
				$t->obtenerDatosTramiteId($_POST["idtramite"]);
				print_r("here".$_POST["idtramite"]."<br>");
				$t->moverTramite($_POST["destino"]);
				$datos = array($t->id_expediente,Auth::getareaId(),$_POST["destino"]);
				print_r($datos);
				$m = new Mesa;
				$m->moverTramite(...$datos);


				redirect("panel",false);


			}else{

			echo "AQUI...";	
			}
		}

		function buscar()
		{
			# code...
			//$_POST = dat,
			//bus
			//0 apellido
			//1 dni

			$t = new Tramite;
			$ar = array();
			if(!empty($_POST)){
				if($_POST["bus"]==1){
					$ar = $t->getAllTramitesDatosByNombreLike($_POST["dat"]);
					//echo "here";
				}
				else if($_POST["bus"]==0){
					$ar = $t->getAllTramitesDatosByDniPersona($_POST["dat"]);
				}
				//print_r($ar);
				Js::prints($ar,true);
				render("tramites/buscar");
				render("tramites/todos");
			}
			render("tramites/buscar");
		}

		function ver($id){
			/*
				Checkear seguridad
			*/
			logueado();
			if (isset($id)){
				$a = new Area;
				$at = $a->obtenerAreas();
				Js::prints($at,false,"areas");
					
				echo $id;
				$t = new Tramite();
				$r = $t->obtenerDatosTramiteId($id);

				if ($r){

					$tramite = $t->getAllDatos();
					Js::prints($tramite,false);
							
					$e = new Empleado();
					$jefe = false;
					if(Auth::getuser("Jefe de Area")){
						echo "Jefe de persona";
						$jefe = true;
					}
					$d = $e->getEmpleadosIdNombreByIdArea(Auth::getareaId());

					Js::prints($jefe,True,"jefe");

					$solo = array();
					foreach ($d as $dato) {
						array_push($solo, $dato[0]);
					}

					Js::prints($d,True,"empleados");
					Js::prints($solo,True,"solo");



					render("tramites/asignar");
					render("tramites/editar");
					render("tramites/responder");

				}
				else{
					JS::prints("No existe un tramite con id,".$id,"error",false);
				}
			}
			else{
				echo "No pasaste el id";
			}
			
			
			
		}

		function editar($id){
			/*
				Checkear seguridad
			*/
			if (!empty($_POST)){
				echo "CONTROLADOR EDITAR POST";
			}
			else{
				echo "Formulario prellenado para refresh";
				$t = new Tramite;
				if ($t->obtenerDatosTramiteId($id)){
					$tramite = array(
					'id' => $t->id_expediente, 
					'asunto'=>$t->getAsunto(),
					'estado'=>$t->getEstado()
					);
					Js::prints($tramite,false);
				}
				else{
					
					JS::prints("No existe un tramite con id,".$id,"error",false);
				}

			}
			render("tramites/editar");
			
		}

		function crear(){
			if (!empty($_POST)){
				
				$t = new Tramite();
				
				//registrarTramiteByDni($Folios,$Asunto,$Dni_Persona,$Id_Area_Destino,$Tipo_Tramite,$Prioridad,$Estado,$DescripcionEstado)
				echo "Destino".$_POST["destino"];

				/*if($t->registrarTramiteByDni(
				
					$_POST["asunto"],
					$_POST["ident"],
					$_POST["destino"],
					"tipo", //Tipo de tramite
					$_POST["prioridad"],
					"Pendiente",
					 //Estado: Enproceso, finalizado y rechazado
					"..."

				$_POST["asunto"],$_POST["ident"],'0',$_POST["destino"],'0','0',$_POST["prioridad"]
					)
				)*/
				if(true)		 
				{
					 //Descomentar cuando ya no haya error en tramites
					$t->registrarTramiteByDni(
						$_POST["asunto"], 
						$_POST["ident"],
						'0', //id_encard
						$_POST["destino"],
						'pendiente',
						'Normal',
						$_POST["prioridad"]
					);


					if ($_FILES["archivo"]["error"]<=0) 
			        { 
			            $ext= end(explode(".", $_FILES['archivo']['name'])); 
			            move_uploaded_file($_FILES["archivo"]["tmp_name"], ROOT."SemiFTP".DS.$t->query->get_id().".".$ext); 
			            chmod(ROOT."SemiFTP".DS.$t->query->get_id().".".$ext,0777);
			            //echo "puede que se haya subido"; 
			            

			            //echo "<br>id: ".$t->query->get_id();
			            render("tramites/exito");

			        } 
			        else  
			        { 
			            echo "Hubo un error con el archivo"; 
			        } 

					//error e
					echo " Exito Al crear el TRamite";
					//redirect("panel");
//					echo $t->getAsunto();
				}
				else{
					//Comentar cuando ya no haya error

					JS::error("HUbo un error al registrar el Tramite, probablemente no exista el DNI");
					//render("registrar/exito");
				}
			}

			else{
				$a = new Area;
				$at = $a->obtenerAreas();
				Js::prints($at,false,"areas");
				if (Auth::get_session()["nombre_cargo"]!="usuario")
					render("usuarios/crear");
				render("tramites/crear");

			}
		}

		function imprimir()
		{
			render("tramites/imprimir");
			# code...
		}

		function recibido(){
			if (!empty($_POST)){
				$idt = $POST["idtramite"];
				$r = $_POST["recibido"];

				$t = new Tramite;
				$t->recibido = $r;
				$t->save();

				redirect("panel");

			}else{
				
			echo "AQUI";	
			}

		}


     	function responder($id) 
	    { 

	    	if (isset($id))
	    	{
	    	  if (!empty($_POST)) 
		      {       
		        $camb=$_POST["cambio"]; 
		        $observaciones=$_POST["obs"]."\n"; 
		        echo "tu cambio ".$camb; 
		        echo "tus observaciones".$observaciones;
		        echo "dir: ".ROOT."SemiFTP/".$id.".odt"; 
		        if (chmod(ROOT."SemiFTP/".$id.".odt",0777)) 
		          echo "se cambio"; 
		        $f=fopen(ROOT."SemiFTP/".$id.".odt","a"); 
		        $cam="\n".$camb."\n"; 
		        fwrite($f, $cam); 
		        fwrite($f, $observaciones); 
		        fwrite($f, "Respuesta por el area de: ".Auth::get_session()["nombre_area"]); 
		        fclose($f);   
		      } 
		      else  
		      {
		        render("tramites/responder");	
		      }
	    	}
	    	else 
	    		render("tramites/todos");
		       
	    } 


		function proceso(){
			
			render("tramites/barraTramites");
			render("tramites/todos");
		}

		function finalizado(){
			render("tramites/barraTramites");
			render("tramites/todos");
		}

		function rechazado(){
			render("tramites/barraTramites");
			render("tramites/todos");
		}
	}
?>
