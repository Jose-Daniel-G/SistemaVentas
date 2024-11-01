@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Proveedor</h1>
@stop

@section('content')
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Datos del proveedor</h3></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Empresa</label><b>*</b>
                            <p>{{ $provider->company }}</p>

                            @error('company')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Proveedor</label><b>*</b>
                            <p>{{ $provider->name }}</p>

                            @error('company')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Direccion</label><b>*</b>
                            <p>{{ $provider->address }}</p>

                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Telefono</label><b>*</b>
                            <p>{{ $provider->phone }}</p>

                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Celular</label><b>*</b>
                            <p>{{ $provider->cellphone }}</p>

                            @error('cellphone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Correo</label><b>*</b>
                            <p>{{ $provider->email }}</p>

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="btn btn-secondary" onclick="history.back()">Regresar</button>

                        <button type="submit" class="btn btn-primary">Crear proveedor</button>
                    </div>
                </div>

            </div>
        </div>

    @stop

    @section('js')
        <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $("#name").stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                });
            });
        </script>
    @endsection
