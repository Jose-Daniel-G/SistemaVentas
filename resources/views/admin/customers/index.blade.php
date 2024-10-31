@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Listado de Clientes</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success"><strong>{{ session('info') }}</strong></div>
    @endif

    <div class="card">
        <div class="card-header"><a href="{{ route('admin.customers.create') }}" class="btn btn-secondary">Agregar
                Categoría</a></div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Rol de usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-sm"> <i
                                        class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="post"
                                    onclick="ask{{ $category->id }}(event)" id="miForm{{ $shop->id }}"">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script>
        function ask{{ $shop->id }}(event) {
            event.preventDefault();
            Swal.fire({
                title: "Desea eliminar este registro",
                text: '',
                icon: 'question',
                showDenyButton: true,
                confirmButtonColor: '#a5161d',
                confirmButtonText: 'Eliminar',
                denyButtonColor: '#270a0a',
                confirmButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = $('#miForm{{ $shop->id }}');
                    form.submit();
                    // document.getElementById('form-' + $shop->id).submit();
                } else if (result.isDenied) {
                    Swal.fire('Registro cancelado', '', 'info');
                }
            });
        }
    </script>
@endsection
