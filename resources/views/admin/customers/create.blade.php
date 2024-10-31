@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Cliente/Registro de un nuevo cliente</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-headr">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.customers.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="customer_name">Nombre Cliente</label>
                            <input type="text" name="customer_name" class="form-control"
                                placeholder="Ingrese el nombre de la categoría" value="{{old('customer_name')}}" required>

                            @error('customer_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nit_code">Nit/Codigo del cliente</label>
                            <input type="text" name="nit_code" class="form-control"
                                placeholder="Ingrese el nombre de la categoría" value="{{old('nit')}}" required>

                            @error('nit_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefono</label>
                            <input type="number" name="phone" class="form-control"
                                placeholder="Ingrese el nombre de la categoría" value="{{old('phone')}}" required>

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Correo del cliente</label>
                            <input type="email" name="email" class="form-control"
                                placeholder="Ingrese el nombre de la categoría" value="{{old('email')}}" required>

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                  

                        <button type="submit" class="btn btn-primary">Crear categoría</button>
                    </form>
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
