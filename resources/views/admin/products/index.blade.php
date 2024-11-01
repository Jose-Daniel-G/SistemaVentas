@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Productos/Listado de productos</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success"><strong>{{ session('info') }}</strong></div>
    @endif
    <div class="card card-outline card-primary">
        <div class="card-headr">
            <h3 class="card-title">Productos registrados</h3>
        </div>
        <div class="card-header"><a href="{{ route('admin.products.create') }}" class="btn btn-secondary">Agregar Producto</a>
        </div>
        <div class="card-body">
            <table id="products" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th>Precio compra</th>
                            <th>Precio venta</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td style=" background-color: #eadaa8">{{ $product->stock }}</td>
                            <td>{{ $product->purchase_price }}</td>
                            <td>{{ $product->sale_price }}</td>
                            
                            <td><img src="{{ asset('storage/'.$product->image) }}" width="80px" alt="logo"></td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.products.show', $product) }}" class="btn btn-info btn-sm"><i
                                            class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.products.destroy', $product) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
        new DataTable('#products', {
            responsive: true,
            autoWidth: false,
            // dom: 'Bfrtip',
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
            pageLength: 5,
            language: {
                decimal: "",
                emptyTable: "No hay datos disponibles en la tabla",
                info: "Mostrando _START_ a _END_ de _TOTAL_ productos",
                infoEmpty: "Mostrando 0 a 0 de 0 productos",
                infoFiltered: "(filtrado de _MAX_ productos totales)",
                lengthMenu: "Mostrar _MENU_ productos",
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
