<form action="#" method="post">
  @csrf
  @method('DELETE')

  {{-- <a href="{{ route('user.edit', $id) }}"> <i class="ni ni-shop mr-3"></i></a> --}}
  <a href="#" class="btn btn-danger btn-sm">Edit</a>
  <a href="#" class="btn btn-warning btn-sm">Show</a>
  <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-danger"
    onclick="return confirm('Are you sure?')">
</form>