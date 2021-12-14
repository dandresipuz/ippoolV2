<?php

namespace App\Imports;

use App\Models\Centralizador;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CentralizadorImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Centralizador([
            'nombre'            => $row[0],
            'apellido'          => $row[1],
            'tipo_doc'          => $row[2],
            'documento'         => $row[3],
            'email'             => $row[4],
            'telefono'          => $row[5],
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
