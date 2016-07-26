<?php 

function editar($id=0){
	logueado();
	if (empty($_POST)){
		if(Auth::getuser("Gerente") or Auth::getuserId() == $id){
			$t = new Persona;
			$t->obtenerDatosPersona($id);
			$e = new Empleado;

			if ($e->obtenerDatosId($id)){
				$ae = $e->getAllDatos();
				//print_r($ae);
				$tramite = array(
					'id' => $t->getID(), 
					'nombres'=>$t->getNombres(),
					'apellidos'=>$t->getApellidos(),
					'dni'=>$t->getDni(),
					'empresa'=>$t->getNombreEmpresa(),
					'email' => $ae["correo"],
					'id_cargo' => $ae["id_cargo"],
					'id_area' => $ae["id_area"],
					'activo' => $ae["activo"]
				);
				$a = new Area;
				$c = Cargo::getCargos();
				$at = $a->obtenerAreas();
				//print_r($at);
				Js::prints($at,true,"areas");
				Js::prints($c,true,"cargos");
				Js::prints($tramite,True);
				Js::prints(Auth::getuser("Gerente"),True,"sudo");
				render("empleados/editar");
			}
			else{
				echo "No hay un usuario con este ID:".$id;	
			}
		}
		else{
			echo "No tienes permisos para editar estop";
		}		
	}
	else{
		$e = new Empleado;
		$e->obtenerDatosId($_POST["id"]);

		$e->correo = $_POST["emaile"];
		$e->nombres = $_POST["nome"];
		$e->apellidos = $_POST["apee"];

		$e->password = $_POST["password"];

		$e->id_cargo = $_POST["cargo"];
		$e->id_area = $_POST["area"];
		$e->activo = $_POST["activo"];

		$e->save();
	}
}
 ?>
