<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&display=swap" rel="stylesheet">
  <!--Estilos propios-->
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <!-- Latest compiled and minified CSS  agregado para lasecciuon de noticias ya lo quite XD-->
  <title>UruAppan</title>


</head>

<body>

  <!-- NAVIGATION -->
  <nav id="navegacion" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#carouselExampleCaptions">
        <img src="img/logo/IColor.png" alt="logo-uruappan" style="width: 60px; height: 60px;">
      </a>
      <button class="navbar-toggler" style="border-color: black; background: silver;" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link a-navMain" href="#carouselExampleCaptions">Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link a-navMain" href="#seccion-info">Informacion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link a-navMain" href="#clientes">Nuestros clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link a-navMain" href="#seccion-equipo">Equipo</a>
          </li>
          <li class="nav-item" style="margin-left: 1vw;">
            <a id="boton-nav a-navMain" class="nav-link button-nav textoBotton-nav" href="{{ route('logingeneral') }}">Iniciar sesión</a>

          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!--SECCION NOTICIAS-->
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
     @foreach( $sliders as $slider )
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
     @endforeach
    </ol>
    
    <div class="carousel-inner" role="listbox">
      @foreach( $sliders as $slider )
         <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
             <img class="d-block w-100" src="{{asset("img/slider/$slider->url_image") }}" alt="{{ $slider->titulo }}">
                <div class="carousel-caption d-none d-md-block">
                   <h3>{{ $slider->titulo }}</h3>
                   <p>{{ $slider->descripcion }}</p>
                   <a class="btn btn-{{ $slider->estilo_boton}} text-right" href="{{ $slider->url_boton }}" target="_blank">{{ $slider->texto_boton }}</a>
                </div>
         </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <!--FIN DE LA SECCION NOTICIAS-->



  <!--SECCION INFORMATIvA -->
  <section id="seccion-info">
    <div class="container-fluid informacion">
      <div class="row justify-content-start align-items-center filaInformacion ml-5">
        <div class="col-12">
          <h1 class="h1_informacion d-block">Uruapan App</h1>
          <p class="textoInformacion">Es un directorio comercial digital dinamico que <br>
            permite mostrar contenidos de texto, imágenes,<br>
            vídeo o enlaces externos acerca de tu negocio o <br>
            establecimiento, haciendo una manera mas simple <br>
            localizarte.</p>
        </div>
      </div>
    </div>
    <div class="container-fluid informacion2">
      <div class="row justify-content-center align-items-center filaInformacion2">
        <div class="col-6 col-md-6 col-sm-4">
          <img src="img/Tablet_fon.png" alt="tableta y telefono" class="img-fluid">
        </div>
        <div class=" col-6 col-md-5 col-sm-8">
          <div class="row">
            <h1 class="h1_informacion">Digitalizate</h1>
            <p class="textoInformacion">Es un directorio comercial digital dinamico que 
              permite mostrar contenidos de texto, imágenes,
              vídeo o enlaces externos acerca de tu negocio o 
              establecimiento, haciendo una manera mas simple
              localizarte.</p>
              <h1 class="h2_informacion" >!Disponible en!</h1>
          <div class="row">
            <div class="col-6">
              <a href="#"><img src="img/Appstore.png" class="img-fluid" style="height: 50px;" alt="appstore" ></a>
              
            </div>
            <div class="col-6">
              <a href="#"><img src="img/Playstore.png" class="img-fluid" style="height: 50px;" alt="playstore"></a>
              
            </div>
          </div>    
          </div>
        </div>
      </div>
     
    </div>
    <div class="container-fluid informacion3 ">
      <div class="row justify-content-center align-items-center informacion3">
        <div class="col-6">
          <h1 class="h1_informacion">Registrate facil</h1>
          <p class="textoInformacion">Crea una cuenta.<br> Llena el formulario de registro. <br>
            Guarda tu registro. <br> Disfruta de Uruappan App </p>
        </div>
        <div class="col-5">
          <img src="img/Compuestos.png" class="img-fluid" alt="compuestos">
        </div>
      </div>
    </div>
  </section>




  <!--SECCION CLIENTES-->

  <!--*************************-->

  <div id="clientes" class="clientes">
    <h1 class="h1Clientes">Nuestros clientes</h1>
    <section class="customer-logos">
      <div class="slide"><img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg" class="img-clientes"> <br><p class="textoClientes" style="text-align: center;">empresa1</p>
      </div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg" class="img-clientes"> <br><p class="textoClientes" style="text-align: center;">empresa1</p>
      </div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg" class="img-clientes"> <br><p class="textoClientes" style="text-align: center;">empresa1</p>
      </div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg" class="img-clientes"> <br><p class="textoClientes" style="text-align: center;">empresa1</p>
      </div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg" class="img-clientes"> <br><p class="textoClientes" style="text-align: center;">empresa1</p>
      </div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg" class="img-clientes"> <br><p class="textoClientes" style="text-align: center;">empresa1</p>
      </div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg" class="img-clientes"> <br><p class="textoClientes" style="text-align: center;">empresa1</p>
      </div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/retro-label-on-rustic-background_82147503374.jpg" class="img-clientes"> <br><p class="textoClientes" style="text-align: center;">empresa1</p>
      </div>
    </section>
  </div>


  <!--SECCION EQUIPO -->
  <section id="seccion-equipo" class="equipo">
    <div class="container">
      <div class="row justify-content-center">
        <h1 class="h1_informacion" style="margin-top: 30px;">Nuestro equipo</h1>
      </div>
      <div class="row justify-content-center">
        <div class="col">
          <div class="card tarjetaEquipo ">
            <img class="card-img-top" src="img/persona.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col">
        <div class="card tarjetaEquipo">
            <img class="card-img-top" src="img/persona.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col">
        <div class="card tarjetaEquipo">
            <img class="card-img-top" src="img/persona.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
      <!--SEGUNDA FILA TARJETA-->
      <div class="row mt-5">
      <div class="col">
          <div class="card tarjetaEquipo">
            <img class="card-img-top" src="img/persona.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col">
        <div class="card tarjetaEquipo">
            <img class="card-img-top" src="img/persona.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col">
        <div class="card tarjetaEquipo">
            <img class="card-img-top" src="img/persona.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <footer>
    <div class="container p-3">
      <div class="row text-center text-white">
        <div class="col ml-auto">
          <p>Copyright &copy; 2018</p>
          <p>EMPRESA</p>
          <P>POLITICAS DE PRIVACIDAD</P>
          <P>TERMINOS Y CONDICIONES</P>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



  <!--****************************** scrip para carousel clientes-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

  <!--****************************** fin de scrip para carousel clientes-->

  <!--***************************script para alertas personalizadas sweet alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script>
    if (screen.width < 767){
          (async () => {
          const{value:dispositivo}= await Swal.fire({
            title: 'Error!',
            text: 'disculpa, este sitio no esta soportado para dipositivos moviles, te invitamos a decargar nuestra app movil',
            icon: 'error',
            confirmButtonText: 'Descargar app',
            allowOutsideClick:false,
            allowEscapeKey:false,
            allowEnterKey:false,
            input:'select',
            inputPlaceholder:'Selecciona el tipo de dispositivo',
            inputOptions:{
              android:'android',
              ios: 'ios'
            }
        });

        if(dispositivo=="android"){
          var URL="https://play.google.com/store/apps/details?id=com.Uruappan.paracho"
          open(URL,"_self")
        }else if(dispositivo=="ios"){
          var URL="https://apps.apple.com/mx/app/uruappan/id1493860261"
          open(URL,"_self")
        }else{
          open("index.php","_self")
        }
      })() 
    } 
   
 

  


  </script>
  <!--***************************FIN DE script para alertas personalizadas sweet alert-->
  <script>
    $(window).scroll(function() {
      if ($("#navegacion").offset().top > 56) {
        $("#navegacion").addClass("nav-color-amarillo");
        $(".a-navMain").addClass("texto-navbar");
        //$("boton-nav").addClass("textoBotton-nav");
      } else {
        $("#navegacion").removeClass("nav-color-amarillo");
        $(".a-navMain").removeClass("texto-navbar");
        //$("boton-nav").removeClass("textoBotton-nav");
      }
    });
  </script>

  <script>
    $(document).ready(function() {
      $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{

          settings: {
            slidesToShow: 4
          }
        }, {

          settings: {
            slidesToShow: 3
          }
        }]
      });
    });
  </script>



</body>

</html>