@extends('layouts_negocios.plantilla_negocio')
@section('estilos_para_sliders')
    <!--vacio por el momento-->
@endsection
@section('content')
<div class="row" style="margin-top: 1vh;">
    <div class="col-md-12">
      @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>OK! </strong> {{ Session::get('mensaje') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
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
                    <option value="Abarrotes"{{ $users->categoria=="Abarrotes" ? "selected" : "" }}>Abarrotes</option>
                    <option value="Artesanos"{{ $users->categoria=="Artesanos" ? "selected" : "" }}>Artesanos</option>
                    <option value="Automotriz"{{ $users->categoria=="Automotriz" ? "selected" : "" }}>Automotriz</option>
                    <option value="Boutique"{{ $users->categoria=="Boutique" ? "selected" : "" }}>Boutique</option>
                    <option value="Bares"{{ $users->categoria=="Bares" ? "selected" : "" }}>Bares</option>
                    <option value="Cafeterias"{{ $users->categoria=="Cafeterias" ? "selected" : "" }}>Cafeterías</option>
                    <option value="Carnicerias"{{ $users->categoria=="Carnicerias" ? "selected" : "" }}>Carnicerías</option>
                    <option value="Comidas"{{ $users->categoria=="Comidas" ? "selected" : "" }}>Comidas</option>
                    <option value="Construccion"{{ $users->categoria=="Construccion" ? "selected" : "" }}>Construcción</option>
                    <option value="Deportes"{{ $users->categoria=="Deportes" ? "selected" : "" }}>Deportes</option>
                    <option value="Emergencias"{{ $users->categoria=="Emergencias" ? "selected" : "" }}>Emergencias</option>
                    <option value="Florerias"{{ $users->categoria=="Florerias" ? "selected" : "" }}>Florerías</option>
                    <option value="Hospedaje"{{ $users->categoria=="Hospedaje" ? "selected" : "" }}>Hospedaje</option>
                    <option value="Paleterias"{{ $users->categoria=="Paleterias" ? "selected" : "" }}>Paleterías</option>
                    <option value="Panaderias"{{ $users->categoria=="Panaderias" ? "selected" : "" }}>Panaderías</option>
                    <option value="Pizzerias"{{ $users->categoria=="Pizzerias" ? "selected" : "" }}>Pizzerías</option>
                    <option value="Resposterias"{{ $users->categoria=="Resposterias" ? "selected" : "" }}>Reposterías</option>
                    <option value="Transporte"{{ $users->categoria=="Transporte" ? "selected" : "" }}>Transporte</option>
                    <option value="Salud"{{ $users->categoria=="Salud" ? "selected" : "" }}>Salud</option>
                    <option value="Servicios"{{ $users->categoria=="Servicios" ? "selected" : "" }}>Servicios</option>
                    <option value="Vinaterias"{{ $users->categoria=="Vinaterias" ? "selected" : "" }}>Vinaterías</option>
                    
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
              <input type="file" class="form-control-file" id="logo" name="logo" {{ empty($users->logo) ? "required" : "" }}>
            </div>
            <div class="col-sm-9">
              @if (empty($users->logo)==false)
               <img src="../../../img/logoNegocio/{{ $users->logo }}" width="200" class="img-fluid"> 
              @endif
            </div>
          </div>
          <div class="form-group">
            <label for="imagen_portada"class="col-sm-3 control-label">Imagen de portada</label>
            <div class="col-sm-9">
              <input type="file" class="form-control-file" id="logo" name="imagen_portada" {{ empty($users->imagen_portada) ? "required" : "" }}>
            </div>
            <div class="col-sm-9">
              @if (empty($users->imagen_portada)==false)
               <img src="../../../img/portadaNegocio/{{ $users->imagen_portada }}" width="200" class="img-fluid"> 
              @endif
            </div>
          </div>
          <!--*****************SECCION PARA SELECCIONAR Y MOSTRAR GALERIA DE IMAGENES-->
          <div class="form-group">
            <label for="img" class="negrita col-sm-3 control-label">Selecciona las imagenes para la galeria:</label>                         
            <div class="col-sm-9">
              <input name="img[]" type="file" id="img" multiple="multiple">
            </div>
            <div>
            
            <br>
            <br>
            
              <span>Imagen(es) Actual(es) de la galeria: </span>
              <br>

              <!-- Mensaje: Imagen Eliminada Satisfactoriamente ! -->
              @if(Session::has('message'))
                <div class="alert alert-primary" role="alert">
                  {{ Session::get('message') }}
                </div>
              @endif

              <!-- Mostramos todas las imágenes pertenecientesa a este registro -->
              @forelse($imagenes_galeria as $img)                    
                  
                  <img src="../../../img/galeria/{{ $img->nombre }}" width="200" class="img-fluid"> 

                  <!-- Botón para Eliminar la Imagen individualmente -->
                  <a href="{{ route('eliminarImagenGaleria', [$img->id, $users->id]) }}" class="btn btn-danger btn-sm" onclick="return confirmarEliminar();">Eliminar</a> 
              @empty
                
                <div class="alert alert-warning" role="alert">
                 <strong>Aviso!</strong> Aun no se han cargado (imagenes) para la galeria de este negocio
                </div>  
              @endforelse
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