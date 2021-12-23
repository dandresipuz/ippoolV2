@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-industry"></i> Crear empresa</h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('lista/empresas') }}">
                            <i class="fa fa-fw fa-th-list"></i> Lista de empresas
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-pen"></i>
                        Crear empresa
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
                    <form method="POST" action="{{ url('lista/empresas') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <input type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa"
                                value="{{ old('empresa') }}" placeholder="Empresa" autofocus>

                            @error('empresa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="tipo_doc" class="form-control @error('tipo_doc') is-invalid @enderror">
                                <option value="">Tipo de documento</option>
                                <option value="NIT" @if (old('tipo_doc') == 'NIT') selected @endif>NIT</option>
                                <option value="CC" @if (old('tipo_doc') == 'CC') selected @endif>CC</option>
                            </select>

                            @error('tipo_doc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control @error('documento') is-invalid @enderror"
                                name="documento" value="{{ old('documento') }}" placeholder="Número de documento"
                                autofocus>

                            @error('documento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="segmento" class="form-control @error('segmento') is-invalid @enderror">
                                <option value="">Segmento...</option>
                                <option value="Empresas" @if (old('segmento') == 'Empresas') selected @endif>Empresas</option>
                                <option value="Juridicas" @if (old('segmento') == 'Juridicas') selected @endif>Juridicas</option>
                                <option value="Negocios" @if (old('segmento') == 'Negocios') selected @endif>Negocios</option>
                            </select>

                            @error('segmento')
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
