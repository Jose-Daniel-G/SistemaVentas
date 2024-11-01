@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Productos/Registro de un nuevo producto</h1>
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Datos registrados</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category">Categoria</label><b>*</b>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Seleccione una categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="code">Code</label><b>*</b>
                            <input type="text" name="code" class="form-control" value="{{ old('code') }}"
                                placeholder="Ingrese el codigo de la producto">

                            @error('code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Nombre</label><b>*</b>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="Ingrese el nombre de la producto">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="image">Imagen</label><b>*</b>
                            <input type="file" class="form-control" id="file" name="logo" placeholder="Ingrese la imagen..."
                                accept=".jpg, .jpeg, .png" required>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            {{-- Visualizar la Imagen --}}
                            <div class="text-center">
                                <output id="list"></output>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="stock">Stock</label><b>*</b>
                                    <input type="number" name="stock" class="form-control" value="{{ old('stock') }}"
                                        placeholder="Ingrese el stock">

                                    @error('stock')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="stock_min">Stock minimo</label><b>*</b>
                                    <input type="number" name="stock_min" class="form-control"
                                        value="{{ old('stock_min') }}" placeholder="Ingrese el stock_min">

                                    @error('stock_min')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="stock_max">Stock maximo</label><b>*</b>
                                    <input type="number" name="stock_max" class="form-control"
                                        value="{{ old('stock_max') }}" placeholder="Ingrese el stock maximo">

                                    @error('stock_max')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="purchase_price">Precio de Compra</label><b>*</b>
                                    <input type="number" name="purchase_price" class="form-control"
                                        value="{{ old('purchase_price') }}" placeholder="Ingrese el nombre de la producto">

                                    @error('purchase_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="sale_price">Precio de Venta</label><b>*</b>
                                    <input type="number" name="sale_price" class="form-control"
                                        value="{{ old('sale_price') }}" placeholder="Ingrese el nombre de la producto">

                                    @error('sale_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="admission_date">Fecha ingreso</label><b>*</b>
                                    <input type="date" name="admission_date" class="form-control"
                                        value="{{ old('admission_date') }}"
                                        placeholder="Ingrese el nombre de la producto">

                                    @error('admission_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="description">Descripcion</label><b>*</b>
                            <textarea name="description" id="description" cols="10" rows="2" class="form-control"></textarea>

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

        </div><button type="submit" class="btn btn-primary">Crear producto</button>
        </form>
    </div>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('file').addEventListener('change', function(evt) {
                var files = evt.target.files; // FileList object
                if (files.length > 0) {
                    var file = files[0]; // Tomamos el primer archivo seleccionado
                    if (!file.type.match('image.*')) {
                        alert("Solo se permiten archivos de imagen.");
                        return;
                    }

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("list").innerHTML =
                            `<img class="thumb thumbnail" src="${e.target.result}" width="100%" title="${file.name}"/>`;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@stop
