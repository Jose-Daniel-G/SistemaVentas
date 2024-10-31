@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
<h1>Proveedor/Listado de Proveedores</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{ session('info') }}</strong></div>
@endif

<div class="card">
    <div class="card-header"><a href="{{ route('admin.providers.create') }}" class="btn btn-secondary">Agregar Categoría</a></div>
    <div class="card-body">
        <table id="providers" class="table table-striped">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Empresa</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Celular</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($providers as $provider)
                <tr>
                    <td>{{ $provider->id }}</td>
                    <td>{{ $provider->company }}</td>
                    <td>{{ $provider->address }}</td>
                    <td>{{ $provider->phone }}</td>
                    <td>{{ $provider->email }}</td>
                    <td>{{ $provider->cellphone }}</td>
                    <td width="10px">
                        <a href="{{ route('admin.providers.edit', $provider) }}" class="btn btn-primary btn-sm">   <i class="fas fa-edit"></i>
                            </a>
                    </td>
                    
                    <td width="10px">
                        <form id="delete-form-{{ $provider->id }}"
                            action="{{ route('admin.providers.destroy', $provider->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger"
                                onclick="confirmDelete({{ $provider->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
@section('js')
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.colVis.min.js"></script>
<script>
    new DataTable('#providers', {
        responsive: true,
        autoWidth: false,
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
        language: {
            decimal: "",
            emptyTable: "No hay datos disponibles en la tabla",
            info: "Mostrando _START_ a _END_ de _TOTAL_ providers",
            infoEmpty: "Mostrando 0 a 0 de 0 providers",
            infoFiltered: "(filtrado de _MAX_ providers totales)",
            lengthMenu: "Mostrar _MENU_ providers",
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