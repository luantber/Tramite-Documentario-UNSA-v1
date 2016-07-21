<?php namespace Controllers;

	class errorController
	{
		function e404(){
			echo ""
			echo getSesion();
			render("error/404");
		}
	}
?>