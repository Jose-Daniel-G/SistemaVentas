@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
<h1>Proveedor</h1>
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Datos registrados</h3>
        </div>
    <div class="card-body">
        <form action="{{ route('admin.providers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="company">Empresa</label><b>*</b>
                <input value="{{ old('company')}}" type="text" name="company" class="form-control" placeholder="Ingrese el nombre de la empresa">
                
                @error('company')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Proveedor</label><b>*</b>
                <input value="{{ old('name')}}" type="text" name="name" class="form-control" placeholder="Ingrese el proveedor de la empresa">
                
                @error('company')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Direccion</label><b>*</b>
                <input value="{{ old('address')}}" type="text" name="address" class="form-control" placeholder="Ingrese la direccion de la empresa">
                
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Telefono</label><b>*</b>
                <input value="{{ old('phone')}}" type="text" name="phone" class="form-control" placeholder="Ingrese el celular de la empresa">
                
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="cellphone">Celular</label><b>*</b>
                <input value="{{ old('cellphone')}}" type="text" name="cellphone" class="form-control" placeholder="Ingrese el celular de la empresa">
                
                @error('cellphone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Correo</label><b>*</b>
                <input value="{{ old('email')}}" type="text" name="email" class="form-control" placeholder="Ingrese el email de la company">
                
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-secondary" onclick="history.back()">Regresar</button>
            
            <button type="submit" class="btn btn-primary">Crear proveedor</button>
        </form>
    </div>
</div>

@stop

@section('js')
<script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
<script>
    $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    });
</script>
@endsection
