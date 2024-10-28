@extends('adminlte::page')

{{-- @section('title', 'Dashboard') --}}

@section('content_header')
    {{-- <h1> <b>Bienvenido {{$nombre->nombre_empresa}} </b></h1> --}}
    <h1> <b>Roles/Registro de un nuevo rol</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                    {{-- <div class="card-tools">
                        <a href="{{ url('/admin/roles/create')}}" class="btn btn-primary"><i class="fas fa-plus">Crear nuevo</i></a>
                    </div> --}}

                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/roles/create')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre del Rol</label>
                                    <input type="text" name="name" id="name" value="{{ old('name')}}" class="form-control" required>
                                    @error('name')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr><div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre del Rol</label>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Registrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
@stop
