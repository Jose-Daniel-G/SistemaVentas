@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Compras/Registro de una nueva compra</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.shopping.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="amount">Cantidad</label>
                            <input type="number" name="amount" id="amount" class="form-control"
                                values="{{ old('amount') }}" placeholder="Ingrese el amount de la categoría" readonly>

                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" name="date" id="date" class="form-control"
                                values="{{ old('date') }}" placeholder="Ingrese el nombre de la categoría">

                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="form-group">
                    <label for="voucher">Comprobante</label>
                    <input type="text" name="voucher" id="voucher" class="form-control" values="{{ old('voucher') }}"
                        placeholder="Ingrese el voucher de la categoría" readonly>

                    @error('voucher')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
            <label for="purchase_sale">Venta</label>
            <input type="text" name="purchase_sale" id="purchase_sale" class="form-control"
                values="{{ old('purchase_sale') }}" placeholder="Ingrese el purchase_sale de la categoría" readonly>

            @error('purchase_sale')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear categoría</button>
        </form>
    </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#voucher',
                space: '-'
            });
        });
    </script>
@endsection
  {{-- <!-- Sección derecha -->
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
</div> --}}