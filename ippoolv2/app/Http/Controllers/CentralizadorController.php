<?php

namespace App\Http\Controllers;

use App\Exports\CentralizadorExport;
use Illuminate\Http\Request;
use App\Models\Centralizador;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CentralizadorRequest;

class CentralizadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centralizadores = Centralizador::all();
        return view('admin.centralizadores.index')->with('centralizadores', $centralizadores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.centralizadores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CentralizadorRequest $request)
    {
        $centralizador = Centralizador::create($request->all());
        return redirect()->route('admin.centralizadores.index')->with('message', 'El usuario ' . $centralizador->nombre . ' ' . $centralizador->apellido . ' fue creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centralizador = Centralizador::find($id);
        return view('admin.centralizadores.show')->with('centralizador', $centralizador);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $centralizador = Centralizador::find($id);
        return view('admin.centralizadores.edit')->with('centralizador', $centralizador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CentralizadorRequest $request, $id)
    {
        $centralizador = Centralizador::find($id);
        $centralizador->nombre           = $request->nombre;
        $centralizador->apellido         = $request->apellido;
        $centralizador->tipo_doc         = $request->tipo_doc;
        $centralizador->documento        = $request->documento;
        $centralizador->email            = $request->email;
        $centralizador->telefono         = $request->telefono;
        if ($centralizador->active == 2) { //Pregunta si es 2 se pasa a 0
            $centralizador->active = 0;
        } else {
            $centralizador->active = $request->active; //Si no se queda en 1
        }

        if ($centralizador->save()) {
            return redirect()->route('admin.centralizadores.index')->with('message', 'El centralizador ' . $centralizador->nombre . ' ' . $centralizador->apellido . ' fue actualizado con éxito.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $centralizador = Centralizador::find($id);

        $users = DB::table('users')->where('centralizador_id', $id)
            ->update(['centralizador_id' => NULL]);

        if ($centralizador->delete()) {
            return redirect()->route('admin.centralizadores.index')->with('message', 'El centralizador: ' . $centralizador->nombre . ' ' . $centralizador->apellido . ' fue eliminado con exito con Exito!');
        }
    }

    public function excel()
    {
        return \Excel::download(new CentralizadorExport, 'centralizadores.xlsx');
    }
}
