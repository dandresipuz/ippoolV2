<?php

namespace App\Imports;

use Throwable;
use App\Models\Empresa;
use App\Models\Ipaddress;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class IpaddressImport implements ToModel, WithStartRow, WithChunkReading, WithUpserts
{

    private $empresas;

    public function __construct()
    {
        $this->empresas = Empresa::select('id', 'documento')->get();
    }

    public function model(array $row)
    {
        $empresa = $this->empresas->where('documento', $row[3])->first();

        return new Ipaddress([
            'ipaddress'         => $row[0],
            'service'           => $row[1],
            'idservice'         => $row[2],
            'empresa_id'        => $empresa->id ?? NULL,
            'estado'            => 1,
        ]);
    }

    public function uniqueBy()
    {
        return 'ipaddress';
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
