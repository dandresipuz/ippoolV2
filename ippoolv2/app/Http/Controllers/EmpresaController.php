<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
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
        $empresas = Empresa::paginate(10);
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
        return redirect()->route('admin.empresas.index')->with('message', 'La empresa ' . $empresa->nombre . ' fue creada con éxito.');
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
        $users = DB::table('users')->where('empresa_id', $empresa_id)
            ->where('active', 1)
            ->get();
        $users_desactive = DB::table('users')->where('empresa_id', $empresa_id)
            ->where('active', 0)
            ->get();
        return view('admin.empresas.show')->with('empresa', $empresa)
            ->with('users_desactive', $users_desactive)
            ->with('users', $users);
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
        $empresa->nombre           = $request->nombre;
        if ($empresa->active == 2) { //Pregunta si es 2 se pasa a 0
            $empresa->active = 0;
        } else {
            $empresa->active = $request->active; //Si no se queda en 1
        }

        if ($empresa->save()) {
            return redirect()->route('admin.empresas.index')->with('message', 'La empresa ' . $empresa->nombre . ' fue actualizada con éxito.');
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
        $users = DB::table('users')->where('empresa_id', $id_empresa)
            ->update(['empresa_id' => 1]);
        if ($empresa->delete()) {
            return redirect()->route('admin.empresas.index')->with('message', 'La empresa: ' . $empresa->nombre . ' fue eliminada con exito con Exito!');
        }
    }
}
