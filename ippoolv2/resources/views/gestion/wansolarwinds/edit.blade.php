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
                        <a href="{{ url('resource/wansolarwinds') }}">
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
                    @if ($wansolarwind->estado == 0)
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
                    @else
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>VLAN ID</th>
                                <td>{{ $wansolarwind->vlanid }}</td>
                            </tr>
                            <tr>
                                <th>VPRN</th>
                                <td>
                                    @if ($wansolarwind->empresa_id != null)
                                        {{ $wansolarwind->vprn }}
                                    @else
                                        <p class="text-success">Sin asignación</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Red Wan 1</th>
                                <td>{{ $wansolarwind->redwanuno }}</td>
                            </tr>
                            <tr>
                                <th>Red Wan 2</th>
                                <td>{{ $wansolarwind->redwandos }}</td>
                            </tr>
                            <tr>
                                <th>BOG-RTDN-3</th>
                                <td>{{ $wansolarwind->ipbogrtdntres }}</td>
                            </tr>
                            <tr>
                                <th>BOG-GC-1</th>
                                <td>{{ $wansolarwind->ipboggcuno }}</td>
                            </tr>
                            <tr>
                                <th>BOG-41000</th>
                                <td>{{ $wansolarwind->ipbog41000 }}</td>
                            </tr>
                            <tr>
                                <th>BOG-GC-2</th>
                                <td>{{ $wansolarwind->ipboggcdos }}</td>
                            </tr>
                            <tr>
                                <th>Empresa</th>
                                <td>
                                    @if ($wansolarwind->empresa_id != null)
                                        {{ $wansolarwind->empresa->empresa }}
                                    @else
                                        <p class="text-success">Sin asignación</p>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    @endif
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
