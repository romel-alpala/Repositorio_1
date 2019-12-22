<?php
	$user="root";
	$pass="";
	$server="localhost";
	$db="sistema_pasantias_sena";

	$con = mysqli_connect($server,$user,$pass,$db) or die("Error al conectar la base  de Datos".mysql_error());
	

?>