<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo de documento</th>
            <th scope="col"># de Documento</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Estado</th>
            <th scope="col">Login</th>
            <th scope="col">Email</th>
            <th scope="col">Perfil</th>
            <th scope="col">Aliado</th>
            <th scope="col">Centralizador</th>
            <th scope="col">Area</th>
            <th scope="col">Fecha de creación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr @if ($user->active == 0) class="table table-danger" @else class="table" @endif>
                <td>{{ $user->nombre . ' ' . $user->apellido }}</td>
                <td>{{ $user->tipo_doc }}</td>
                <td>{{ $user->documento }}</td>
                <td>{{ $user->telefono }}</td>
                @if ($user->active == 0)
                    <td>Inactivo</td>
                @else
                    <td>Activo</td>
                @endif
                <td>{{ $user->login }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->perfil }}</td>
                <td>{{ $user->aliado->nombre }}</td>
                <td>{{ $user->centralizador->nombre }}</td>
                <td>{{ $user->area->nombre }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
