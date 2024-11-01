@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
<h1>Proveedor</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.providers.update', $providers) }}" method="POST">
            @csrf
            @method('PUT');
            <div class="form-group">
                <label for="company">Empresa</label><b>*</b>
                <input value="{{ $provider->company}}" type="text" name="company" class="form-control" placeholder="Ingrese el nombre de la empresa">
                
                @error('company')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Proveedor</label><b>*</b>
                <input value="{{ $provider->name}}" type="text" name="name" class="form-control" placeholder="Ingrese el proveedor de la empresa">
                
                @error('company')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Direccion</label><b>*</b>
                <input value="{{ $provider->address}}" type="text" name="address" class="form-control" placeholder="Ingrese la direccion de la empresa">
                
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Telefono</label><b>*</b>
                <input value="{{ $provider->phone}}" type="text" name="phone" class="form-control" placeholder="Ingrese el celular de la empresa">
                
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="cellphone">Celular</label><b>*</b>
                <input value="{{ $provider->cellphone}}" type="text" name="cellphone" class="form-control" placeholder="Ingrese el celular de la empresa">
                
                @error('cellphone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Correo</label><b>*</b>
                <input value="{{ $provider->email}}" type="text" name="email" class="form-control" placeholder="Ingrese el email de la company">
                
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-secondary" onclick="history.back()">Regresar</button>
            
            <button type="submit" class="btn btn-primary">Actualizar proveedor</button>
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
