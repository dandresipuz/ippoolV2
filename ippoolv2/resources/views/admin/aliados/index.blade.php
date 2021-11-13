@extends('adminlte::page')

@section('title', 'Lista de aliados')

@section('content_header')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1><i class="fa fa-fw fa-th-list"></i> Lista de Aliados</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header py-4">
                    <a class="btn btn-sm btn-success" href="{{ route('admin.aliados.create') }}"><i
                            class="fa fa-fw fa-plus"></i>
                        Agregar
                        aliado</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Aliado</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aliados as $aliado)
                                {{-- @foreach ($aliado->user as $user) --}}
                                <tr @if ($aliado->active == 0) class="table table-danger" @else class="table" @endif>
                                    <td>{{ $aliado->nombre }}</td>
                                    <td width="150px">
                                        <a href="{{ url('admin/aliados/' . $aliado->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fa fa-fw fa-info-circle"></i></a>
                                        <a href="{{ url('admin/aliados/' . $aliado->id . '/edit') }}"
                                            class="btn btn-sm btn-warning"><i class="fa fa-fw fa-pen"></i></a>
                                        <form action="{{ url('admin/aliados/' . $aliado->id) }}" method="POST"
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
                    {{ $aliados->links('pagination::bootstrap-4') }}
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
                    title: 'Está segur@ O.o?',
                    text: 'Desea eliminar este registro?',
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
