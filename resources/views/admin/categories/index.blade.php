@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Categorías/Listado de Categorías</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success"><strong>{{ session('info') }}</strong></div>
    @endif

    <div class="card card-outline card-primary">
        <div class="card-headr">
            <h3 class="card-title">Categorías registradas</h3>
        </div>
        <div class="card-header"><a href="{{ route('admin.categories.create') }}" class="btn btn-secondary">Agregar
                Categoría</a></div>
        <div class="card-body">
            <table id="categories" class="table table-striped table-bordered table-hover table-sm">

                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td width="10px">
                                <div class="btn-group" role="group" aria-label="basic example">

                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="delete-form-{{ $category->id }}"
                                        action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete({{ $category->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        new DataTable('#categories', {
            responsive: true,
            autoWidth: false,
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
            language: {
                decimal: "",
                emptyTable: "No hay datos disponibles en la tabla",
                info: "Mostrando _START_ a _END_ de _TOTAL_ categories",
                infoEmpty: "Mostrando 0 a 0 de 0 categories",
                infoFiltered: "(filtrado de _MAX_ categories totales)",
                lengthMenu: "Mostrar _MENU_ categories",
                loadingRecords: "Cargando...",
                search: "Buscar:",
                zeroRecords: "No se encontraron registros coincidentes",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior"
                }
            }
        });

        function confirmDelete(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Enviar el formulario si el usuario confirma
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
