@extends('adminlte::page')

@section('title', 'Liberar IP')

@section('content_header')
    <h1><i class="fa fa-fw fa-info-circle"></i> Liberar IP</h1>
    <nav aria-label="breadcrumb" class="pt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('release/empresas') }}">
                    <i class="fa fa-fw fa-th-list"></i> Lista de empresas
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fas fa-fw fa-expand-alt"></i>
                Liberar IP de la empresa {{ $empresa->empresa }}
            </li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Empresa</th>
                            <td>{{ $empresa->empresa }}</td>
                        </tr>
                        <tr>
                            <th>Documento</th>
                            <td>{{ $empresa->tipo_doc }} {{ $empresa->documento }}</td>
                        </tr>
                        <tr>
                            <th>Tipo de canal</th>
                            <td>
                                <h5><span class="badge badge-info"><i class="fas fa-fw fa-broadcast-tower"></i> Datos
                                        {{ COUNT($vprns) }}</span></h5>
                                <h5><span class="badge badge-warning"><i class="fas fa-fw fa-ethernet"></i> Internet
                                        {{ COUNT($ips) }}</span></h5>
                            </td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td>
                                @if ($empresa->active == 1)
                                    <button class="btn btn-sm btn-success">
                                        <i class="fa fa-check"></i> Activo
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-skull-crossbones"></i> Inactivo
                                    </button>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="accordion" id="ip">
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                Listado de IP's Loopback Asignadas
                            </button>
                        </h2>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#ip">
                        <div class="card-body">
                            @if (COUNT($ips) != 0)
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">IP Loopback</th>
                                            <th scope="col">ID de servicio</th>
                                            <th scope="col">Servicio</th>
                                            <th scope="col" width="50px"><input class="form-check-input" type="checkbox"
                                                    value="" id="checkAll"> Marcar
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ips as $ip)
                                            <tr id="ipid{{ $ip->id }}">
                                                <td>{{ $ip->ipaddress }}</td>
                                                <td>{{ $ip->idservice }}</td>
                                                <td>{{ $ip->service }}</td>
                                                <td width="50px">
                                                    <input class="form-check-input checkBoxClass" type="checkbox" name="ids"
                                                        value="{{ $ip->id }}" id="checkOne">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a class="btn btn-sm btn-warning mt-3" id="liberarIp"
                                    href="{{ url('release/ipaddress') }}"><i class="fa fa-fw fa-unlink"></i>
                                    Liberar IP</a>
                            @else
                                <p class="text-center">No existen registros para la empresa
                                    {{ $empresa->empresa }}.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function(e) {
            $("#checkAll").click(function() {
                $(".checkBoxClass").prop('checked', $(this).prop('checked'));
            })
            $('#liberarIp').click(function(e) {
                e.preventDefault();
                var allids = [];
                $('input:checkbox[name=ids]:checked').each(function() {
                    allids.push($(this).val());
                });
                Swal.fire({
                    position: 'top-end',
                    title: 'Está seguro?',
                    text: 'Desea liberar estos recursos',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonColor: '#e3342f',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#1e5f74',
                    confirmButtonText: 'Aceptar',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "post",
                            url: "{{ url('release/ipaddress') }}",
                            data: {
                                _token: $("input[name=_token]").val(),
                                ids: allids,
                            },
                            success: function(response) {
                                $.each(allids, function(key, val) {
                                    $('#ipid' + val).remove();
                                    Swal.fire({
                                        // position: 'top-end',
                                        title: 'Ok!',
                                        text: "Se liberó la Ip seleccionada",
                                        confirmButtonColor: '#1e5f74',
                                        confirmButtonText: 'Aceptar'
                                    });
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
