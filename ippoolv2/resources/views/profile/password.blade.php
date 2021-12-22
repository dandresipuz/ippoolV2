@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-header">
                <h1><i class="fas fa-fw fa-lock"></i>Cambiar contraseña</h1>
            </div>
            <nav aria-label="breadcrumb" class="pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin') }}">
                            <i class="fa fa-fw fa-th-list"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fas fa-fw fa-lock"></i>
                        Cambiar tu contraseña
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
                    <form method="POST" action="{{ url('profile/updatepassword') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="alert alert-info" role="alert">
                            La contraseña debe tener entre 8 y 16 caracteres,
                            al menos un
                            dígito,
                            al menos una minúscula y al menos una mayúscula.
                            Puede tener otros símbolos.
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control @error('oldpassword') is-invalid @enderror"
                                name="oldpassword" placeholder="Contraseña antigua">

                            @error('oldpassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Nueva Contraseña">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirmar contraseña">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                Cambiar password
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
            @if (session('error'))
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                });
            @endif
        });
    </script>
@endsection
