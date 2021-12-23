@extends('adminlte::page')

@section('title', 'Lista WAN disponibles')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('content_header')

@stop

@section('content')
    <div class="card">
        <div class="card-header py-4">
            <h1><i class="fa fa-fw fa-th-list"></i> Lista de WAN's disponibles</h1>
        </div>
        <div class="card-body">
            <table class="table table-hover" id="wantable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">VLAN ID</th>
                        <th scope="col">VPRN</th>
                        <th scope="col">Red Wan 1</th>
                        <th scope="col">Red Wan 2</th>
                        <th scope="col">BOG-RTDN-3</th>
                        <th scope="col">BOG-GC-1</th>
                        <th scope="col">BOG-41000</th>
                        <th scope="col">BOG-GC-2</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wansolarwinds as $wan)
                        <tr @if ($wan->estado == 1) class="table table-danger" @else class="table" @endif>
                            <td>{{ $wan->vlanid }}</td>
                            <td>
                                @if ($wan->empresa_id != null)
                                    {{ $wan->vprn }}
                                @else
                                    <p class="text-success">Sin asignación</p>
                                @endif
                            </td>
                            <td>{{ $wan->redwanuno }}</td>
                            <td>{{ $wan->redwandos }}</td>
                            <td>{{ $wan->ipbogrtdntres }}</td>
                            <td>{{ $wan->ipboggcuno }}</td>
                            <td>{{ $wan->ipbog41000 }}</td>
                            <td>{{ $wan->ipboggcdos }}</td>
                            <td>
                                <a href="{{ url('resource/wansolarwinds/' . $wan->id . '/edit') }}"
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
        $('#wantable').DataTable({
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
            $('.btn-excel').click(function(event) {
                $('#file').click();
            });
            $('#file').change(function(event) {
                $(this).parent().submit();
            });
        });
    </script>
@endsection
