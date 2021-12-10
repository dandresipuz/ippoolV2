<?php

namespace App\Exports;

use App\Models\Empresa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmpresaExport implements FromView
{
    public function view(): View
    {
        return view('admin.empresas.excel', [
            'empresas' => Empresa::all()
        ]);
    }
}
