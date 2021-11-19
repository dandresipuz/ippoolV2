@extends('adminlte::page')

@section('title', 'Detalles de la empresa')

@section('content_header')
    <h1><i class="fa fa-fw fa-info-circle"></i> Detalles de la empresa</h1>
    <nav aria-label="breadcrumb" class="pt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.empresas.index') }}">
                    <i class="fa fa-fw fa-th-list"></i> Lista de empresas
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fa fa-info"></i>
                Detalles de la empresa
            </li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <table @if ($empresa->active == 0) class="table table-danger table-striped table-hover" @else class="table table-striped table-hover" @endif>
                        <tr>
                            <th>Empresa</th>
                            <td>{{ $empresa->empresa }}</td>
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
                            <th>Estado:</th>
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
        <div class="col-sm-3">
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
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    @if (COUNT($services) != 0)
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">IP Loopback</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ips as $ip)
                                                    <tr>
                                                        <td>{{ $ip->ipaddress }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
        </div>
        <div class="col-sm-3">
            <div class="accordion" id="service">
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                                Listado de Servicios Asignados
                            </button>
                        </h2>
                    </div>

                    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#service">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    @if (COUNT($services) != 0)
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Servicios</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($services as $service)
                                                    <tr>
                                                        <td>{{ $service->service }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
        </div>
    </div>
    <div class="accordion" id="vlan">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Lista de VLAN asignadas
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#vlan">
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vprns as $vprn)
                                    <tr>
                                        <td>{{ $vprn->vprn }}</td>
                                        <td>{{ $vprn->vlanid }}</td>
                                        <td>{{ $vprn->redwanuno }}</td>
                                        <td class="d-none d-sm-table-cell">{{ $vprn->redwandos }}</td>
                                        <td class="d-none d-sm-table-cell">{{ $vprn->ipbogrtdntres }}</td>
                                        <td class="d-none d-sm-table-cell">{{ $vprn->ipboggcuno }}</td>
                                        <td class="d-none d-sm-table-cell">{{ $vprn->ipbog41000 }}</td>
                                        <td class="d-none d-sm-table-cell">{{ $vprn->ipboggcdos }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center">No existen registros para la empresa {{ $empresa->empresa }}.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
