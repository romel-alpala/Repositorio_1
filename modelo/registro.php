<?php
	include ('conexion_db.php');
 function reg_usuario($correo,$contrasena){
 	include ('conexion_db.php');
 	$sql = "INSERT into usuario(correo,contrasena) values('$correo',md5('$contrasena'))";
 	$resp = mysqli_query($con,$sql);

 	if ($resp) {
 		return true;
 	}else{
 		return false;
 	}

 }

 function reg_documento($documento){
 	include ('conexion_db.php');
 	$sql="INSERT into doc_cam_com(doc_ruta) VALUES('$documento')";
 	$resp = mysqli_query($con,$sql);

 	if ($resp) {
 		return true;
 	}else{
 		return false;
 	}
 }

 function reg_empresa($razon_s,$responsable,$nit,$direccion,$telefono,$correo,$documento,$act_eco){
 	include ('conexion_db.php');
 	$sql_1 = "SELECT id_doc_cam_com from doc_cam_com where doc_ruta = '$documento'";
 	$resultado = mysqli_query($con,$sql_1);
 	$num_filas = mysqli_num_rows($resultado);
 	$id_doc;
	$fila = mysqli_fetch_array($resultado);

	for ($i=0; $i < $num_filas; $i++) { 
		$id_doc = $fila[0];
		$fila = mysqli_fetch_array($resultado);
		}
 	
 	$sql = "INSERT into empresa(em_nit,em_responsable,em_razon_social,em_direccion,em_telefono,correo,id_doc_cam_com,id_act_economica) values ('$nit','$responsable','$razon_s','$direccion','$telefono','$correo','$id_doc','$act_eco')";

 	$resp = mysqli_query($con,$sql) or die(mysqli_error($con));

 	if ($resp) {
 		return true;
 	}else{
 		return false;
 	}
 }
?>