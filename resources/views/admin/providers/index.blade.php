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
        <div class="card-header"><a href="{{ route('admin.providers.create') }}" class="btn btn-secondary">Agregar
                Categoría</a></div>
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
                            {{-- <td>dd({{ $provider }})</td> --}}
                            <td>{{ $provider->id }}</td>
                            <td>{{ $provider->company }}</td>
                            <td>{{ $provider->address }}</td>
                            <td>{{ $provider->phone }}</td>
                            <td>{{ $provider->email }}</td>
                            <td>{{ $provider->name }}</td>
                            <td> <a href="https://wa.me/{{ $company->zip_code . ' ' . $company->zip_code }}"
                                    class="btn btn-success"><i class="fab fa-whatsapp"></i>
                                    {{ $provider->cellphone }}</a></td>
                            <td width="10px">
                                <div class="btn-group" role="group" aria-label="basic example">
                                    <a href="{{ route('admin.providers.show', $provider->id) }}"
                                        class="btn btn-info btn-sm"><i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.providers.edit', $provider) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form id="delete-form-{{ $provider->id }}"
                                        action="{{ route('admin.providers.destroy', $provider->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete({{ $provider->id }})">
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
    <script src="https://"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
