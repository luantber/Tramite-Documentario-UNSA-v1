<?php namespace Models;
	/**
	* 
	*/

	use Models\Query as Query;

	class Cargo{

		static function getCargos(){
			$query=new Query();

			$request="SELECT `Id_Cargo`,`Nombre_Cargo` FROM `cargos`";

			$result=$query->consulta($request);
			$datos=array();

			if ($result->num_rows != 0) {
				
				while($d = $result->fetch_assoc()) {
				        array_push($datos,
				        	array(
				        		$d["Id_Cargo"],
				        		$d["Nombre_Cargo"]
				        	));

				    }
			    
			    return $datos;
			}
			else {
			    return false;
			}

		}
	}


?>