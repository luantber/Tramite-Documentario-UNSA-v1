<?php namespace Models;
	/**
	* 
	*/
	include_once "Include.php";
    use Models\Query as Query;
	class Registrador
	{
		var $query;
		function __construct()
		{
			$this->query=new Query();
		}

		function registrar_persona($Nombres,$Apellidos,$Dni)
		{
			
			$request="INSERT INTO `personas`(`Dni`, `Nombres`, `Apellidos`) VALUES (".$Dni.",'".$Nombres."','".$Apellidos."')";
			$this->query->consulta($request);
		}

		function registrar_area($Nombre)
		{
			$request="INSERT INTO `area`(`Nom_Area`) VALUES ('".$nombre."')";
			$this->query->consulta($request);
			
		}

		function crear_cargo($Nombre_Cargo,$Descripcion){
			$request="INSERT INTO `cargos`(`Nombre_Cargo`, `Descripcion`) VALUES ('".$Nombre_Cargo."','".$Descripcion."')";
			$this->query->consulta($request);
		}

		function registrar_empleado($Nombres,$Apellidos,$Id_Area,$Activo,$Correo,$Dni_Empleado,$Password)
		{
			$request2="INSERT INTO `personas`(`Dni`, `Nombres`, `Apellidos`) VALUES (".$Dni_Empleado.",'".$Nombres."','".$Apellidos."')";
			$this->query->consulta($request2);
			$id=$this->query->get_id();
			$request="INSERT INTO `empleados`(`Id_Empleado`,`Id_Cargo`, `Id_Area`, `Activo`, `Correo`,`Dni_Empleado`, `Password`) VALUES (".$id.",4,".$Id_Area.",'".$Activo."','".$Correo."',".$Dni_Empleado.",'".$Password."')";
			$this->query->consulta($request);
		}

		function cambiar_cargo($Id_Empleado,$Id_Cargo)
		{

			$request="UPDATE `empleados` SET `Id_Cargo`=".$Id_Cargo." WHERE Id_Empleado=".$Id_Empleado;
			$this->query->consulta($request);
		}





		/*
		function registrar_empleado($Id_Persona,$Dni,$Nombres,$Apellidos)
		{
			
			$request1="INSERT INTO `personas`(`Id_Persona`, `Dni`, `Nombres`, `Apellidos`) VALUES (".$Id_Persona.",".$Dni.",'".$Nombres."','".$Apellidos."')";		
			$this->query->consulta($request);
			
			$request2="INSERT INTO `empleados`(`Id_Empleado`, `Cargo`, `Id_Area`, `Activo`, `Correo`, `Dni_Empleado`, `Password`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])"
		}
		*/

	}
 ?>

 <?php 
 	$register=new Registrador();
	$register->cambiar_cargo(6,1);	

  ?>


