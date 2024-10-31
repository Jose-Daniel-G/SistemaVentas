@extends('adminlte::page')

@section('title', 'DeveloTech')
@section('css')
    
@endsection
@section('content_header')
    <h1>Compras/Historial de Compras</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success"><strong>{{ session('info') }}</strong></div>
    @endif

    <div class="row">
        <div class="col-md-12">

            <div class="card card-outline card-primary">
                <div class="card-headr">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-header"><a href="{{ route('admin.shopping.create') }}" class="btn btn-secondary">Agregar
                        Categoría</a></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row g-2 align-items-center">
                                <div class="col-auto">
                                    <label for="cantidad" class="form-label">Cantidad *</label>
                                    <input type="number" class="form-control" id="cantidad" value="1" min="1">
                                </div>
                                <div class="col-auto">
                                    <label for="codigo" class="form-label">Código</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                                        <input type="text" class="form-control" id="codigo">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    <button class="btn btn-success"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>
                            <table id="shopping" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Fecha</th>
                                        <th>Proveedor</th>
                                        <th>Precio compra</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shopping as $shops)
                                        <tr>
                                            <td>{{ $shops->id }}</td>
                                            <td>{{ $shops->name }}</td>
                                            <td width="10px">
                                                <a href="{{ route('admin.shopping.edit', $shops) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                            <td width="10px">
                                                <form action="{{ route('admin.shopping.destroy', $shops) }}" method="post"
                                                    onclick="preguntar{{ $shop->id}}(event)" id="miFormulario{{ $shop->id}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Sección derecha -->
                        <div class="col-md-4">
                            <div class="d-grid mb-3">
                                <button class="btn btn-primary">Buscar proveedor</button>
                                <button class="btn btn-secondary mt-2">Proveedor 2</button>
                            </div>
                            <div class="mb-3">
                                <label for="fecha-compra" class="form-label">Fecha de compra *</label>
                                <input type="date" class="form-control" id="fecha-compra" value="2024-10-15">
                            </div>
                            <div class="mb-3">
                                <label for="comprobante" class="form-label">Comprobante *</label>
                                <input type="text" class="form-control" id="comprobante" placeholder="Factura 0001224">
                            </div>
                            <div class="mb-3">
                                <label for="precio-total" class="form-label">Precio total *</label>
                                <input type="text" class="form-control highlighted" id="precio-total" value="515.55"
                                    readonly>
                            </div>
                            <button class="btn btn-success w-100">Actualizar compra</button>
                        </div>
                    </div>
                </div>
            </div>
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
    new DataTable('#shopping', {
        responsive: true,
        autoWidth: false,
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
        language: {
            decimal: "",
            emptyTable: "No hay datos disponibles en la tabla",
            info: "Mostrando _START_ a _END_ de _TOTAL_ shopping",
            infoEmpty: "Mostrando 0 a 0 de 0 shopping",
            infoFiltered: "(filtrado de _MAX_ shopping totales)",
            lengthMenu: "Mostrar _MENU_ shopping",
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

    // function confirmDelete(id) {
    //     Swal.fire({
    //         title: '¿Estás seguro?',
    //         text: "¡No podrás revertir esto!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Sí, eliminar',
    //         cancelButtonText: 'Cancelar'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             // Enviar el formulario si el usuario confirma
    //             document.getElementById('delete-form-' + id).submit();
    //         }
    //     });
    // }
</script>
    <script>
        function preguntar{{ $shop->id }}(event) {
            event.preventDefault();
            Swal.fire({
                title: "Desea eliminar este registro",
                text: '',
                icon: 'question',
                showDenyButton: true,
                confirmButtonColor: '#a5161d',
                confirmButtonText: 'Eliminar',
                denyButtonColor: '#270a0a',
                confirmButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = $('#miFormulario{{$shop->id}}');
                    form.submit();
                    // document.getElementById('form-' + $shop->id).submit();
                } else if (result.isDenied) {
                    Swal.fire('Registro cancelado', '', 'info');
                }
            });
        }
    </script>

@endsection
