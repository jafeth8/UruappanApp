<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login negocio</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!--estilos propios-->
<link rel="stylesheet" href="css/formularios.css">
<!--**********fuentes**********-->
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar  navbar-light" style="background-color:#73055b;">
        <a class="navbar-brand" href="#"><img src="img/logo/IColor.png" width="50" height="50" alt=""></a>
        <button class="navbar-toggler" style="border-color: ghostwhite; color: floralwhite;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"> </span> Opciones
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link btn btn-primary" style="color:honeydew;" href="{{ route('home') }}">volver al panel de adminitración</a>
            </li>
          </ul>
        </div>
    </nav>
<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 mx-auto">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title"><h2>Editar noticia</h2></div>
                    
                </div>     
                
                <div style="padding-top:30px" class="panel-body" >
                    
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    
                    <form id="loginform" class="form-horizontal" role="form" method="POST" action="{{ route('sliderUpdate',$slider) }}" enctype="multipart/form-data" autocomplete="off">
                        @csrf @method('PATCH')
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control-file" id="imagen" name="imagen">
                        </div>

                        <div style="margin-bottom: 25px" class="form-group">
                            <label class="control" for="titulo">titulo</label>
                            <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $slider->titulo }}" required>                                        
                        </div>
                        
                        <div style="margin-bottom: 25px" class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea style="resize: none" class="form-control" id="descripcion" rows="3" name="descripcion">{{ $slider->descripcion }}</textarea>
                        </div>

                        <div style="margin-bottom: 25px" class="form-group">
                            <label for="texto_boton">Texto boton</label>
                            <input id="texto_boton" type="text" class="form-control" name="texto_boton" value="{{ $slider->texto_boton }}" required>                                        
                        </div>

                        <div style="margin-bottom: 25px" class="form-group">
                            <label for="url_boton">Url boton</label>
                            <textarea style="resize: none" class="form-control" id="url_boton" rows="3" name="url_boton">{{ $slider->url_boton }}</textarea>
                        </div>

                        <div style="margin-bottom: 25px" class="form-group">
                            <label for="estilo_boton">Color del boton</label>
                            <div >
                                <button type="button" class="btn btn-info btn-sm"><input type="radio" name="estilo" value="info" {{ $slider->estilo_boton=="info" ? "checked" : "" }}> </button> 
                                <button type="button" class="btn btn-warning btn-sm"><input type="radio" name="estilo" value="warning" {{ $slider->estilo_boton=="warning" ? "checked" : "" }}> </button> 
                                <button type="button" class="btn btn-primary btn-sm"><input type="radio" name="estilo" value="primary" {{ $slider->estilo_boton=="primary" ? "checked" : "" }}> </button>
                                <button type="button" class="btn btn-success btn-sm"><input type="radio" name="estilo" value="success" {{ $slider->estilo_boton=="success" ? "checked" : "" }}> </button> 
                                <button type="button" class="btn btn-danger btn-sm"><input type="radio" name="estilo" value="danger"   {{ $slider->estilo_boton=="danger" ? "checked" : "" }}> </button> 
                            </div>
                        </div>    
                    

                        <div tyle="margin-bottom: 25px" class="form-group">
                            <label for="orden" >Orden</label>
                            <input type="number" class="form-control" id="orden" name="orden" value="{{ $slider->orden }}">
                        </div>
                            
                              
                        <!--<div class="form-group">
                            <label for="estado" >Estado</label>
                            <select class="form-control" id="estado" required name="estado">
                            <option value="0" {{ $slider->estado==0 ? "selected" : "" }}>Guardar en la lista</option>
                            <option value="1" {{ $slider->estado==1 ? "selected" : "" }}>Mostrar en pagina principal</option>
                            </select>
                        </div>-->
                         
                        
                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <button id="btn-login" type="submit" class="btn btn-success">Actualizar!</a>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    
                                </div>
                            </div>
                        </div>    
                    </form>
                    
                </div>                     
            </div>  
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>