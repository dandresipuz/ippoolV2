@extends('adminlte::page')

@section('title', 'Lista de áreas')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1><i class="fa fa-fw fa-th-list"></i> Lista de Áreas</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header py-4">
                    <a class="btn btn-sm btn-success" href="{{ route('admin.areas.create') }}"><i
                            class="fa fa-fw fa-plus"></i>
                        Agregar
                        área</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="areatable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Área</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas as $area)
                                {{-- @foreach ($area->user as $user) --}}
                                <tr @if ($area->active == 0) class="table table-danger" @else class="table" @endif>
                                    <td>{{ $area->nombre }}</td>
                                    <td width="90px">
                                        <a href="{{ url('admin/areas/' . $area->id) }}" class="btn btn-sm btn-primary"><i
                                                class="fa fa-fw fa-info-circle"></i></a>
                                        <a href="{{ url('admin/areas/' . $area->id . '/edit') }}"
                                            class="btn btn-sm btn-warning"><i class="fa fa-fw fa-pen"></i></a>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
        $('#areatable').DataTable({
            responsive: true,
            autoWidth: false,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
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
            @if (session('error'))
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                });
            @endif
            $('.btn-delete').click(function(event) {
                Swal.fire({
                    title: 'Está segur@?',
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
