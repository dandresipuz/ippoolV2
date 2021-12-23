@extends('adminlte::page')

@section('title', 'Detalles WAN')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-info-circle"></i> Detalles WAN</h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('lista/wansolarwind') }}">
                            <i class="fa fa-fw fa-th-list"></i> Lista WAN
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-info"></i>
                        Detalles WWAN
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
                    <table @if ($wansolarwind->estado == 0) class="table table-success table-striped table-hover" @else class="table table-striped table-hover" @endif>
                        <tr>
                            <th>VLAN ID</th>
                            <td>{{ $wansolarwind->vlanid }}</td>
                        </tr>
                        <tr>
                            <th>VPRN</th>
                            <td>
                                @if ($wansolarwind->empresa_id != null)
                                    {{ $wansolarwind->vprn }}
                                @else
                                    <p class="text-success">Sin asignación</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Red Wan 1</th>
                            <td>{{ $wansolarwind->redwanuno }}</td>
                        </tr>
                        <tr>
                            <th>Red Wan 2</th>
                            <td>{{ $wansolarwind->redwandos }}</td>
                        </tr>
                        <tr>
                            <th>BOG-RTDN-3</th>
                            <td>{{ $wansolarwind->ipbogrtdntres }}</td>
                        </tr>
                        <tr>
                            <th>BOG-GC-1</th>
                            <td>{{ $wansolarwind->ipboggcuno }}</td>
                        </tr>
                        <tr>
                            <th>BOG-41000</th>
                            <td>{{ $wansolarwind->ipbog41000 }}</td>
                        </tr>
                        <tr>
                            <th>BOG-GC-2</th>
                            <td>{{ $wansolarwind->ipboggcdos }}</td>
                        </tr>
                        <tr>
                            <th>Empresa</th>
                            <td>
                                @if ($wansolarwind->empresa_id != null)
                                    {{ $wansolarwind->empresa->empresa }}
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
