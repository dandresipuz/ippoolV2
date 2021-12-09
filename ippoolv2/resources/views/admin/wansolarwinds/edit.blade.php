@extends('adminlte::page')

@section('title', 'Modificar recurso WAN')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-edit"></i>Asignando el recurso {{ $wansolarwind->vlanid }}</h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.wansolarwinds.index') }}">
                            <i class="fa fa-fw fa-th-list"></i> Lista de recursos WAN
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-pen"></i>
                        Asignando el recurso WAN
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
                    <form method="POST" action="{{ url('admin/wansolarwinds/' . $wansolarwind->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $wansolarwind->id }}">
                        <div class="form-group">
                            <label for="vlanid">VLAN ID</label>
                            <input type="text" class="form-control @error('vlanid') is-invalid @enderror" name="vlanid"
                                value="{{ old('vlanid', $wansolarwind->vlanid) }}" readonly autofocus>

                            @error('vlanid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('vprn') is-invalid @enderror" name="vprn"
                                value="{{ old('vprn') }}" placeholder="Escribe el número de VPRN" autofocus>

                            @error('vprn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <input type="text" class="form-control @error('redwanuno') is-invalid @enderror"
                                name="redwanuno" value="{{ old('redwanuno', $wansolarwind->redwanuno) }}" readonly
                                autofocus>

                            @error('redwanuno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('redwandos') is-invalid @enderror"
                                name="redwandos" value="{{ old('redwandos', $wansolarwind->redwandos) }}" readonly
                                autofocus>

                            @error('redwandos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('ipbogrtdntres') is-invalid @enderror"
                                name="ipbogrtdntres" value="{{ old('ipbogrtdntres', $wansolarwind->ipbogrtdntres) }}"
                                readonly autofocus>

                            @error('ipbogrtdntres')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('ipboggcuno') is-invalid @enderror"
                                name="ipboggcuno" value="{{ old('ipboggcuno', $wansolarwind->ipboggcuno) }}" readonly
                                autofocus>

                            @error('ipboggcuno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('ipbog41000') is-invalid @enderror"
                                name="ipbog41000" value="{{ old('ipbog41000', $wansolarwind->ipbog41000) }}" readonly
                                autofocus>

                            @error('ipbog41000')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('ipboggcdos') is-invalid @enderror"
                                name="ipboggcdos" value="{{ old('ipboggcdos', $wansolarwind->ipboggcdos) }}" readonly
                                autofocus>

                            @error('ipboggcdos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
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
