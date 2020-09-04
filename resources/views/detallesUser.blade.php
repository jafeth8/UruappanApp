<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detalles negocio</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!--estilos propios-->
<link rel="stylesheet" href="css/formularios.css">
<!--**********fuentes**********-->
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!--**********para visualizar galeria de imagenes**********-->
<script src="../../../js/jquery.min.js"></script>
<link rel="stylesheet" href="../../../css/jquery.fancybox.min.css" />
<script src="../../../js/jquery.fancybox.min.js"></script> 
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
              <a class="nav-link btn btn-primary" style="color:honeydew;" href="{{ route('mostrarUsuarios') }}">volver a la tabla de usuarios registrados</a>
            </li>
          </ul>
        </div>
    </nav>
    
<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 mx-auto">                    
            <div class="row">
                
                <div class="col-md-12">
      
                    <div class="content-box-large">
      
                      <div class="panel-heading">
                        
                        <div class="panel-title"><h2>{{ $users->name }}</h2></div>             
                            
                      </div>
                      
                      <div class="panel-body">
                                        
                          <section class="example mt-4">
      
                            <strong>descripcion</strong> <br>
                                {{ $users->descripcion }} 
                            <br><br>
      
                            <strong>Categoria</strong> <br>
                            {{ $users->categoria }}  

                            <br><br>
      
                            <strong>Ubicacion:</strong> <br>
                            {{ $users->ubicacion }}
      
                            <br><br>

                            <strong>Telefono:</strong> <br>
                            {{ $users->telefono }}
      
                            <br><br>

                            <strong>Correo Electronico:</strong> <br>
                            {{ $users->email }}
      
                            <br><br>

                            <strong>logo:</strong> <br>
                            <div>
                                @if (empty($users->logo)==false)
                                 <img src="../../../img/logoNegocio/{{ $users->logo }}" width="200" class="img-fluid"> 
                                @endif
                            </div>
                            <br><br>

                            <strong>Imagen de portada:</strong> <br>
                            <div>
                                @if (empty($users->imagen_portada)==false)
                                 <img src="../../../img/portadaNegocio/{{ $users->imagen_portada }}" width="200" class="img-fluid"> 
                                @endif
                            </div>
                            <br><br>

                            <strong>Facebook url:</strong> <br>
                            {{ $users->facebook_url }}
      
                            <br><br>
      
                            <strong>Creado:</strong> <br>
                            {{ $users->created_at }}  
      
                            <br><br>
      
                            <strong>Actualizado:</strong> <br>
                            {{ $users->updated_at }}                                                            
      
                            <br><br>
      
                            <strong>Galería de Imágenes:</strong> <br>
      
                            <!-- Mostramos todas las imágenes pertenecientes a este registro -->
                            @foreach($imagenes as $img)    
      
                              <a data-fancybox="gallery" href="../../../img/galeria/{{ $img->nombre }}">
                                <img src="../../../img/galeria/{{ $img->nombre }}" width="200" class="img-fluid"> 
                              </a>                         
      
                            @endforeach 
      
                            <br><br>
      
                            <a href="{{ route('mostrarUsuarios') }}" class="btn btn-dark">Volver</a>
                                          
                          </section>
      
                      </div>
      
                    </div>
      
                </div>
      
              </div> 
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>