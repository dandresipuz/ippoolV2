@extends('adminlte::page')

@section('title', 'Lista de clientes')

@section('content_header')
    <h1><i class="fa fa-fw fa-th-list"></i> Lista de clientes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header py-4">
            <a class="btn btn-sm btn-success" href="{{ route('admin.clientes.create') }}"><i class="fa fa-fw fa-plus"></i>
                Agregar
                cliente</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nit</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Canal</th>
                        <th scope="col" class="d-none d-sm-table-cell">Contacto</th>
                        <th scope="col" class="d-none d-sm-table-cell">Teléfono</th>
                        <th scope="col" class="d-none d-sm-table-cell">Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr @if ($cliente->active == 0) class="table table-danger" @else class="table" @endif>
                            <td>{{ $cliente->nit }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->canal }}</td>
                            <td class="d-none d-sm-table-cell">{{ $cliente->contacto }}</td>
                            <td class="d-none d-sm-table-cell">{{ $cliente->telefono }}</td>
                            <td class="d-none d-sm-table-cell">{{ $cliente->email }}</td>
                            <td width="110px">
                                <a href="{{ url('admin/clientes/' . $cliente->id) }}" class="btn btn-xs btn-primary"><i
                                        class="fa fa-fw fa-info-circle"></i></a>
                                <a href="{{ url('admin/clientes/' . $cliente->id . '/edit') }}"
                                    class="btn btn-xs btn-warning"><i class="fa fa-fw fa-pen"></i></a>
                                <form action="{{ url('admin/clientes/' . $cliente->id) }}" method="POST"
                                    class="d-inline">
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
            {{ $clientes->links('pagination::simple-bootstrap-4') }}
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
