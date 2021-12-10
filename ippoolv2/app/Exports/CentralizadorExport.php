<?php

namespace App\Exports;

use App\Models\Centralizador;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CentralizadorExport implements FromView
{
    public function view(): View
    {
        return view('admin.centralizadores.excel', [
            'centralizadores' => Centralizador::all()
        ]);
    }
}
