@extends('plantilla_admin')

@section('estilos_css')
{{-- estilos para sliders --}}
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@endsection

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!--*************************-->
          <div class="row">
            <div class="col-xs-12 text-right mb-5">
              <a href="{{ route('agregarSlider') }}" class="btn btn-default" ><span class="glyphicon glyphicon-plus"></span> Agregar noticia</a>
            </div>
            
          </div>
          
          <br>
          <!--<div class="outer_div"></div>-- Datos ajax Final -->
          <div class="outer_div">
            @if(Session::has('slider_added'))
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                {{ Session::get('slider_added') }}
              </div>

            @endif
            @if(Session::has('updated_slider'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              {{ Session::get('updated_slider') }}
            </div>

          @endif
          @if(Session::has('delete_slider'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              <strong>Aviso!</strong> {{ Session::get('delete_slider') }}
            </div>
          @endif
            <div class="row">
              @forelse ($sliders as $slider)
                
                  <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                      <img src="img/slider/{{ $slider->url_image }}" alt="{{ $slider->url_image }}">
                      <div class="caption">
                      <h3>{{ $slider->titulo }}</h3>
                      <p><?{{ $slider->descripcion }}?></p>
                      
                      <p class='text-right'><a href="{{ route('sliderEdit' , $slider) }}" class="btn btn-info" role="button"><i class='glyphicon glyphicon-edit'></i> Editar</a> <a href="{{ route('sliderDelete',$slider->id) }}" class="btn btn-danger" onclick="return confirmarEliminar();"><i class='glyphicon glyphicon-trash'></i> Eliminar</a> </p>
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


  <script type="text/javascript">

    function confirmarEliminar()
    {
    var x = confirm("Eliminar esta imagen ?");
    if (x)
      return true;
    else
      return false;
    }

  </script>
@endpush