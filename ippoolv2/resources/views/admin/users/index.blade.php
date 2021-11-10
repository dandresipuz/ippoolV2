@extends('adminlte::page')

@section('title', 'Lista de usuarios')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header py-4">
            <a class="btn btn-sm btn-success" href="{{ route('admin.users.create') }}"><i class="fa fa-fw fa-plus"></i>
                Agregar
                usuario</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="d-none d-sm-table-cell table-dark">Nombre</th>
                        <th scope="col" class="d-none d-sm-table-cell table-dark">Login</th>
                        <th scope="col" class="table-dark">Email</th>
                        <th scope="col" class="d-none d-sm-table-cell table-dark">Perfil</th>
                        <th scope="col" class="d-none d-sm-table-cell table-dark">Empresa</th>
                        <th scope="col" class="d-none d-sm-table-cell table-dark">Area</th>
                        <th scope="col" class="d-none d-sm-table-cell table-dark">Empresa</th>
                        <th scope="col" class="table-dark"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)

                        <tr class="table">
                            <td class="d-none d-sm-table-cell">{{ $user->nombre . ' ' . $user->apellido }}</td>
                            <td class="d-none d-sm-table-cell">{{ $user->login }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-none d-sm-table-cell">{{ $user->perfil }}</td>
                            <td class="d-none d-sm-table-cell">{{ $user->empresa->nombre }}</td>
                            <td class="d-none d-sm-table-cell">{{ $user->area->nombre }}</td>
                            <td>
                                <a href="{{ url('admin/users/' . $user->id) }}" class="btn btn-xs btn-primary"><i
                                        class="fa fa-fw fa-search"></i></a>
                                <a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                    class="btn btn-xs btn-warning"><i class="fa fa-fw fa-pen"></i></a>
                                <form action="{{ url('admin/users/' . $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-xs btn-danger btn-delete"><i
                                            class="fa fa-fw fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
