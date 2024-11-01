@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Compras/Registro de una nueva compra</h1>
@stop

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">LLene los campos</h3>
    </div>
        <div class="card-body">
            <form action="{{ route('admin.shopping.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="amount">Cantidad</label>
                            <input type="number" name="amount" id="amount" class="form-control bg-warning"
                                value="{{ old('amount') }}" placeholder="Ingrese la cantidad">
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="email">Email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal"><i class="fas fa-search"></i></button>
                            <a href="{{ route('admin.products.create')}}" class="btn btn-success" ><i class="fas fa-plus"></i></a>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" name="date" id="date" class="form-control"
                                value="{{ old('date') }}" placeholder="Ingrese la fecha">
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table-striped table-bordered table-sm table-hover">
                            <thead>
                                <tr style="background-color: #767c7efb">
                                    <th>Nro</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Costo</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí puedes añadir los datos de la tabla -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Crear categoría</button>
            </form>

        </div>


    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="products" class="table table-striped table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Accion</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Stock</th>
                                <th>Precio compra</th>
                                <th>Precio venta</th>
                                <th>Imagen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 1; ?>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $contador++ }}</td>
                                    <td><button type="button" class="btn btn-info">Seleccionar</button></td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td style=" background-color: #eadaa8">{{ $product->stock }}</td>
                                    <td>{{ $product->purchase_price }}</td>
                                    <td>{{ $product->sale_price }}</td>

                                    <td><img src="{{ asset('storage/' . $product->image) }}" width="80px" alt="logo">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
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
