@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="card">
        <div class="card-header py-4">
            <center>
                <h1><i class="fas fa-fw fa-tachometer-alt"></i> Bienvenid@ {{ Auth::user()->nombre }}</h1>
            </center>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-4">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{ COUNT($users) }}
                            </h3>
                            <div class="icon">

                                <i class="fas fa-fw fa-users"></i>
                            </div>
                            Usuarios totales
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                {{ COUNT($usersActive) }}
                            </h3>
                            <div class="icon">

                                <i class="fas fa-fw fa-user-check"></i>
                            </div>
                            Usuarios activos
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                {{ COUNT($usersDisable) }}
                            </h3>
                            <div class="icon">
                                <i class="fas fa-fw fa-users-slash"></i>
                            </div>
                            Usuarios inactivos
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{ COUNT($empresas) }}
                            </h3>
                            <div class="icon">
                                <i class="fas fa-fw fa-industry Header"></i>
                            </div>
                            Empresas totales
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                {{ COUNT($empresasActive) }}
                            </h3>
                            <div class="icon">

                                <i class="fas fa-fw fa-check-square"></i>
                            </div>
                            Empresas activas
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                {{ COUNT($empresasDisable) }}
                            </h3>
                            <div class="icon">
                                <i class="fas fa-fw fa-minus-square"></i>
                            </div>
                            Empresas inactivas
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{ COUNT($ips) }}
                            </h3>
                            <div class="icon">
                                <i class="fas fa-fw fa-ethernet"></i>
                            </div>
                            Direcciones totales
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                {{ COUNT($ipsActive) }}
                            </h3>
                            <div class="icon">

                                <i class="fas fa-fw fa-check-square"></i>
                            </div>
                            Direcciones Disponibles
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                {{ COUNT($ipsDisable) }}
                            </h3>
                            <div class="icon">
                                <i class="fas fa-fw fa-exclamation-triangle"></i>
                            </div>
                            Direcciones ocupadas
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{ COUNT($ips) }}
                            </h3>
                            <div class="icon">
                                <i class="fas fa-fw fa-server"></i>
                            </div>
                            Direcciones totales
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                {{ COUNT($wansActive) }}
                            </h3>
                            <div class="icon">

                                <i class="fas fa-fw fa-check-square"></i>
                            </div>
                            Interconexiones Disponibles
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                {{ COUNT($wansDisable) }}
                            </h3>
                            <div class="icon">
                                <i class="fas fa-fw fa-exclamation-triangle"></i>
                            </div>
                            Interconexiones ocupadas
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
