@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-edit"></i>Editar a {{ $user->nombre }} {{ $user->apellido }}</h1>
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/users/' . $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group">
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                value="{{ old('nombre', $user->nombre) }}" autofocus>

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                value="{{ old('apellido', $user->apellido) }}" autofocus>

                            @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror"
                                name="login" value="{{ old('login', $user->login) }}" disabled>

                            @error('login')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email', $user->email) }}" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control @error('telefono') is-invalid @enderror"
                                name="telefono" value="{{ old('telefono', $user->telefono) }}" autofocus>

                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="perfil" class="form-control @error('perfil') is-invalid @enderror">
                                <option value="">Seleccionar perfil</option>
                                <option value="Admin" @if (old('perfil') == 'Admin') selected @endif>Admin</option>
                                <option value="Gestion" @if (old('perfil') == 'Gestion') selected @endif>Gestion</option>
                                <option value="Consulta" @if (old('perfil') == 'Consulta') selected @endif>Consulta</option>
                            </select>

                            @error('perfil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="empresa_id" class="form-control @error('empresa_id') is-invalid @enderror">
                                <option value="">Seleccionar empresa...</option>
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}" @if ($empresa->id == old('empresa_id', $user->empresa_id)) selected @endif>{{ $empresa->nombre }}
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
                            <select name="area_id" class="form-control @error('area_id') is-invalid @enderror">
                                <option value="">Seleccionar área...</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}" @if ($area->id == old('area_id', $user->area_id)) selected @endif>{{ $area->nombre }}
                                    </option>
                                @endforeach
                            </select>

                            @error('area_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Contraseña">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <p class="text-danger py-4"> La contraseña debe tener entre 8 y 16 caracteres, al menos un
                                dígito,
                                al menos una minúscula y al menos una mayúscula.
                                Puede tener otros símbolos.</p>
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirmar contraseña">
                        </div> --}}
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
