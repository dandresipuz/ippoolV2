<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo de documento</th>
            <th># de Documento</th>
            <th>Teléfono</th>
            <th>Estado</th>
            <th>Login</th>
            <th>Email</th>
            <th>Perfil</th>
            <th>Aliado</th>
            <th>Centralizador</th>
            <th>Area</th>
            <th>Fecha de creación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
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
