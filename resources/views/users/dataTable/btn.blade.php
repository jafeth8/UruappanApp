<form action="{{ route('eliminarUsuario',$id) }}" method="post">
  @csrf
  @method('DELETE')

  {{-- <a href="{{ route('user.edit', $id) }}"> <i class="ni ni-shop mr-3"></i></a> --}}
    <input type="submit" name="submit" value="Eliminar" class="btn btn-sm btn-danger" 
    onclick="return confirm('Esta seguro de eliminar este negocio?')">
</form>