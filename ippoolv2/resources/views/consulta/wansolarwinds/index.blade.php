@extends('adminlte::page')

@section('title', 'Lista VPRN')

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
            <h1><i class="fa fa-fw fa-th-list"></i> Lista VPRN</h1>
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
                    @foreach ($wans as $wan)
                        <tr class="table">
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
                                <a href="{{ url('lista/wansolarwind/' . $wan->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fa fa-fw fa-info-circle"></i></a>
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
    </script>
@endsection
