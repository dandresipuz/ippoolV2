<?php

namespace App\Imports;

use App\Models\Empresa;
use App\Models\Ipaddress;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Throwable;

class IpaddressImport implements ToModel, WithStartRow, WithChunkReading
{

    private $empresas;

    public function __construct()
    {
        $this->empresas = Empresa::select('id', 'documento')->get();
    }

    public function model(array $row)
    {
        $empresa = $this->empresas->where('documento', $row[4])->first();

        return new Ipaddress([
            'ipaddress'         => $row[0],
            'service'           => $row[1],
            'idservice'         => $row[2],
            'estado'            => $row[3],
            'empresa_id'        => $empresa->id ?? NULL,
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 50;
    }
}
