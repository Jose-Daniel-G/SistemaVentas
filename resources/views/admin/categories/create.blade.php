@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
<h1>Crear Nueva Categoría</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Ingrese el nombre de la categoría">
                
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descripcion</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}" placeholder="Ingrese el nombre de la categoría">
                
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" placeholder="Ingrese el slug de la categoría">
                
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
