@extends('layouts_negocios.plantilla_negocio')
@section('estilos_para_sliders')
    <!--vacio por el momento-->
@endsection
@section('content')
<div class="row" style="margin-top: 1vh;">
    <div class="col-md-12">
      <h3 ><span class="glyphicon glyphicon-edit"></span> Editar datos del negocio</h3>
      <form class="form-horizontal" id="editar_negocio" method="POST" action="{{ route('updateUsersData',$users) }}" enctype="multipart/form-data" autocomplete="off">
         @csrf @method('PUT')
         <div class="form-group">
           <label for="name-negocio" class="col-sm-3 control-label">Nombre del negocio</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" id="name-negocio" value="{{ $users->name }}" required name="nombreNegocio">
             
           </div>
         </div>
         
        <div class="form-group">
           <label for="descripcion" class="col-sm-3 control-label">Descripción</label>
           <div class="col-sm-9">
             <textarea class="form-control " rows="5" id="descripcion" required name="descripcion">{{ $users->descripcion }}</textarea>
           </div>
         </div>

         <div class="form-group">
            <label for="categoria" class="col-sm-3 control-label">Categoria</label>
            <div class="col-sm-9">
                <select id="categoria" class="form-control select2" name="categoria">
                    <option value="Trasnsporte"{{ $users->categoria=="Transporte" ? "selected" : "" }}>Trasporte</option>
                    <option value="Resposteria"{{ $users->categoria=="Resposteria" ? "selected" : "" }}>Repostería</option>
                    <option value="Carniceria"{{ $users->categoria=="Carniceria" ? "selected" : "" }}>Carniceria</option>
                    <option value="Salud"{{ $users->categoria=="Salud" ? "selected" : "" }}>Salud</option>
                    <option value="Emergencias"{{ $users->categoria=="Emergencias" ? "selected" : "" }}>Emergencias</option>
                    <option value="Construccion"{{ $users->categoria=="Construccion" ? "selected" : "" }}>Construccion</option>
                </select>
            </div>
            
          </div>
         
         <div class="form-group">
           <label for="ubicacion" class="col-sm-3 control-label">Ubicacion</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ $users->ubicacion }}">
           </div>
         </div>
         <div class="form-group">
           <label for="telefono" class="col-sm-3 control-label">Telefono</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $users->telefono }}">
           </div>
         </div>
         <div class="form-group">
          <label for="telefono" class="col-sm-3 control-label">link de facebook</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="telefono" name="facebook_url" value="{{ $users->facebook_url }}">
          </div>
        </div>
          <div class="form-group">
            <label for="logo"class="col-sm-3 control-label">Logo del negocio</label>
            <div class="col-sm-9">
              <input type="file" class="form-control-file" id="logo" name="logo" required>
            </div>
          </div>
          <div class="form-group">
            <label for="imagen_portada"class="col-sm-3 control-label">Imagen de portada</label>
            <div class="col-sm-9">
              <input type="file" class="form-control-file" id="logo" name="imagen_portada" required>
            </div>
          </div>
          <!--*****************SECCION PARA SELECCIONAR Y MOSTRAR GALERIA DE IMAGENES-->
          <div class="form-group">
            <label for="img" class="negrita col-sm-3 control-label">Selecciona una imagen:</label>                         
            <div class="col-sm-9">
            <input name="img[]" type="file" id="img" multiple="multiple">
            <br>
            <br>
            @if ( !empty ( $users->imagenes_galeria) )

              <span>Imagen(es) Actual(es): </span>
              <br>

              <!-- Mensaje: Imagen Eliminada Satisfactoriamente ! -->
              @if(Session::has('message'))
                <div class="alert alert-primary" role="alert">
                  {{ Session::get('message') }}
                </div>
              @endif

              <!-- Mostramos todas las imágenes pertenecientesa a este registro -->
              @foreach($imagenes_galeria as $img)                    
                  
                  <img src="../../../img/galeria/{{ $img->nombre }}" width="200" class="img-fluid"> 

                  <!-- Botón para Eliminar la Imagen individualmente -->
                  <a href="{{ route('eliminarImagenGaleria', [$img->id, $users->id]) }}" class="btn btn-danger btn-sm" onclick="return confirmarEliminar();">Eliminar</a> 

              @endforeach

              

            @else

              Aún no se ha cargado una imagen para este producto

            @endif                
            </div>

          </div>
          <!--*****************FIN DE LA SECCION PARA SELECCIONAR Y MOSTRAR GALERIA DE IMAGENES -->       
         <div class="form-group">
         <div id='loader'></div>
         <div class='outer_div'></div>
           <div class="col-sm-offset-3 col-sm-9">
             <button type="submit" class="btn btn-success">Actualizar datos</button>
           </div>
         </div>
      </form> 
   </div>

    <!--************************************************-->
   
    <!--*******************************************************************-->
    <!--*******************************************************************-->
   </div>
</div> 
@endsection

@section('scripts')
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
@endsection