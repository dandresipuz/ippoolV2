<table>
    <thead>
        <tr>
            <th>Empresa</th>
            <th>Tipo de documento</th>
            <th># de Documento</th>
            <th>Segmento</th>
            <th>Estado</th>
            <th>Fecha de creación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empresas as $empresa)
            <tr>
                <td>{{ $empresa->empresa }}</td>
                <td>{{ $empresa->tipo_doc }}</td>
                <td>{{ $empresa->documento }}</td>
                <td>{{ $empresa->segmento }}</td>
                @if ($empresa->active == 0)
                    <td>Inactivo</td>
                @else
                    <td>Activo</td>
                @endif
                <td>{{ $empresa->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
