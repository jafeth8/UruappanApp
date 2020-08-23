<?php
/* 
session_start();
if (!isset($_SESSION["correo"])) {
    header("location: index.php");
}
*/
$title="Agregar Slide";
/* Llamar la Cadena de Conexion*/ 
include ("config/conexion.php");
//Insert un nuevo producto
$imagen_demo="demo.png";

$insert=mysqli_query($con,"insert into sliders (url_image, estado) values ('$imagen_demo','0')");
$sql_last=mysqli_query($con,"select LAST_INSERT_ID(id) as last from sliders order by id desc limit 0,1");
$rw=mysqli_fetch_array($sql_last);
$id_slide=$rw['last'];
$active_config="active";
$active_slider="active";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/ico/favicon.ico">
    <title><?php echo $title;?></title>
    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">
	<link href="css/preview-image.css" rel="stylesheet">
  </head>
  <body>
		<?php include("top_menu.php");?>

    <div class="container">
		
      <!-- Main component for a primary marketing message or call to action -->
      <div class="row">
	   	  
	   <ol class="breadcrumb">
		  <li><a href="sliderslist.php">Slider</a></li>
		  <li class="active">Agregar</li>
		</ol>
		 <div class="col-md-7">
		 <h3 ><span class="glyphicon glyphicon-edit"></span> Editar slide</h3>
			<form class="form-horizontal" id="guardar_slide">
				 
			 
			  
			  <div class="form-group">
				<label for="titulo" class="col-sm-3 control-label">Titulo</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="titulo" value="" required name="titulo">
				  <input type="hidden" class="form-control" id="id_slide" value="<?php echo intval($id_slide);?>" name="id_slide">
				</div>
			  </div>
			  
			 <div class="form-group">
				<label for="descripcion" class="col-sm-3 control-label">Descripción</label>
				<div class="col-sm-9">
				  <textarea class="form-control " rows="5" id="descripcion" required name="descripcion"></textarea>
				</div>
			  </div>
			  <div class="form-group">
				<label for="texto_boton" class="col-sm-3 control-label">Texto del boton</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="texto_boton" name="texto_boton" value="Mas informacion aqui!">
				</div>
			  </div>
			  <div class="form-group">
				<label for="url_boton" class="col-sm-3 control-label">URL del boton</label>
				<div class="col-sm-9">
				  <input type="text" class="form-control" id="url_boton" name="url_boton" value="">
				</div>
			  </div>
			  <div class="form-group">
				<label for="texto_boton" class="col-sm-3 control-label">Color del boton</label>
				<div class="col-sm-9">
					<button type="button" class="btn btn-info btn-sm"><input type="radio" name="estilo" value="info" checked> </button> 
					<button  type="button" class="btn btn-warning btn-sm"><input type="radio" name="estilo" value="warning"> </button> 
					<button type="button" class="btn btn-primary btn-sm"><input type="radio" name="estilo" value="primary">  </button>
					<button type="button" class="btn btn-success btn-sm"><input type="radio" name="estilo" value="success">  </button> 
					<button type="button" class="btn btn-danger btn-sm"><input type="radio" name="estilo" value="danger">  </button> 
				</div>
					
			
			  </div>
			  <div class="form-group">
				<label for="orden" class="col-sm-3 control-label">Orden</label>
				<div class="col-sm-9">
				  <input type="number" class="form-control" id="orden" name="orden" value="1" placeholder="valor 1 es el recomendado">
				</div>
			  </div>
			  
			  
			  <div class="form-group">
				<label for="estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-9">
				  <select class="form-control" id="estado" required name="estado">
					<option value="0" >Guardar en la lista</option>
					<option value="1" >Mostrar en pagina principal</option>
				 </select>
				</div>
			  </div>
			 
			  
			  
			  <div class="form-group">
			  <div id='loader'></div>
			  <div class='outer_div'></div>
				<div class="col-sm-offset-3 col-sm-9">
				  <button type="submit" class="btn btn-success">Guardar datos</button>
				</div>
			  </div>
			</form>
			
			
			
		</div>
		<div class="col-md-5">
		 <h3 ><span class="glyphicon glyphicon-picture"></span> Imagen</h3>
		 
		 <form class="form-vertical">
		 
			<div class="form-group">
				
				<div class="col-sm-12">
				
				 
				 <div class="fileinput fileinput-new" data-provides="fileinput">
								  <div class="fileinput-new thumbnail" style="max-width: 100%;" >
									  <img class="img-rounded" src="./img/slider/<?php echo $imagen_demo;?>" />
								  </div>
								  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 250px;"></div>
								  <div>
									<span class="btn btn-info btn-file"><span class="fileinput-new">Selecciona una imagen</span>
									<span class="fileinput-exists" >Cambiar imagen</span><input type="file" name="fileToUpload" id="fileToUpload" required></span>
									<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Cancelar</a>
								  </div>
					</div>
					<div class="upload-msg"></div>
					
				</div>
				<p class="text-primary text-center">Tamaño recomendado es de 900 x 500 píxeles.</p>
			  </div>
			  
			
			  
			 
			  
			  
		 </form>
		</div>
			
    </div> 
	</div><!-- /container -->

		
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  </body>
</html>
	<script>
			function upload_image(){
				$(".upload-msg").text('Cargando...');
				//var id_slide=$("#id_slide").val();
				var inputFileImage = document.getElementById("fileToUpload");
				var file = inputFileImage.files[0];
				var data = new FormData();
				data.append('fileToUpload',file);
				//data.append('id',id_slide);
				
				$.ajax({
					url: "ajax/subir_imagen_slide.php",        // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
						$(".upload-msg").html(data);
						window.setTimeout(function() {
						$(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove();
						});	}, 5000);
					}
				});
				
			}
			
			function eliminar(id){
				var parametros = {"action":"delete","id":id};
						$.ajax({
							url:'ajax/upload2.php',
							data: parametros,
							 beforeSend: function(objeto){
							$(".upload-msg2").text('Cargando...');
						  },
							success:function(data){
								$(".upload-msg2").html(data);
								
							}
						})
					
				}
				
				
				
				
			
	</script>
	<script>
		$("#guardar_slide").submit(function(e) {
			
			  $.ajax({
				  url: "ajax/guardar_slide.php",
				  type: "POST",
				  data: $("#guardar_slide").serialize(),
				   beforeSend: function(objeto){
					$("#loader").html("Cargando...");
				  },
				  success:function(data){
						$(".outer_div").html(data).fadeIn('slow');
						$("#loader").html("");
						upload_image();
					}
			});
			 e.preventDefault();
			 
		});
	</script>

	
	

