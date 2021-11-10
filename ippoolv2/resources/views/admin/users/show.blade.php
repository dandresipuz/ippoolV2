@extends('adminlte::page')

@section('title', 'Detalles de usuario')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-info-circle"></i> Detalles del usuario</h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-fw fa-th-list"></i> Lista de usuarios
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-info"></i>
                        Detalles del usuario
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
                    <table @if ($user->active == 0) class="table table-danger table-striped table-hover" @else class="table table-striped table-hover" @endif>
                        <tr>
                            <th>Nombre Completo:</th>
                            <td>{{ $user->nombre . ' ' . $user->apellido }}</td>
                        </tr>
                        <tr>
                            <th>Login:</th>
                            <td>{{ $user->login }}</td>
                        </tr>
                        <tr>
                            <th>Correo Electrónico:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>{{ $user->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Empresa:</th>
                            <td>{{ $user->empresa->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Área</th>
                            <td>{{ $user->area->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Perfil:</th>
                            <td>
                                @if ($user->perfil == 'Admin')
                                    <i class="fas fa-fw fa-user-ninja"></i> Administrador
                                @elseif($user->perfil == 'Gestion')
                                    <i class="fas fa-fw fa-user-tie"></i>Gestión
                                @else
                                    <i class="fas fa-fw fa-user"></i> Consulta
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                @if ($user->active == 1)
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
