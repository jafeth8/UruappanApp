<form action="{{ route('eliminarUsuario',$id) }}" method="post">
  @csrf
  @method('DELETE')
    <a href="{{ route('detallesUser', $id) }}" class="btn btn-info btn-sm">ver datos</a>
    <a href="{{ route('aprobarUsuario', $id) }}" class="btn btn-warning btn-sm"> Aprobar o desaprobar</a>
    <input type="submit" name="submit" value="Eliminar" class="btn btn-sm btn-danger" 
    onclick="return confirm('Esta seguro de eliminar este negocio?')">
</form>