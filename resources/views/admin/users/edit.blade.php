@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de reservas </h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>Modificar usuario: {{ $user->name }}</h1>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Datos a llenar</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role">Nombre del rol</label>
                                        <select name="role" id="role_id" class="form-control">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" {{ $role->name  == $user->roles->pluck('name')->implode(',') ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Nombre del usuario </label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $user->name }}" required>
                                        @error('nombre')
                                            <small class="bg-danger text-white p-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $user->email }}" required>
                                    </div>
                                    @error('email')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password">Contrasena</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    @error('password')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password_confirmation">Verificacion de contrasena</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                    @error('password_confirmation')
                                        <small class="bg-danger text-white p-1">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                                            Cancelar
                                            {{-- <i class="fa-solid fa-plus"></i> --}}
                                        </a>
                                        <button type="submit" class="btn btn-success">Actualizar usuario</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
