@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fa fa-fw fa-edit"></i>Editar a {{ $user->nombre }} {{ $user->apellido }}</h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-fw fa-th-list"></i> Lista de usuarios
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-pen"></i>
                        Editar Usuario
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
                            <select name="tipo_doc" class="form-control @error('tipo_doc') is-invalid @enderror">
                                <option value="">Seleccionar tipo de documento</option>
                                <option value="NIT" @if (old('tipo_doc', $user->tipo_doc) == 'NIT') selected @endif>NIT</option>
                                <option value="CC" @if (old('tipo_doc', $user->tipo_doc) == 'CC') selected @endif>CC</option>
                            </select>

                            @error('tipo_doc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control @error('documento') is-invalid @enderror"
                                name="documento" value="{{ old('documento', $user->documento) }}" autofocus>

                            @error('documento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="login" value="{{ $user->login }}">
                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror"
                                name="login" value="{{ old('login', $user->login) }}" disabled readonly>

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
                            <select name="active" class="form-control @error('active') is-invalid @enderror">
                                <option value="">Seleccione un estado</option>
                                <option value="1" @if (old('active', $user->active) == 1) selected @endif>Activo</option>
                                <option value="0" @if (old('active', $user->active) == 0) selected @endif>Inactivo</option>
                            </select>

                            @error('active')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="perfil" class="form-control @error('perfil') is-invalid @enderror">
                                <option value="">Seleccionar perfil</option>
                                <option value="Admin" @if (old('perfil', $user->perfil) == 'Admin') selected @endif>Admin</option>
                                <option value="Gestion" @if (old('perfil', $user->perfil) == 'Gestion') selected @endif>Gestion</option>
                                <option value="Consulta" @if (old('perfil', $user->perfil) == 'Consulta') selected @endif>Consulta</option>
                            </select>

                            @error('perfil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="role" class="form-control @error('perfil') is-invalid @enderror">
                                <option value="">Seleccionar Rol</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('perfil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="aliado_id" class="form-control @error('aliado_id') is-invalid @enderror">
                                <option value="">Seleccionar aliado...</option>
                                @foreach ($aliados as $aliado)
                                    <option value="{{ $aliado->id }}" @if ($aliado->id == old('aliado_id', $user->aliado_id)) selected @endif>{{ $aliado->nombre }}
                                    </option>
                                @endforeach
                            </select>

                            @error('aliado_id')
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

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Cambiar contraseña
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                placeholder="Contraseña">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <p class="text-danger py-4"> La contraseña debe tener entre 8 y 16 caracteres,
                                                al menos un
                                                dígito,
                                                al menos una minúscula y al menos una mayúscula.
                                                Puede tener otros símbolos.</p>
                                        </div>

                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" placeholder="Confirmar contraseña">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                    Actualizar
                                    <i class="fa fa-fw fa-save"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
