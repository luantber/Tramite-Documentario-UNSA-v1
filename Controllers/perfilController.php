<?php namespace Controllers;
/**
* 
*/
class perfilController
{
	
	function index()
	{
		print "indice perfil";
			# code...
	}

	function barrita()
	{
		render("perfil/barrita");
		# code...
	}

	function finalizado()
	{
		render("perfil/finalizado");
		# code...
	}

	function miTramite()
	{
		render("perfil/miTramite");
		# code...
	}

	function proceso()
	{
		render("perfil/proceso");
		# code...
	}

	function rechazado()
	{
		render("perfil/rechazado");
		# code...
	}

}