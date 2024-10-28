@extends('adminlte::page')

{{-- @section('title', 'Dashboard') --}}

@section('content_header')
    {{-- <h1> <b>Bienvenido {{$nombre->nombre_empresa}} </b></h1> --}}
    <h1> <b>Listado de roles</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Roles registrados</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/roles/create') }}" class="btn btn-primary"><i class="fas fa-plus">Crear
                                nuevo</i></a>
                    </div>

                </div>
                <div class="card-body">
                    <form action="" method="POST" autocomplete="off">
                        @csrf
                        <table class="table table-striped table-bordered table-hover table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">Nro</th>
                                    <th>Nombre del rol</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td class="text-center">
                                            <div class="btn btn-group" role="group" aria-label="Basic Example">
                                                <a href="{{route('admin.roles.show', $role->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('admin.roles.edit', $role->id)}}" class="btn btn-success btn-sm"><i class="fas fa-pencil"></i></a>
                                                <form action="{{route('admin.roles.destroy', $role->id)}}" method="POST">

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
