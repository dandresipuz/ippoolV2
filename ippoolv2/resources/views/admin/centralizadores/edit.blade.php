@extends('adminlte::page')

@section('title', 'Editar centralizador')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-edit"></i>Editar a {{ $centralizador->nombre }} {{ $centralizador->apellido }}
                </h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.centralizadores.index') }}">
                            <i class="fa fa-fw fa-th-list"></i> Lista de centralizadores
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-pen"></i>
                        Editar centralizador
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
                    <form method="POST" action="{{ url('admin/centralizadores/' . $centralizador->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $centralizador->id }}">
                        <div class="form-group">
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                value="{{ old('nombre', $centralizador->nombre) }}" autofocus>

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                value="{{ old('apellido', $centralizador->apellido) }}" autofocus>

                            @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="tipo_doc" class="form-control @error('tipo_doc') is-invalid @enderror">
                                <option value="">Seleccionar tipo de documento</option>
                                <option value="NIT" @if (old('tipo_doc', $centralizador->tipo_doc) == 'NIT') selected @endif>NIT</option>
                                <option value="CC" @if (old('tipo_doc', $centralizador->tipo_doc) == 'CC') selected @endif>CC</option>
                            </select>

                            @error('tipo_doc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control @error('documento') is-invalid @enderror"
                                name="documento" value="{{ old('documento', $centralizador->documento) }}" autofocus>

                            @error('documento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email', $centralizador->email) }}" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control @error('telefono') is-invalid @enderror"
                                name="telefono" value="{{ old('telefono', $centralizador->telefono) }}" autofocus>

                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="active" class="form-control @error('active') is-invalid @enderror">
                                <option value="">Seleccione un estado</option>
                                <option value="1" @if (old('active', $centralizador->active) == 1) selected @endif>Activo</option>
                                <option value="0" @if (old('active', $centralizador->active) == 0) selected @endif>Inactivo</option>
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
