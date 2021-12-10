<?php

namespace App\Exports;

use App\Models\Ipaddress;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IpaddressExport implements FromView
{
    public function view(): View
    {
        return view('admin.ipaddresses.excel', [
            'ipaddresses' => Ipaddress::all()
        ]);
    }
}
