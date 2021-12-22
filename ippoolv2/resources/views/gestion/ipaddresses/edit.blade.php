@extends('adminlte::page')

@section('title', 'Modificar IP')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-edit"></i>Asignando la IP {{ $ipaddress->ipaddress }}</h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('resource/ipaddresses') }}">
                            <i class="fa fa-fw fa-th-list"></i> Lista de IP's
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-pen"></i>
                        Asignando IP
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
                    <form method="POST" action="{{ url('admin/ipaddresses/' . $ipaddress->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $ipaddress->id }}">
                        <div class="form-group">
                            <input type="text" class="form-control @error('ipaddress') is-invalid @enderror"
                                name="ipaddress" value="{{ old('ipaddress', $ipaddress->ipaddress) }}" readonly autofocus>

                            @error('ipaddress')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

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
                                Actualizar
                                <i class="fa fa-fw fa-save"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            @if (session('message'))
                Swal.fire({
                // position: 'top-end',
                title: 'Perfecto :) ',
                text: "{{ session('message') }}",
                confirmButtonColor: '#1e5f74',
                confirmButtonText: 'Aceptar'
                });
            @endif
        });
    </script>
@endsection
