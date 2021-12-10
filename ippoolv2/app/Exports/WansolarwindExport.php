<?php

namespace App\Exports;

use App\Models\Wansolarwind;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class WansolarwindExport implements FromView
{
    public function view(): View
    {
        return view('admin.wansolarwinds.excel', [
            'wansolarwinds' => Wansolarwind::all()
        ]);
    }
}
