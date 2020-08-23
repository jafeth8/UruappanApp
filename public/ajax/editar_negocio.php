<?php


if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["nombreNegocio"])){
	/* Llamar la Cadena de Conexion*/ 
	include ("../config/conexion.php");
	// escaping, additionally removing everything that could be (html/javascript-) code
     $nombreNegocio = mysqli_real_escape_string($con,(strip_tags($_POST['nombreNegocio'], ENT_QUOTES)));
	 $descripcion = mysqli_real_escape_string($con,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
	 $ubicacion= mysqli_real_escape_string($con,(strip_tags($_POST['ubicacion'], ENT_QUOTES)));
	 $telefono = mysqli_real_escape_string($con,($_POST['telefono']));
	
	 $id_socio=intval($_POST['id_socio']);
	 $sql="UPDATE socios SET nombre_negocio='$nombreNegocio', descripcion='$descripcion', ubicacion='$ubicacion', telefono='$telefono' WHERE id_socio='$id_socio'";
	 $query = mysqli_query($con,$sql);
	// if user has been added successfully
	if ($query) {
		$messages[] = "Datos  han sido actualizados satisfactoriamente.";
	} else {
		$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
	}
	
	if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
		}
		if (isset($messages)){
			
			?>
			<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>¡Bien hecho!</strong>
					<?php
						foreach ($messages as $message) {
								echo $message;
							}
						?>
			</div>
			<?php
		}
		
}
?>