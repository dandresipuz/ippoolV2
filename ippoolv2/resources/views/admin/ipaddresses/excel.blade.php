<table>
    <thead>
        <tr>
            <th>Dirección IP</th>
            <th>Servicio</th>
            <th>ID de servicio</th>
            <th>Estado</th>
            <th>Asignado</th>
            <th>Fecha de creación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ipaddresses as $ip)
            <tr>
                <td>{{ $ip->ipaddress }}</td>
                <td>{{ $ip->service }}</td>
                @if ($ip->empresa_id != null)
                    <td>{{ $ip->idservice }}</td>
                @else
                    <td></td>
                @endif
                @if ($ip->active == 0)
                    <td>Inactivo</td>
                @else
                    <td>Activo</td>
                @endif
                <td>{{ $ip->empresa_id }}</td>
                <td>{{ $ip->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
