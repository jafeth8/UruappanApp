@extends('layouts_negocios.plantilla_negocio')
@section('estilos_para_sliders')
    <!--vacio por el momento-->
@endsection
@section('content')
<div class="row" style="margin-top: 1vh;">
    <div class="col-md-12">

      @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <ul>
            <li>{{ $error }}</li>
          </ul>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endforeach

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
                    <option value="AGUACATERAS"{{ $users->categoria=="AGUACATERAS" ? "selected" : "" }}>Aguacateras</option>
                    <option value="ABARROTES"{{ $users->categoria=="ABARROTES" ? "selected" : "" }}>Abarrotes</option>
                    <option value="ARTESANOS"{{ $users->categoria=="ARTESANOS" ? "selected" : "" }}>Artesanos</option>
                    <option value="ARQUITECTOS"{{ $users->categoria=="ARQUITECTOS" ? "selected" : "" }}>Arquitectos</option>
                    <option value="AUTOMOTRIZ"{{ $users->categoria=="AUTOMOTRIZ" ? "selected" : "" }}>Automotriz</option>
                    <option value="BOUTIQUE"{{ $users->categoria=="BOUTIQUE" ? "selected" : "" }}>Boutique</option>
                    <option value="BELLEZA"{{ $users->categoria=="BELLEZA" ? "selected" : "" }}>Belleza</option>
                    <option value="BARES"{{ $users->categoria=="BARES" ? "selected" : "" }}>Bares</option>
                    <option value="CAFETERIAS"{{ $users->categoria=="CAFETERIAS" ? "selected" : "" }}>Cafeterías</option>
                    <option value="CENTRO BOTANERO"{{ $users->categoria=="CENTRO BOTANERO" ? "selected" : "" }}>Centro botanero</option>
                    <option value="CARNICERIAS"{{ $users->categoria=="CARNICERIAS" ? "selected" : "" }}>Carnicerías</option>
                    <option value="COMIDAS"{{ $users->categoria=="COMIDAS" ? "selected" : "" }}>Comidas</option>
                    <option value="CONSTRUCCION"{{ $users->categoria=="CONSTRUCCION" ? "selected" : "" }}>Construcción</option>
                    <option value="DEPORTES"{{ $users->categoria=="DEPORTES" ? "selected" : "" }}>Deportes</option>
                    <option value="DISEÑOS"{{ $users->categoria=="DISEÑOS" ? "selected" : "" }}>Diseños</option>
                    <option value="DESPACHOS"{{ $users->categoria=="DESPACHOS" ? "selected" : "" }}>Despachos</option>
                    <option value="EDUCACION"{{ $users->categoria=="EDUCACION" ? "selected" : "" }}>Educación</option>
                    <option value="EMERGENCIAS"{{ $users->categoria=="EMERGENCIAS" ? "selected" : "" }}>Emergencias</option>
                    <option value="FLORERIAS"{{ $users->categoria=="FLORERIAS" ? "selected" : "" }}>Florerías</option>
                    <option value="FUNERARIAS"{{ $users->categoria=="FUNERARIAS" ? "selected" : "" }}>Funerarias</option>
                    <option value="HOSPEDAJE"{{ $users->categoria=="HOSPEDAJE" ? "selected" : "" }}>Hospedaje</option>
                    <option value="HIGIENE"{{ $users->categoria=="HIGIENE" ? "selected" : "" }}>Higiene</option>
                    <option value="LIMPIEZA"{{ $users->categoria=="LIMPIEZA" ? "selected" : "" }}>Limpieza</option>
                    <option value="PALETERIAS"{{ $users->categoria=="PALETERIAS" ? "selected" : "" }}>Paleterías</option>
                    <option value="PAPELERIAS"{{ $users->categoria=="PAPELERIAS" ? "selected" : "" }}>Papelerias</option>
                    <option value="PANADERIAS"{{ $users->categoria=="PANADERIAS" ? "selected" : "" }}>Panaderías</option>
                    <option value="PIZZERIAS"{{ $users->categoria=="PIZZERIAS" ? "selected" : "" }}>Pizzerías</option>
                    <option value="REPARACIONES"{{ $users->categoria=="REPARACIONES" ? "selected" : "" }}>Reparaciones</option>
                    <option value="REPOSTERIAS"{{ $users->categoria=="REPOSTERIAS" ? "selected" : "" }}>Reposterías</option>
                    <option value="ROPA"{{ $users->categoria=="ROPA" ? "selected" : "" }}>Ropa</option>
                    <option value="SONIDO"{{ $users->categoria=="SONIDO" ? "selected" : "" }}>Sonido</option>
                    <option value="SALUD"{{ $users->categoria=="SALUD" ? "selected" : "" }}>Salud</option>
                    <option value="TRANSPORTE"{{ $users->categoria=="TRANSPORTE" ? "selected" : "" }}>Transporte</option>
                    <option value="SERVICIOS"{{ $users->categoria=="SERVICIOS" ? "selected" : "" }}>Servicios</option>
                    <option value="VINATERIAS"{{ $users->categoria=="VINATERIAS" ? "selected" : "" }}>Vinaterías</option>
                    <option value="VETERINARIAS"{{ $users->categoria=="VETERINARIAS" ? "selected" : "" }}>Veterinarias</option>
                    <option value="ZAPATERIAS"{{ $users->categoria=="ZAPATERIAS" ? "selected" : "" }}>Zapaterias</option>
                    
                </select>
            </div>
            
          </div>
         
         <div class="form-group">
           <label for="ubicacion" class="col-sm-3 control-label">Ubicacion</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" id="ubicacion" required name="ubicacion" value="{{ $users->ubicacion }}">
           </div>
         </div>
         <div class="form-group">
           <label for="telefono" class="col-sm-3 control-label">Telefono</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" id="telefono"  required name="telefono" value="{{ $users->telefono }}">
           </div>
         </div>
         <div class="form-group">
          <label for="telefono" class="col-sm-3 control-label">link de facebook (opcional)</label>
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