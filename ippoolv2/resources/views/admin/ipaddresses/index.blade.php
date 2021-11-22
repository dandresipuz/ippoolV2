@extends('adminlte::page')

@section('title', 'Lista de IP\'s')

@section('content_header')
    <h1><i class="fa fa-fw fa-th-list"></i> Lista de direcciones IP</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header py-4">
            <a class="btn btn-sm btn-success" href="{{ route('admin.ipaddresses.create') }}"><i
                    class="fa fa-fw fa-plus"></i>
                Agregar
                IP</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Dirección IP</th>
                        <th scope="col" class="d-none d-sm-table-cell">Estado</th>
                        <th scope="col">Servicio</th>
                        <th scope="col" class="d-none d-sm-table-cell">ID de servicio</th>
                        <th scope="col" class="d-none d-sm-table-cell">Empresa</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ipaddresses as $ipaddress)
                        <tr @if ($ipaddress->estado == 1) class="table table-danger" @else class="table" @endif>
                            <td>{{ $ipaddress->ipaddress }}</td>
                            <td class="d-none d-sm-table-cell">
                                @if ($ipaddress->estado == 1)
                                    <button type="button" class="btn btn-outline-danger">Ocupada <i
                                            class="far fa-fw fa-sad-tear"></i></button>
                                @else
                                    <button type="button" class="btn btn-outline-success">Libre <i
                                            class="fas fa-fw fa-laugh-wink"></i></button>
                                @endif
                            </td>
                            <td>
                                @if ($ipaddress->service != '')
                                    {{ $ipaddress->service }}
                                @else
                                    <p class="text-success">Sin asignación</p>
                                @endif
                            </td>
                            <td class="d-none d-sm-table-cell">
                                @if ($ipaddress->service != '')
                                    {{ $ipaddress->idservice }}
                                @else
                                    <p class="text-success">Sin asignación</p>
                                @endif
                            </td>
                            <td class="d-none d-sm-table-cell">
                                @if ($ipaddress->empresa_id != null)
                                    {{ $ipaddress->empresa->empresa }}
                                @else
                                    <p class="text-success">Sin asignación</p>
                                @endif
                            </td>
                            <td width="110px">
                                <a href="{{ url('admin/ipaddresses/' . $ipaddress->id) }}"
                                    class="btn btn-xs btn-primary float-right"><i class="fa fa-fw fa-info-circle"></i></a>

                                {{-- Editar y eliminar IP, opciones deshabilitadas a solicitud del cliente --}}

                                {{-- <a href="{{ url('admin/ipaddresses/' . $ipaddress->id . '/edit') }}"
                                    class="btn btn-xs btn-warning"><i class="fa fa-fw fa-pen"></i></a>
                                <form action="{{ url('admin/ipaddresses/' . $ipaddress->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-xs btn-danger btn-delete"><i
                                            class="fa fa-fw fa-trash-alt"></i></button> --}}
                                {{--  --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ipaddresses->links('pagination::simple-bootstrap-4') }}
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
