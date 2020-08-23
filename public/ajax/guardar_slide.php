<?php


if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["titulo"])){
	/* Llamar la Cadena de Conexion*/ 
	include ("../config/conexion.php");
	// escaping, additionally removing everything that could be (html/javascript-) code
     $titulo = mysqli_real_escape_string($con,(strip_tags($_POST['titulo'], ENT_QUOTES)));
	 $descripcion = mysqli_real_escape_string($con,(strip_tags($_POST['descripcion'], ENT_QUOTES)));
	 $texto_boton= mysqli_real_escape_string($con,(strip_tags($_POST['texto_boton'], ENT_QUOTES)));
	 $url_boton = mysqli_real_escape_string($con,($_POST['url_boton']));
	 $estilo = mysqli_real_escape_string($con,($_POST['estilo']));
	 $orden = intval($_POST['orden']);
	 $estado = intval($_POST['estado']);
	 $sql="INSERT INTO slider (titulo,descripcion,texto_boton,url_boton,estilo_boton,estado,orden) VALUES ('$titulo','$descripcion','$texto_boton','$url_boton','$estilo','$orden','$estado')";
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