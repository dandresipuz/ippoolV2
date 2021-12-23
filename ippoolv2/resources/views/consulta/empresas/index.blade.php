@extends('adminlte::page')

@section('title', 'Lista de empresas')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('content_header')
    <h1><i class="fa fa-fw fa-th-list"></i> Lista de empresas</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header py-4">
            <a class="btn btn-sm btn-success" href="{{ route('admin.empresas.create') }}"><i class="fa fa-fw fa-plus"></i>
                Agregar
                empresa</a>
        </div>
        <div class="card-body">
            <table class="table table-hover" id="empresatable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="d-none d-sm-table-cell">Tipo de documento</th>
                        <th scope="col" class="d-none d-sm-table-cell">Documento</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Segmento</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr @if ($empresa->active == 0) class="table table-danger" @else class="table" @endif>
                            <td class="d-none d-sm-table-cell">{{ $empresa->tipo_doc }}</td>
                            <td class="d-none d-sm-table-cell">{{ $empresa->documento }}</td>
                            <td>{{ $empresa->empresa }}</td>
                            <td>{{ $empresa->segmento }}</td>
                            <td width="110px">
                                <a href="{{ url('admin/empresas/' . $empresa->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fa fa-fw fa-info-circle"></i></a>
                                <a href="{{ url('admin/empresas/' . $empresa->id . '/edit') }}"
                                    class="btn btn-sm btn-warning"><i class="fa fa-fw fa-pen"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#empresatable').DataTable({
            responsive: true,
            autoWidth: false,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontró ningún registro",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No se encontraron registros",
                "infoFiltered": "(Filtrado de _MAX_ registros en total)",
                "search": "Buscar: ",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
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
        });
    </script>
@endsection
