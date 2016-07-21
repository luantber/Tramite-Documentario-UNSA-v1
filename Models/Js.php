<?php namespace Models;
	/**
	* 
	*/

	class Js
	{
		static function prints($areas,$name="data",$ver=False)
		{
			if ( $ver) echo " <br>var ".$name." =".json_encode($areas);
			echo "<script>";
			echo "var ".$name." =";
			echo json_encode($areas);

			echo ";</script>";
		}

		

	}

?>