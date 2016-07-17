<?php namespace Models;
	/**
	* 
	*/

	class Js
	{
		static function prints($areas)
		{
			echo "<script>";
			echo "var areas =";
			echo json_encode($areas);

			echo ";</script>";
		}

		

	}

?>