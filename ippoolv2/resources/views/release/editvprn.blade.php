@extends('adminlte::page')

@section('title', 'Liberar Recursos')

@section('content_header')
    <h1><i class="fa fa-fw fa-info-circle"></i> Liberar Recursos</h1>
    <nav aria-label="breadcrumb" class="pt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('release/empresas') }}">
                    <i class="fa fa-fw fa-th-list"></i> Lista de empresas
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fas fa-fw fa-expand-alt"></i>
                Liberar recursos de la empresa {{ $empresa->empresa }}
            </li>
        </ol>
    </nav>
    <hr>
@stop
@section('content')
    <div class="card">
        <div class="card-header py-4">
            <table class="table table-hover" id="empresatable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="d-none d-sm-table-cell">Tipo de documento</th>
                        <th scope="col" class="d-none d-sm-table-cell">Documento</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Segmento</th>

                    </tr>
                </thead>
                <tbody>
                    <tr @if ($empresa->active == 0) class="table table-danger" @else class="table" @endif>
                        <td class="d-none d-sm-table-cell">{{ $empresa->tipo_doc }}</td>
                        <td class="d-none d-sm-table-cell">{{ $empresa->documento }}</td>
                        <td>{{ $empresa->empresa }}</td>
                        <td>{{ $empresa->segmento }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-body">
            @if (COUNT($vprns) != 0)
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">VPRN</th>
                            <th scope="col">VLAN</th>
                            <th scope="col">Red Wan 1</th>
                            <th scope="col" class="d-none d-sm-table-cell">Red Wan 2</th>
                            <th scope="col" class="d-none d-sm-table-cell">IP BOG-RTDN-3</th>
                            <th scope="col" class="d-none d-sm-table-cell">IP BOG-GC-1</th>
                            <th scope="col" class="d-none d-sm-table-cell">IP BOG-41000</th>
                            <th scope="col" class="d-none d-sm-table-cell">IP BOG-GC-2</th>
                            <th scope="col" width="50px"><input class="form-check-input" type="checkbox" value=""
                                    id="vprnCheckAll"> Liberar
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vprns as $vprn)
                            <tr id="vprnid{{ $vprn->id }}">
                                <td>{{ $vprn->vprn }}</td>
                                <td>{{ $vprn->vlanid }}</td>
                                <td>{{ $vprn->redwanuno }}</td>
                                <td class="d-none d-sm-table-cell">{{ $vprn->redwandos }}</td>
                                <td class="d-none d-sm-table-cell">{{ $vprn->ipbogrtdntres }}</td>
                                <td class="d-none d-sm-table-cell">{{ $vprn->ipboggcuno }}</td>
                                <td class="d-none d-sm-table-cell">{{ $vprn->ipbog41000 }}</td>
                                <td class="d-none d-sm-table-cell">{{ $vprn->ipboggcdos }}</td>
                                <td width="50px">
                                    <input class="form-check-input vprnCheckBoxClass" type="checkbox" name="ids"
                                        value="{{ $vprn->id }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-sm btn-warning mt-3" id="liberarVprn" href="{{ url('release/wansolarwind') }}"><i
                        class="fa fa-fw fa-unlink"></i>
                    Liberar VPRN</a>
            @else
                <p class="text-center">No existen registros para la empresa {{ $empresa->empresa }}.</p>
            @endif
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function(e) {
            $("#vprnCheckAll").click(function() {
                $(".vprnCheckBoxClass").prop('checked', $(this).prop('checked'));
            })
            $('#liberarVprn').click(function(e) {
                e.preventDefault();
                var vprnallids = [];
                $('input:checkbox[name=ids]:checked').each(function() {
                    vprnallids.push($(this).val());
                });
                $.ajax({
                    type: "post",
                    url: "{{ url('release/wansolarwind') }}",
                    data: {
                        _token: $("input[name=_token]").val(),
                        ids: vprnallids,
                    },
                    success: function(response) {
                        $.each(vprnallids, function(key, val) {
                            $('#vprnid' + val).remove();
                            Swal.fire({
                                // position: 'top-end',
                                title: 'Ok!',
                                text: "Se liberó la VPRN seleccionada",
                                confirmButtonColor: '#1e5f74',
                                confirmButtonText: 'Aceptar'
                            });
                        });
                    }
                });
            });
        });
    </script>
@endsection
