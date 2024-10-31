@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
<h1>Proveedor</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Ingrese el nombre de la categoría">
                
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" class="form-control" placeholder="Ingrese el slug de la categoría" readonly>
                
                @error('slug')
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
    $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    });
</script>
@endsection
