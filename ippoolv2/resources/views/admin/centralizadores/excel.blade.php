<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo de documento</th>
            <th># de Documento</th>
            <th>Teléfono</th>
            <th>Estado</th>
            <th>Email</th>
            <th>Fecha de creación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($centralizadores as $centralizador)
            <tr>
                <td>{{ $centralizador->nombre . ' ' . $centralizador->apellido }}</td>
                <td>{{ $centralizador->tipo_doc }}</td>
                <td>{{ $centralizador->documento }}</td>
                <td>{{ $centralizador->telefono }}</td>
                @if ($centralizador->active == 0)
                    <td>Inactivo</td>
                @else
                    <td>Activo</td>
                @endif
                <td>{{ $centralizador->email }}</td>
                <td>{{ $centralizador->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
