<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Wansolarwind;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\WansolarwindExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\WansolarwindRequest;
use App\Imports\WansolarwindImport;

class WansolarwindController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.wansolarwinds.index')->only('index');
        $this->middleware('can:admin.wansolarwinds.create')->only('create', 'store');
        $this->middleware('can:admin.wansolarwinds.edit')->only('edit');
        $this->middleware('can:admin.wansolarwinds.show')->only('show');
        $this->middleware('can:admin.wansolarwinds.show')->only('destroy');
        $this->middleware('can:admin.wansolarwinds.excel')->only('excel');
        $this->middleware('can:admin.wansolarwinds.import')->only('import');
        $this->middleware('can:admin.wansolarwinds.addIndexResource')->only('addIndexResource');
        $this->middleware('can:admin.wansolarwinds.addEditResource')->only('addEditResource', 'update');
        $this->middleware('can:admin.wansolarwinds.indexWansolarwinds')->only('indexWansolarwinds');
        $this->middleware('can:admin.wansolarwinds.showWansolarwind')->only('showWansolarwind');
    }

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
            // return redirect()->route('admin.wansolarwinds.index')->with('message', 'El recurso ' . $wansolarwind->vlanid . ' fue asignado con éxito.');
            return redirect()->back()->with('message', 'El recurso ' . $wansolarwind->vlanid . ' fue asignado con éxito.');
        }
    }

    public function excel()
    {
        return Excel::download(new WansolarwindExport, 'allwan.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        \Excel::import(new WansolarwindImport, $file);
        return redirect()->back()->with('message', 'Los recursos fueron importados con exito');
    }

    public function addIndexResource()
    {
        $wansolarwinds = Wansolarwind::where('estado', 0)->get();
        return view('gestion.wansolarwinds.index')->with('wansolarwinds', $wansolarwinds);
    }

    public function addEditResource($id)
    {
        $wansolarwind = Wansolarwind::find($id);
        $empresas = DB::table('empresas')->where('active', 1)
            ->orderBy('empresa', 'asc')
            ->get();
        return view('gestion.wansolarwinds.edit')->with('wansolarwind', $wansolarwind)
            ->with("empresas", $empresas);
    }

    // Módulo consultas

    public function indexWansolarwinds()
    {
        $wans = DB::table('wansolarwinds')->where('estado', 1)
            ->orderBy('id', 'asc')
            ->get();
        return view('consulta.wansolarwinds.index')->with('wans', $wans);
    }

    public function showWansolarwind($id)
    {
        $wansolarwind = Wansolarwind::find($id);
        return view('consulta.wansolarwinds.show')->with('wansolarwind', $wansolarwind);
    }
}
