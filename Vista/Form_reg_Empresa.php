<!DOCTYPE html>
<html>
<head>
	<title>Registro de Empresa</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo_formulario_empresa.css">
	<link rel="stylesheet" type="text/css" href="iconos/style.css">
	<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"  crossorigin="anonymous">
<script src="bootstrap/js/bootstrap.min.js"  crossorigin="anonymous"></script>
	
</head>
<body>
	<center>
	<form action="../control/registro_empresa.php" method="POST" class="was-validated form" enctype="multipart/form-data">
		<div  class="Formulario_Registro">
			<br>
			<center><h1>Registro de Empresa</h1></center>
			
			
			<div class="inputWithIcon">
			  <input type="text" placeholder="Razon Social" name="razon_social" required="Campo Obligatorio">
			  <i class="icon-office" aria-hidden="true"></i>
			</div>

			<div class="inputWithIcon">
			  <input type="text" placeholder="Responsable" name="responsable" required="Campo Obligatorio">
			  <i class="icon-user" aria-hidden="true"></i>
			</div>

			<div class="form-row" id="caja_opciones">
				<div class="col" id="caja1">

					<select class="selectpicker select-css" name="act_economica" required>
						<option disabled="true" selected="true" value=""> Actividad Economica</option>
						<?php
						include ('../modelo/conexion_db.php');
							$sql="SELECT id_act_economica,act_nombre from act_economica";
							$resultado = mysqli_query($con,$sql);
							$num_filas = mysqli_num_rows($resultado);
							$fila = mysqli_fetch_array($resultado);

							for ($i=0; $i < $num_filas; $i++) { 
								echo "<option value='".$fila[0]."'>";
								echo $fila[1];
								echo "</option>";
								$fila = mysqli_fetch_array($resultado);
							}

						?>
					</select>
					<span class="icon-pencil" id="icon_select"></span>
				</div>

				<div class="col" id="caja2">
					<div class="input-file inputWithIcon" name="Fichier1">
				    	<input type="text" placeholder='Reg. Camara y Comercio' required id="text_input" name="docu" />
				    	<i class="icon-upload"></i>
					</div>
				</div>
			</div>
			<div  class="form-row">

				<div class="col inputWithIcon" id="caja1">
				  <input type="text" placeholder="Nit" name="nit"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required="Campo Obligatorio">
				  <i class="icon-barcode" aria-hidden="true"></i>
				</div>

				<div class="col inputWithIcon" id="caja2">
				  <input type="text" placeholder="Telefono" name="telefono" required="Campo Obligatorio">
				  <i class="icon-phone" aria-hidden="true"></i>
				</div>

			</div>
			

			<div class="form-row">

				<div class="col inputWithIcon"  id="caja1">
				  <input type="text" placeholder="Direccion" name="direccion" required="required" class="form-control">
				  <i class="icon-location" aria-hidden="true"></i>
				</div>

				<div class="col inputWithIcon" id="caja2">
					<i class="icon-mail2" aria-hidden="true"></i>
				  <input type="text" placeholder="Correo" name="correo" required="required" >  
				</div>

			</div>

			<div class="form-row">

				<div class="col inputWithIcon" id="caja1">
				  <input type="password" placeholder="Contraseña" name="password" required="Campo Obligatorio">
				  <i class="icon-key" aria-hidden="true"></i>
				</div>

				<div class="col inputWithIcon" id="caja2">
				  <input type="password" placeholder="Confirme Contraseña" required="Campo Obligatorio">
				  <i class="icon-key2" aria-hidden="true"></i>
				</div>

			</div>
			
		</div>
		<div class="btn_enviar">
			<p id="polt_user"> En cumplimiento de lo dispuesto en la Ley Orgánica 15/1999, de 13 de Diciembre, de Protección de Datos de Carácter Personal (LOPD) se informa al usuario que todos los datos que nos proporcione serán incorporados a un fichero, creado y mantenido bajo la responsabilidad del Servicio Nacional deAprendizaje (SENA)</p><br>
			<input type="image" src="iconos/btn_enviar.png" onmouseover="this.src='iconos/btn_enviar2.png'" onmouseout="this.src='iconos/btn_enviar.png'" id="btn_enviar">
			
			
		</div>
	</form>
<!-- Modal  alert -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    Registro Exitoso
  </div>

</div>

<script type="text/javascript">
	// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
//var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
//btn.onclick = function() {
  function mostrar_modal(){
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function bs_input_file() {
	$(".input-file").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' class='input-ghost' accept='.pdf' name='doc' style='visibility:hidden; height:0'>");
				element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function() {
					$(this).parents('.input-file').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function() {
	bs_input_file();
});
</script>

	</center>
</body>
</html>