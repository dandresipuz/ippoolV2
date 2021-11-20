@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-address-card"></i> Crear centralizador</h1>
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
                        Crear Centralizador
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
                    <form method="POST" action="{{ route('admin.centralizadores.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                value="{{ old('nombre') }}" placeholder="Nombre" autofocus>

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                value="{{ old('apellido') }}" placeholder="Apellido" autofocus>

                            @error('apellido')
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
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control @error('telefono') is-invalid @enderror"
                                name="telefono" value="{{ old('telefono') }}" placeholder="Telefono" autofocus>

                            @error('telefono')
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
