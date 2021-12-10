<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Wansolarwind;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\WansolarwindExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\WansolarwindRequest;

class WansolarwindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wans = Wansolarwind::all();
        return view('admin.wansolarwinds.index')->with('wans', $wans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Wansolarwind $wansolarwind)
    {
        return view('admin.wansolarwinds.show')->with('wansolarwind', $wansolarwind);
    }

    public function edit(Wansolarwind $wansolarwind)
    {
        $empresas = DB::table('empresas')->where('active', 1)
            ->orderBy('empresa', 'asc')
            ->get();
        return view('admin.wansolarwinds.edit')->with('wansolarwind', $wansolarwind)
            ->with("empresas", $empresas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WansolarwindRequest $request, Wansolarwind $wansolarwind)
    {

        $wansolarwind->vprn        = $request->vprn;
        $wansolarwind->empresa_id       = $request->empresa_id;
        if ($wansolarwind->empresa_id != null) {
            $wansolarwind->estado = 1;
        } else {
            $wansolarwind->estado = 0;
        }


        if ($wansolarwind->save()) {
            return redirect()->route('admin.wansolarwinds.index')->with('message', 'El recurso ' . $wansolarwind->vlanid . ' fue asignado con éxito.');
        }
    }

    public function excel()
    {
        return Excel::download(new WansolarwindExport, 'allwan.xlsx');
    }
}
