<?php 	namespace Models;
		/**
		* 	
		*/
		use Models\Query as Query;

		class Empleado
		{
			var $Query;

			var $nombre 
			public function  __construct(){
				$Query = = new Query();
			}
			
			public function ver()
			{
				echo "Funca .... ";
			}

			
		}


 ?>