@extends('adminlte::page')

@section('title', 'Lista de centralizadores')

@section('content_header')
    <h1><i class="fa fa-fw fa-th-list"></i> Lista de centralizadores</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header py-4">
            <a class="btn btn-sm btn-success" href="{{ route('admin.centralizadores.create') }}"><i
                    class="fa fa-fw fa-plus"></i>
                Agregar
                centralizador</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col" class="d-none d-sm-table-cell">Tipo de documento</th>
                        <th scope="col">Documento</th>
                        <th scope="col" class="d-none d-sm-table-cell">Email</th>
                        <th scope="col" class="d-none d-sm-table-cell">Telefono</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($centralizadores as $centralizador)
                        <tr @if ($centralizador->active == 0) class="table table-danger" @else class="table" @endif>
                            <td>
                                {{ $centralizador->nombre . ' ' . $centralizador->apellido }}</td>
                            <td class="d-none d-sm-table-cell">{{ $centralizador->tipo_doc }}</td>
                            <td>{{ $centralizador->documento }}</td>
                            <td class="d-none d-sm-table-cell">{{ $centralizador->email }}</td>
                            <td class="d-none d-sm-table-cell">{{ $centralizador->telefono }}</td>
                            <td width="110px">
                                <a href="{{ url('admin/centralizadores/' . $centralizador->id) }}"
                                    class="btn btn-xs btn-primary"><i class="fa fa-fw fa-info-circle"></i></a>
                                <a href="{{ url('admin/centralizadores/' . $centralizador->id . '/edit') }}"
                                    class="btn btn-xs btn-warning"><i class="fa fa-fw fa-pen"></i></a>
                                <form action="{{ url('admin/centralizadores/' . $centralizador->id) }}" method="POST"
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
            {{ $centralizadores->links('pagination::bootstrap-4') }}
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
