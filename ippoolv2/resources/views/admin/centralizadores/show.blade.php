@extends('adminlte::page')

@section('title', 'Detalles de centralizador')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-info-circle"></i> Detalles del centralizador</h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.centralizadores.index') }}">
                            <i class="fa fa-fw fa-th-list"></i> Lista de centralizadores
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-info"></i>
                        Detalles del centralizador
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
                    <table @if ($centralizador->active == 0) class="table table-danger table-striped table-hover" @else class="table table-striped table-hover" @endif>
                        <tr>
                            <th>Nombre Completo:</th>
                            <td>{{ $centralizador->nombre . ' ' . $centralizador->apellido }}</td>
                        </tr>
                        <tr>
                            <th>Documento</th>
                            <td>{{ $centralizador->tipo_doc }} {{ $centralizador->documento }}</td>
                        </tr>
                        <tr>
                            <th>Correo Electrónico:</th>
                            <td>{{ $centralizador->email }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $centralizador->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                @if ($centralizador->active == 1)
                                    <button class="btn btn-success">
                                        <i class="fa fa-check"></i> Activo
                                    </button>
                                @else
                                    <button class="btn btn-danger">
                                        <i class="fas fa-skull-crossbones"></i> Inactivo
                                    </button>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
