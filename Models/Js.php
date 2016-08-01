<?php namespace Models;
	/**
	* 
	*/

	class Js
	{
		static function prints($areas,$ver=False,$name="data")
		{
			//if ( $ver) echo " <br>var ".$name." =".json_encode($areas,JSON_UNESCAPED_UNICODE);

			echo "<script>";
			echo "var ".$name." =";
			echo json_encode($areas,JSON_UNESCAPED_UNICODE);

			echo ";</script>";
		}

		static function error($error,$ver=False)
		{
			if ( $ver) echo " <br>var error =".json_encode($error,JSON_UNESCAPED_UNICODE);
			echo "<script>";
			echo "var error =";
			echo json_encode($error,JSON_UNESCAPED_UNICODE);

			echo ";</script>";
		}

		

	}

?>