<?php

namespace App\Imports;

use App\Models\Empresa;
use App\Models\Wansolarwind;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class WansolarwindImport implements ToModel, WithStartRow
{

    private $empresas;

    public function __construct()
    {
        $this->empresas = Empresa::select('id', 'documento')->get();
    }

    public function model(array $row)
    {

        $empresa = $this->empresas->where('documento', $row[9])->first();

        return new Wansolarwind([
            'vlanid'         => $row[0],
            'vprn'           => $row[1],
            'redwanuno'      => $row[2],
            'redwandos'      => $row[3],
            'ipbogrtdntres'  => $row[4],
            'ipboggcuno'     => $row[5],
            'ipbog41000'     => $row[6],
            'ipboggcdos'     => $row[7],
            'estado'         => $row[8],
            'empresa_id'     => $empresa->id ?? NULL,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
