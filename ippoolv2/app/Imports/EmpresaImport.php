<?php

namespace App\Imports;

use App\Models\Empresa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EmpresaImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Empresa([
            'tipo_doc'          => $row[0],
            'documento'         => $row[1],
            'empresa'           => $row[2],
            'segmento'          => $row[3],
            'usuario_id'        => auth()->user()->id,
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
