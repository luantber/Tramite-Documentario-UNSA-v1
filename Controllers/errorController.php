<?php namespace Controllers;

	class errorController
	{
		function e404(){
			echo getSesion();
			render("error/404");
		}
	}
?>