@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-network-wired"></i> Agregar IP</h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.ipaddresses.index') }}">
                            <i class="fa fa-fw fa-th-list"></i> Lista de IP's
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-pen"></i>
                        Agregar IP
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
                    <form method="POST" action="{{ route('admin.ipaddresses.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('ipaddress') is-invalid @enderror"
                                name="ipaddress" value="{{ old('ipaddress') }}" placeholder="Dirección IP" autofocus>

                            @error('ipaddress')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <select name="ipaddress" class="form-control @error('ipaddress') is-invalid @enderror">
                                <option value="">Seleccionar dirección IP</option>
                                @foreach ($ips as $ip)
                                    <option value="{{ $ip->id }}" @if ($ip->id == old('ipaddress')) selected @endif>{{ $ip->ipaddress }}
                                    </option>
                                @endforeach
                            </select>

                            @error('ipaddress')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <select name="service" class="form-control @error('service') is-invalid @enderror">
                                <option value="">Seleccione tipo de servicio...</option>
                                <option value="Internet" @if (old('service') == 'Internet') selected @endif>Internet</option>
                                <option value="Troncal SIP" @if (old('service') == 'Troncal SIP') selected @endif>Troncal SIP</option>
                                <option value="Datos" @if (old('service') == 'Datos') selected @endif>Datos</option>
                                <option value="Global LAN" @if (old('service') == 'Global LAN') selected @endif>Global LAN</option>
                            </select>

                            @error('service')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('idservice') is-invalid @enderror"
                                name="idservice" value="{{ old('idservice') }}" placeholder="Identificador de servicio"
                                autofocus>

                            @error('idservice')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="empresa_id" class="form-control @error('empresa_id') is-invalid @enderror">
                                <option value="">Seleccionar empresa...</option>
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}" @if ($empresa->id == old('empresa_id')) selected @endif>
                                        {{ $empresa->empresa }}
                                    </option>
                                @endforeach
                            </select>

                            @error('empresa_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                Guardar
                                <i class="fa fa-fw fa-save"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
