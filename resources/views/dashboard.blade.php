@extends('plantilla_admin')

@section('estilos_para_sliders')
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@endsection

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!--*************************-->
          <div class="row">
            <div class="col-xs-12 text-right mb-5">
              <a href="{{ route('agregarSlider') }}" class="btn btn-default" ><span class="glyphicon glyphicon-plus"></span> Agregar Slide</a>
            </div>
            
          </div>
          
          <br>
          <!--<div class="outer_div"></div>-- Datos ajax Final -->
          <div class="outer_div">
            <div class="row">
              @forelse ($sliders as $slider)
                
                  <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                      <img src="img/slider/{{ $slider->url_image }}" alt="{{ $slider->url_image }}">
                      <div class="caption">
                      <h3>{{ $slider->titulo }}</h3>
                      <p><?{{ $slider->descripcion }}?></p>
                      
                      <p class='text-right'><a href="{{ route('sliderEdit' , $slider) }}" class="btn btn-info" role="button"><i class='glyphicon glyphicon-edit'></i> Editar</a> <button type="button" class="btn btn-danger" onclick='eliminar_slide("{{ $slider->id }}");' role="button"><i class='glyphicon glyphicon-trash'></i> Eliminar</button></p>
                      </div>
                    </div>
                    </div>
                
              @empty
                  <h1>Aun no hay noticias agregadas</h1>
              @endforelse
            </div>
          </div>
        <!--*************************-->
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
  <!-- ********Scripts para cargar sliders*******-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function(){
      load(1);
    });

    function eliminar_slide(id){
      page=1;
      var parametros = {"action":"ajax","page":page,"id":id};
      if(confirm('Esta acción  eliminará de forma permanente el slide \n\n Desea continuar?')){
      $.ajax({
        url:'./ajax/slider_ajax.php',
        data: parametros,
         beforeSend: function(objeto){
        $("#loader").html("<img src='./img/ajax-loader.gif'>");
        },
        success:function(data){
          $(".outer_div").html(data).fadeIn('slow');
          $("#loader").html("");
        }
      })
    }
    }
  </script>
  <!-- *******FIN de Scripts para cargar sliders*******-->
@endpush