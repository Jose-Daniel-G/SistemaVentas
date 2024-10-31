@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Informacion del producto</h1>
@stop

@section('content')
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Datos registrados</h3>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <p>{{ $product->category->name }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <p>{{ $product->code }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <p>{{ $product->name }}</p>
                        {{-- <p>{{ dd($product)}}</p> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <img src="{{ asset('storage/' . $product->image) }}" width="80px" alt=";ogo">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <p class="form-control" style="background-color: #e4d8b6; width:50px; text-align:center;">{{ $product->stock }}</p>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="stock_min">Stock minimo</label>
                                <p>{{ $product->stock_min }}</p>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="stock_max">Stock maximo</label>
                                <p>{{ $product->stock_max }}</p>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="purchase_price">Precio de Compra</label>
                                <p>{{ $product->purchase_price }}</p>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="sale_price">Precio de Venta</label>
                                <p>{{ $product->sale_price }}</p>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="admission_date">Fecha ingreso</label>
                                <p>{{ $product->admission_date }}</p>

                            </div>
                        </div>
                    </div>
            
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <p>{{ $product->description }}</p>


                    </div>
                </div>
            </div>
            <button class="btn btn-secondary" onclick="history.back()">Regresar</button>

        </div>
    @stop

    @section('js')

    @stop
