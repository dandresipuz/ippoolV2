@extends('adminlte::page')

@section('title', 'Detalles del área')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-info-circle"></i> Detalles del área</h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.areas.index') }}">
                            <i class="fa fa-fw fa-th-list"></i> Lista de áreas
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-info"></i>
                        Detalles del área
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
                    <table @if ($area->active == 0) class="table table-danger table-striped table-hover" @else class="table table-striped table-hover" @endif>
                        <tr>
                            <th>Área:</th>
                            <td>{{ $area->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Usuarios</th>

                            <td>
                                <h5><span class="badge badge-info">Activos {{ COUNT($users_active) }}</span></h5>
                                <h5><span class="badge badge-danger">Inactivos {{ COUNT($users_desactive) }}</span></h5>
                            </td>

                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                @if ($area->active == 1)
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
