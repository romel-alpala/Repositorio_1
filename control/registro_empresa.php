<?php

	
	include ('../modelo/registro.php');
 	$razon_social = $_POST['razon_social'];
 	$responsable = $_POST['responsable'];
 	$act_eco = $_POST['act_economica'];
 	$archivo = $_POST['docu'];
 	$nit = $_POST['nit'];
 	$telefono = $_POST['telefono'];
 	$direccion = $_POST['direccion'];
 	$correo = $_POST['correo'];
 	$pass = $_POST['password'];

 	$resp_1 = reg_usuario($correo,$pass);
 	$resp_2 = reg_documento($archivo);
 	$resp_3 = reg_empresa($razon_social,$responsable,$nit,$direccion,$telefono,$correo,$archivo,$act_eco);
 	
 	if ($resp_1 and $resp_2 and $resp_3) {
 				
 		echo'<script type="text/javascript"> window.location.href="../vista/Form_reg_Empresa.php";</script>';
 	}
 	else
 	{
 		echo "Error al registrar Usuario";
 	}
	


?>