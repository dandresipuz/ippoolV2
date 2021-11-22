@extends('adminlte::page')

@section('title', 'Detalles de la IP')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-info-circle"></i> Detalles de la IP</h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.ipaddresses.index') }}">
                            <i class="fa fa-fw fa-th-list"></i> Lista de direcciones IP
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-info"></i>
                        Detalles de la IP
                    </li>
                </ol>
            </nav>
            <hr>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <table @if ($ipaddress->estado == 0) class="table table-success table-striped table-hover" @else class="table table-striped table-hover" @endif>
                        <tr>
                            <th>Dirección IP</th>
                            <td>{{ $ipaddress->ipaddress }}</td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td>
                                @if ($ipaddress->estado == 1)
                                    <button type="button" class="btn btn-outline-danger">Ocupada <i
                                            class="far fa-fw fa-sad-tear"></i></button>
                                @else
                                    <button type="button" class="btn btn-outline-success">Libre <i
                                            class="fas fa-fw fa-laugh-wink"></i></button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tipo de servicio</th>
                            <td>
                                @if ($ipaddress->service != '')
                                    {{ $ipaddress->service }}
                                @else
                                    <p class="text-success">Sin asignación</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>ID del servicio</th>
                            <td>
                                @if ($ipaddress->service != '')
                                    {{ $ipaddress->idservice }}
                                @else
                                    <p class="text-success">Sin asignación</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Empresa</th>
                            <td>
                                @if ($ipaddress->empresa_id != null)
                                    {{ $ipaddress->empresa->empresa }}
                                @else
                                    <p class="text-success">Sin asignación</p>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
