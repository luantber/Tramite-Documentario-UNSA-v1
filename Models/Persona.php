<?php 	namespace Models;
		/**
		* 	
		*/
		use Models\Query as Query;

		class Persona
		{
			var $query;

			var $id;

			var $dni;
			var $nombre;
			var $apellido;


			function  __construct(){
				$query =  new Query();
			}

			public function getPersona($id)
			{
				$con = "SELECT * FROM PERSONAS WHERE Id_Persona =".$id;
				print $con;
				$this->query->consulta($con);
			}
			

			
		}
	
 ?>