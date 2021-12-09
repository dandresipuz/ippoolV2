<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EmpresaRequest;

class EmpresaController extends Controller
{
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
}
