@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{ session('info') }}</strong></div>
@endif
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" placeholder="Ingrese el nombre de la categoría">
                
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}" placeholder="Ingrese el slug de la categoría" readonly>
                
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar categoría</button>
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
