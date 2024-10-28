@extends('adminlte::page')

{{-- @section('title', 'Dashboard') --}}

@section('content_header')
    {{-- <h1> <b>Bienvenido {{$nombre->nombre_empresa}} </b></h1> --}}
    <h1> <b>Roles/Registro de un nuevo rol</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users mr-2"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Roles registrados</span>
                <span class="info-box-number">{{ $total_roles }}</span>
              </div>
            </div>
          </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fa-solid fa-user-check"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Usuarios registrados</span>
                <span class="info-box-number">{{ $total_users}}</span>
              </div>
            </div>
          </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa-solid fa-tags"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Categorias registradas</span>
                <span class="info-box-number">{{ $total_categories}}</span>
              </div>
            </div>
          </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa-brands fa-product-hunt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Productos registrados</span>
                <span class="info-box-number">{{ $total_products}}</span>
              </div>
            </div>
          </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa-solid fa-list"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Proveedores registrados</span>
                <span class="info-box-number">{{ $total_providers}}</span>
              </div>
            </div>
          </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa-solid fa-cart-shopping"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Compras registradas</span>
                <span class="info-box-number">{{ $total_shop}}</span>
              </div>
            </div>
          </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users mr-2"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Clientes registrados</span>
                <span class="info-box-number">{{ $total_users}}</span>
              </div>
            </div>
          </div>
    </div>

@stop

@section('css')

@stop

@section('js')
@stop
