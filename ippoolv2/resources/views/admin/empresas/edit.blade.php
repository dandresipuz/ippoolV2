@extends('adminlte::page')

@section('title', 'Editar empresa')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-edit"></i>Editar a {{ $empresa->empresa }}</h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.empresas.index') }}">
                            <i class="fa fa-fw fa-th-list"></i> Lista de empresas
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-pen"></i>
                        Editar Empresa
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
                    <form method="POST" action="{{ url('admin/empresas/' . $empresa->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $empresa->id }}">
                        <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <input type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa"
                                value="{{ old('empresa', $empresa->empresa) }}" autofocus>

                            @error('empresa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="tipo_doc" class="form-control @error('tipo_doc') is-invalid @enderror">
                                <option value="">Seleccionar tipo de documento</option>
                                <option value="NIT" @if (old('tipo_doc', $empresa->tipo_doc) == 'NIT') selected @endif>NIT</option>
                                <option value="CC" @if (old('tipo_doc', $empresa->tipo_doc) == 'CC') selected @endif>CC</option>
                            </select>

                            @error('tipo_doc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control @error('documento') is-invalid @enderror"
                                name="documento" value="{{ old('documento', $empresa->documento) }}" autofocus>

                            @error('documento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('segmento') is-invalid @enderror" name="segmento"
                                value="{{ old('segmento', $empresa->segmento) }}" autofocus>

                            @error('segmento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="active" class="form-control @error('active') is-invalid @enderror">
                                <option value="">Seleccione un estado</option>
                                <option value="1" @if (old('active', $empresa->active) == 1) selected @endif>Activo</option>
                                <option value="0" @if (old('active', $empresa->active) == 0) selected @endif>Inactivo</option>
                            </select>

                            @error('active')
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
