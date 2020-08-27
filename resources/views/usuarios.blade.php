@extends('plantilla_admin')

@section('estilos_css')
 <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
 {{-- datatables css  --}}
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

@endsection

@section('content')
@if(Session::has('userDestroy'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Aviso! </strong> {{ Session::get('userDestroy') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(Session::has('estadoUser'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> OK! </strong> {{ Session::get('estadoUser') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Negocios</h3>
            </div>

          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush" id="user-table">
            <thead class="thead-light">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">E-mail</th>
                <th scope="col">Fecha</th>
                <th scope="col">&nbsp;</th>
                {{-- <th scope="col">Editar</th>
                <th scope="col">Eliminar</th> --}}
                {{-- <th scope="col"></th> --}}
              </tr>
            </thead>
            {{-- <tbody>
              @foreach ($users as $user)
                <tr>
                  <th scope="row">{{ $user->id }}</th>
                  <th scope="row">{{ $user->name }}</th>
                  <td>
                    <i class="bg-danger"></i>
                    <span class="status">{{ $user->email }}</span>
                  </td>
                  <td><span class="badge badge-success">Admin</span></td>
                  <td>
                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">Editar</a>
                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-dark">Ver</a>
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                  </form>
                  </td>
                </tr>
              @endforeach
            </tbody> --}}
            <tbody></tbody>
            <tfoot>
              <tr>
                <td></td>
                <td>
                  <input type="text" class="form-control filter-input" placeholder="Search name" data-column="1" />
                </td>
                <td>
                  <input type="text" class="form-control filter-input" placeholder="Search email" data-column="2" />
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <select data-column="1" class="form-control filter-select">
                    <option value="">Select name</option>
                    @foreach ($names as $name)
                      <option value="{{ $name }}">{{ $name }}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <select data-column="2" class="form-control filter-select">
                    <option value="">Select email</option>
                    @foreach ($emails as $email)
                    <option value="{{ $email }}">{{ $email }}</option>
                    @endforeach
                  </select>
                </td>
                <td></td>
                <td></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="card-footer border-0">
          {{-- {{ $users->links() }} --}}
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
{{-- Datatables js --}}
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>

{{-- ********************************************************************* --}}
<script>
    $(document).ready(function(){
    var table = $('#user-table').DataTable({
      processing: true,
      serverSider: true,
      ajax: '{!! route('dataTableUser') !!}',
      columns: [
        {data: 'id'},
        {data: 'name'},
        {data: 'email'},
        {data: 'created_at'},
        {data: 'btn' },
        // {data: 'edit'},
        // {data: 'delete'}
      ],
    
      
      "dom": 'lrtip',
      "language":{
        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        // "info": "_TOTAL_ registros",
        // "search": "Buscar",
        // "paginate":{
        //   "next": "siguiente",
        //   "previous": "anterior"
        // },
        // "lengthMenu": 'Mostrar <select>' +
        //               '<option value="10">10</option>'+
        //               '<option value="50">50</option>'+
        //               '</select> registros',
        // "loadingRecords": "Cargando...",
        // "processing": "Procesando",
        // "emptyTable": "No hay registros",
        // "zeroRecords": "Sin registros"
      }
    });
    // text search
    $('.filter-input').keyup(function(){
      table.column($(this).data('column'))
      .search($(this).val())
      .draw();
    });
    // dropdown
    $('.filter-select').change(function(){
    table.column($(this).data('column'))
    .search($(this).val())
    .draw();
    });
  });
</script>
{{-- ********************************************************************* --}}


@endpush