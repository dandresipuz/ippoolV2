<table>
    <thead>
        <tr>
            <th>VLAN ID</th>
            <th>VPRN</th>
            <th>Red Wan 1</th>
            <th>Red Wan 2</th>
            <th>BOG-RTDN-3</th>
            <th>BOG-GC-1</th>
            <th>BOG-41000</th>
            <th>BOG-GC-2</th>
            <th>Estado</th>
            <th>Asignada a</th>
            <th>Fecha de creación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($wansolarwinds as $wansolarwind)
            <tr>
                <td>{{ $wansolarwind->vlanid }}</td>
                @if ($wansolarwind->empresa_id != null)
                    <td> {{ $wansolarwind->vprn }}</td>
                @else
                    <td></td>
                @endif
                <td>{{ $wansolarwind->redwanuno }}</td>
                <td>{{ $wansolarwind->redwandos }}</td>
                <td>{{ $wansolarwind->ipbogrtdntres }}</td>
                <td>{{ $wansolarwind->ipboggcuno }}</td>
                <td>{{ $wansolarwind->ipbog41000 }}</td>
                <td>{{ $wansolarwind->ipboggcdos }}</td>
                @if ($wansolarwind->estado == 0)
                    <td>Libre</td>
                @else
                    <td>Ocupada</td>
                @endif
                <td>{{ $wansolarwind->empresa->empresa ?? '' }}</td>
                <td>{{ $wansolarwind->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
