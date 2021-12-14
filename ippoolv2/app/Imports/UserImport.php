<?php

namespace App\Imports;

use App\Models\Aliado;
use App\Models\Area;
use App\Models\Centralizador;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UserImport implements ToModel, WithStartRow
{

    private $aliados;
    private $areas;
    private $centralizadores;

    public function __construct()
    {
        $this->aliados = Aliado::select('id', 'nombre')->get();
        $this->areas = Area::select('id', 'nombre')->get();
        $this->centralizadores = Centralizador::select('id', 'nombre')->get();
    }

    public function model(array $row)
    {
        $aliado = $this->aliados->where('nombre', $row[9])->first();
        $area = $this->areas->where('nombre', $row[10])->first();
        $centralizador = $this->centralizadores->where('nombre', $row[11])->first();

        return new User([
            'nombre'            => $row[0],
            'apellido'          => $row[1],
            'tipo_doc'          => $row[2],
            'documento'         => $row[3],
            'telefono'          => $row[4],
            'login'             => $row[5],
            'email'             => $row[6],
            'password'          => Hash::make($row[7]),
            'perfil'            => $row[8],
            'aliado_id'         => $aliado->id,
            'area_id'           => $area->id,
            'centralizador_id'  => $centralizador->id,
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
