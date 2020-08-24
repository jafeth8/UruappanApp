@extends('plantilla_admin')
@section('estilos_css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
                <h3 ><span class="glyphicon glyphicon-edit mb-5"></span> Agregar slide</h3>
                <form class="form-horizontal" method="POST" action="{{ route('crearSlider') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="imagen" class="col-sm-1 control-label">Imagen</label>
                        <div class="col-sm-10">
                          <input type="file" id="imagen" name="imagen" required>
                        </div>
                      </div>
    
                    <div class="form-group">
                      <label for="titulo" class="col-sm-1 control-label">Titulo</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="titulo" value="" required name="titulo">
                      </div>
                    </div>
                    
                   <div class="form-group">
                      <label for="descripcion" class="col-sm-1 control-label">Descripción</label>
                      <div class="col-sm-10">
                        <textarea class="form-control " rows="5" id="descripcion" required name="descripcion"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="texto_boton" class="col-sm-1 control-label">Texto del boton</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="texto_boton" name="texto_boton" value="Mas informacion aqui!">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="url_boton" class="col-sm-1 control-label">URL del boton</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="url_boton" name="url_boton" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="texto_boton" class="col-sm-1 control-label">Color del boton</label>
                      <div class="col-sm-10">
                          <button type="button" class="btn btn-info btn-sm"><input type="radio" name="estilo" value="info" checked> </button> 
                          <button  type="button" class="btn btn-warning btn-sm"><input type="radio" name="estilo" value="warning"> </button> 
                          <button type="button" class="btn btn-primary btn-sm"><input type="radio" name="estilo" value="primary">  </button>
                          <button type="button" class="btn btn-success btn-sm"><input type="radio" name="estilo" value="success">  </button> 
                          <button type="button" class="btn btn-danger btn-sm"><input type="radio" name="estilo" value="danger">  </button> 
                      </div>
                          
                  
                    </div>
                    <div class="form-group">
                      <label for="orden" class="col-sm-1 control-label">Orden</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="orden" name="orden" value="1" placeholder="valor 1 es el recomendado">
                      </div>
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="estado" class="col-sm-1 control-label">Estado</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="estado" required name="estado">
                          <option value="0" >Guardar en la lista</option>
                          <option value="1" >Mostrar en pagina principal</option>
                       </select>
                      </div>
                    </div>
                   
                    
                    
                    <div class="form-group">
                    <div id='loader'></div>
                    <div class='outer_div'></div>
                      <div class="col-sm-offset-1 col-sm-9">
                        <button type="submit" class="btn btn-success">Guardar datos</button>
                      </div>
                    </div>
                  </form>
            </div>         
         </div> 
       </div>
    </div>     
@endsection