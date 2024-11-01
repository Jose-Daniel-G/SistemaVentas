@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Compras - Registro de una nueva compra</h1>
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Llene los campos</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.shopping.store') }}" id="form_shop" method="POST">
                @csrf


                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="amount">Cantidad</label>
                                    <input type="number" name="amount" id="amount" class="form-control"
                                        style="background-color: #e2d5b4" value="{{ old('amount') }}"
                                        placeholder="Ingrese la cantidad">
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="code">Código</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                    </div>
                                    <input id="code" type="text" name="code" class="form-control"
                                        placeholder="Código" value="{{ old('code') }}">
                                    {{-- @error('code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                                </div>
                            </div>

                            <div class="col-md-2 d-flex align-items-end mb-3">
                                
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a href="{{ route('admin.products.create') }}" class="btn btn-success ml-2">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped table-bordered table-sm table-hover">
                                    <thead>
                                        <tr style="background-color: #767c7efb">
                                            <th>Nro</th>
                                            <th>Código</th>
                                            <th>Cantidad</th>
                                            <th>Nombre</th>
                                            <th>Costo</th>
                                            <th>Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter = 1;
                                        $total_amount = 0;
                                        $total_purchase = 0; ?>
                                        @foreach ($tmp_shopping as $tmp_shopping)
                                            <tr>
                                                <td>{{ $counter++ }}</td>

                                                <td>{{ $tmp_shopping->product->code }}</td>
                                                <td>{{ $tmp_shopping->amount }}</td>
                                                <td>{{ $tmp_shopping->product->name }}</td>
                                                <td>{{ $tmp_shopping->product->purchase_price }}</td>
                                                <td>{{ $cost = $tmp_shopping->amount * $tmp_shopping->product->purchase_price }}
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                        data-id="{{ $tmp_shopping->id }}">
                                                        <i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @php
                                                $total_amount += $tmp_shopping->amount;
                                                $total_purchase += $cost;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <td colspan="2" class="text-center"><b>Total cantidad productos</b></td>
                                            <td><b>{{ $total_amount }}</b></td>
                                            <td colspan="2" class="text-center"><b>Total compra</b> </td>
                                            <td><b>{{ $total_purchase }}</b></td>

                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalProvider">
                                    <i class="fas fa-search"></i> Buscar proveedor
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="" id="company_provider" class="form-control" disabled>
                                <input type="text" name="" id="provider_id" name="provider_id" class="form-control" hidden>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="date">Fecha</label>
                                            <input type="date" name="date" id="date" class="form-control"
                                                value="{{ old('date') }}" placeholder="Ingrese la fecha">
                                            {{-- @error('date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="voucher">Comprobante</label>
                                            <input type="voucher" name="voucher" id="voucher" class="form-control "
                                                value="{{ old('voucher') }}" placeholder="Escruba el Nro del comprobante">
                                            @error('voucher')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="total_price">Precio total</label>
                                    <input type="text" name="total_price" id="total_price"
                                        class="form-control bg-warning text-center" value="{{ $total_purchase }}"
                                        placeholder="Ingrese la fecha">
                                    @error('total_purchase')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-3 btn-block"><i class="fas fa-save"></i> Registrar compra</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>



        </form>
    </div>
    </div>

    <!-- Modal Products-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seleccione un Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="products" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Acción</th>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Stock</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Imagen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td><button type="button" class="btn btn-info select-btn"
                                            data-id="{{ $product->code }}">Seleccionar</button></td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td style="background-color: #eadaa8">{{ $product->stock }}</td>
                                    <td>{{ $product->purchase_price }}</td>
                                    <td>{{ $product->sale_price }}</td>
                                    <td><img src="{{ $product->image }}" width="80px" alt="logo"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Providers -->
    <div class="modal fade" id="modalProvider" tabindex="-1" aria-labelledby="modalProviderLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProviderLabel">Listado de proveedores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="providers" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Acción</th>
                                <th>Empresa</th>
                                <th>Telefono</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @foreach ($providers as $provider)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td><button type="button" class="btn btn-info select-btn-provider"
                                            data-id="{{ $provider->id }}"
                                            data-company="{{ $provider->company }}">Seleccionar</button></td>
                                    <td>{{ $provider->company }}</td>
                                    <td>{{ $provider->phone }}</td>
                                    <td>{{ $provider->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $('.select-btn-provider').click(function() {
            var id_provider = $(this).data('id'); // Obtener el valor de data-id del elemento actual
            var company = $(this).data('company'); // Obtener el valor de data-id del elemento actual
            $('#id_provider').val(id_provider); // Asignar el valor a un elemento con el ID "codigo"
            $('#company_provider').val(company); // Asignar el valor a un elemento con el ID "codigo"
            // alert(company); //)
            $('#modalProvider').modal('hide');

        });
        $('.select-btn').click(function() {
            var id_product = $(this).data('id'); // Obtener el valor de data-id del elemento actual
            $('#code').val(id_product); // Asignar el valor a un elemento con el ID "codigo"
            $('#exampleModal').modal('hide');

        });
        // $('#exampleModal').on('hidden.bs.modal', function() {
        //     $('#code').focus():
        // });
        // Configuración global para incluir el token CSRF en todas las solicitudes AJAX
        $('.delete-btn').click(function() {
            var id = $(this).data('id'); // Obtener el ID del botón que se ha hecho clic
            var row = $(this).closest('tr'); // Obtener la fila correspondiente (ajusta esto según tu estructura)

            $.ajax({
                url: "{{ route('admin.shopping.tmp_shopping.destroy', '') }}/" + id,
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE',
                },
                success: function(response) {
                    if (response.success) {
                        // Eliminar la fila de la tabla
                        row.fadeOut(300, function() {
                            $(this).remove(); // Eliminar la fila del DOM
                        });

                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "El producto se eliminó",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        alert('No se pudo eliminar el producto');
                    }
                },
                error: function(error) {
                    console.error('Error en la solicitud:', error);
                    alert('Error en la solicitud');
                }
            });
        });

        // Cambiar keypress a keydown para asegurar la detección de Enter
        $('#form_shop').on('keydown', function(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
            }
        });

        // Capturar el Enter en el campo "code"
        $("#code").on('keyup', function(e) {
            if (e.keyCode === 13) {
                var code = $(this).val();
                var amount = $('#amount').val();

                if (code.length > 0) {
                    $.ajax({
                        url: "{{ route('admin.shopping.tmp_shopping') }}",
                        method: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            code: code,
                            amount: amount
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "El registro el producto",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            } else {
                                alert('no se encontró el producto');
                            }
                        },
                        error: function(error) {
                            console.error('Error en la solicitud:', error);
                            alert('Error en la solicitud');
                        }
                    });
                }
            }
        });
    </script>
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
    <script>
        new DataTable('#providers', {
            responsive: true,
            autoWidth: false,
            // dom: 'Bfrtip',
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
            pageLength: 5,
            language: {
                decimal: "",
                emptyTable: "No hay datos disponibles en la tabla",
                info: "Mostrando _START_ a _END_ de _TOTAL_ proveedores",
                infoEmpty: "Mostrando 0 a 0 de 0 proveedores",
                infoFiltered: "(filtrado de _MAX_ proveedores totales)",
                lengthMenu: "Mostrar _MENU_ proveedores",
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
