@extends('adminlte::page')

@section('title', 'Lista de usuarios')

@section('content_header')
    <h1><i class="fa fa-fw fa-th-list"></i> Lista de usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header py-4">
            <a class="btn btn-sm btn-success" href="{{ route('admin.users.create') }}"><i class="fa fa-fw fa-plus"></i>
                Agregar
                usuario</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="d-none d-sm-table-cell">Nombre</th>
                        <th scope="col" class="d-none d-sm-table-cell">Login</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="d-none d-sm-table-cell">Perfil</th>
                        <th scope="col" class="d-none d-sm-table-cell">Aliado</th>
                        <th scope="col" class="d-none d-sm-table-cell">Area</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr @if ($user->active == 0) class="table table-danger" @else class="table" @endif>
                            <td class="d-none d-sm-table-cell">{{ $user->nombre . ' ' . $user->apellido }}</td>
                            <td class="d-none d-sm-table-cell">{{ $user->login }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-none d-sm-table-cell">{{ $user->perfil }}</td>
                            <td class="d-none d-sm-table-cell">{{ $user->aliado->nombre }}</td>
                            <td class="d-none d-sm-table-cell">{{ $user->area->nombre }}</td>
                            <td>
                                <a href="{{ url('admin/users/' . $user->id) }}" class="btn btn-xs btn-primary"><i
                                        class="fa fa-fw fa-info-circle"></i></a>
                                <a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                    class="btn btn-xs btn-warning"><i class="fa fa-fw fa-pen"></i></a>
                                <form action="{{ url('admin/users/' . $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-xs btn-danger btn-delete"><i
                                            class="fa fa-fw fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            @if (session('message'))
                Swal.fire({
                // position: 'top-end',
                title: 'Perfecto :) ',
                text: "{{ session('message') }}",
                confirmButtonColor: '#1e5f74',
                confirmButtonText: 'Aceptar'
                });
            @endif
            @if (session('error'))
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                });
            @endif
            $('.btn-delete').click(function(event) {
                Swal.fire({
                    title: 'Está seguro?',
                    text: 'Desea eliminar este registro',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonColor: '#e3342f',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#1e5f74',
                    confirmButtonText: 'Aceptar',
                }).then((result) => {
                    if (result.value) {
                        $(this).parent().submit();
                    }
                });
            });
        });
    </script>
@endsection
