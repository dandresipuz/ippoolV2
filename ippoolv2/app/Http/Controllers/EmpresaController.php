<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Ipaddress;
use App\Models\Wansolarwind;
use Illuminate\Http\Request;
use App\Exports\EmpresaExport;
use App\Imports\EmpresaImport;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EmpresaRequest;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.empresas.index')->only('index');
        $this->middleware('can:admin.empresas.create')->only('create', 'store');
        $this->middleware('can:admin.empresas.edit')->only('edit', 'update');
        $this->middleware('can:admin.empresas.show')->only('show');
        $this->middleware('can:admin.empresas.show')->only('destroy');
        $this->middleware('can:admin.empresas.excel')->only('excel');
        $this->middleware('can:admin.empresas.import')->only('import');
        $this->middleware('can:releases.empresas.indexResource')->only('indexResource');
        $this->middleware('can:releases.empresas.releaseResource')->only('releaseResource', 'updateResource');
        $this->middleware('can:releases.empresas.releaseVprnResource')->only('releaseVprnResource', 'updateVprn');
        $this->middleware('can:consulta.empresas.indexEmpresas')->only('indexEmpresas');
        $this->middleware('can:consulta.empresas.createEmpresa')->only('createEmpresa');
        $this->middleware('can:consulta.empresas.showEmpresa')->only('showEmpresa');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('admin.empresas.index')->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $empresa = Empresa::create($request->all());
        return redirect()->route('admin.empresas.index')->with('message', 'La empresa ' . $empresa->empresa . ' fue creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        $empresa_id = $empresa->id;
        $vprns = DB::table('wansolarwinds')->where('empresa_id', $empresa_id)->get();
        $ips = DB::table('ipaddresses')->where('empresa_id', $empresa_id)->get();

        return view('admin.empresas.show')->with('empresa', $empresa)
            ->with('vprns', $vprns)
            ->with('ips', $ips);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('admin.empresas.edit')->with('empresa', $empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        $empresa->empresa          = $request->empresa;
        $empresa->tipo_doc         = $request->tipo_doc;
        $empresa->documento        = $request->documento;
        $empresa->segmento         = $request->segmento;
        $empresa->usuario_id       = $request->usuario_id;
        if ($empresa->active == 2) { //Pregunta si es 2 se pasa a 0
            $empresa->active = 0;
        } else {
            $empresa->active = $request->active; //Si no se queda en 1
        }

        if ($empresa->save()) {
            return redirect()->route('admin.empresas.index')->with('message', 'La empresa ' . $empresa->empresa . ' fue actualizada con éxito.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $id_empresa = $empresa->id;

        $ipaddresses = DB::table('ipaddresses')->where('empresa_id', $id_empresa)
            ->update(['empresa_id' => NULL]);

        $wansolarwinds = DB::table('wansolarwinds')->where('empresa_id', $id_empresa)
            ->update(['empresa_id' => NULL]);

        if ($empresa->delete()) {
            return redirect()->route('admin.empresas.index')->with('message', 'La empresa: ' . $empresa->empresa . ' fue eliminada con exito con Exito!.');
        }
    }

    // Exportar a Excel

    public function excel()
    {
        return \Excel::download(new EmpresaExport, 'allempresas.xlsx');
    }

    //Importar desde Excel
    public function import(Request $request)
    {
        $file = $request->file('file');
        \Excel::import(new EmpresaImport, $file);
        return redirect()->back()->with('message', 'Las empresas fueron importadas con exito');
    }

    // Liberar Ip's y VPRN

    public function indexResource()
    {
        $vprns = DB::table('wansolarwinds')->where('estado', 1)->get();
        $ips = DB::table('ipaddresses')->where('estado', 1)->get();
        $empresas = DB::table('empresas')->where('active', 1)->get();

        return view('release.index')->with('empresas', $empresas)
            ->with('vprns', $vprns)
            ->with('ips', $ips);
    }

    public function releaseResource($id)
    {
        $empresa = Empresa::find($id);
        $vprns = DB::table('wansolarwinds')->where('empresa_id', $id)->get();
        $ips = DB::table('ipaddresses')->where('empresa_id', $id)->get();

        return view('release.edit')->with('empresa', $empresa)
            ->with('vprns', $vprns)
            ->with('ips', $ips);
    }

    public function releaseVprnResource($id)
    {
        $empresa = Empresa::find($id);
        $vprns = DB::table('wansolarwinds')->where('empresa_id', $id)->get();
        $ips = DB::table('ipaddresses')->where('empresa_id', $id)->get();

        return view('release.editvprn')->with('empresa', $empresa)
            ->with('vprns', $vprns)
            ->with('ips', $ips);
    }

    public function updateResource(Request $request)
    {
        $ids = $request->ids;
        Ipaddress::whereIn('id', $ids)->update(['estado' => 0, 'empresa_id' => null, 'service' => '']);
        return redirect()->back()->with('message', 'Las direcciones IP fueron liberadas con exito');
    }

    public function updateVprn(Request $request)
    {
        $ids = $request->ids;
        Wansolarwind::whereIn('id', $ids)->update(['estado' => 0, 'empresa_id' => null]);
        return redirect()->back()->with('message', 'Los recursos fueron liberados con exito');
    }

    //

    // Módulo consulta

    public function indexEmpresas()
    {
        $empresas = Empresa::all();
        return view('consulta.empresas.index')->with('empresas', $empresas);
    }

    public function createEmpresa()
    {
        return view('consulta.empresas.create');
    }

    public function storeEmpresa(EmpresaRequest $request)
    {
        $empresa = Empresa::create($request->all());
        return redirect()->route('consulta.empresas.index')->with('message', 'La empresa ' . $empresa->empresa . ' fue creada con éxito.');
    }

    public function showEmpresa($id)
    {
        $empresa = Empresa::find($id);
        $vprns = DB::table('wansolarwinds')->where('empresa_id', $id)->get();
        $ips = DB::table('ipaddresses')->where('empresa_id', $id)->get();
        return view('consulta.empresas.show')->with('empresa', $empresa)
            ->with('vprns', $vprns)
            ->with('ips', $ips);
    }

    //
}
