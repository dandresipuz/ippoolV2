@extends('adminlte::page')

@section('title', 'Lista de áreas')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1><i class="fa fa-fw fa-th-list"></i> Lista de Áreas</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header py-4">
                    <a class="btn btn-sm btn-success" href="{{ route('admin.areas.create') }}"><i
                            class="fa fa-fw fa-plus"></i>
                        Agregar
                        área</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Área</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas as $area)
                                {{-- @foreach ($area->user as $user) --}}
                                <tr @if ($area->active == 0) class="table table-danger" @else class="table" @endif>
                                    <td>{{ $area->nombre }}</td>
                                    <td width="150px">
                                        <a href="{{ url('admin/areas/' . $area->id) }}" class="btn btn-sm btn-primary"><i
                                                class="fa fa-fw fa-info-circle"></i></a>
                                        <a href="{{ url('admin/areas/' . $area->id . '/edit') }}"
                                            class="btn btn-sm btn-warning"><i class="fa fa-fw fa-pen"></i></a>
                                        <form action="{{ url('admin/areas/' . $area->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger btn-delete"><i
                                                    class="fa fa-fw fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            @endforeach
                        </tbody>
                    </table>
                    {{ $areas->links('pagination::bootstrap-4') }}
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
            $('.btn-delete').click(function(event) {
                Swal.fire({
                    title: 'Está segur@?',
                    text: 'Desea eliminar este registro',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonColor: '#e3342f',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#1e5f74',
                    confirmButtonText: 'Aceptar',
                }).then((result) => {
                    if (result.value) {
                        $(this).parent().submit();
                    }
                });
            });
        });
    </script>
@endsection
