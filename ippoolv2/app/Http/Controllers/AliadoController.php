<?php

namespace App\Http\Controllers;

use App\Models\Aliado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AliadoRequest;

class AliadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aliados = Aliado::paginate(10);
        return view('admin.aliados.index')->with('aliados', $aliados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aliados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AliadoRequest $request)
    {
        $aliado = Aliado::create($request->all());
        return redirect()->route('admin.aliados.index')->with('message', 'El aliado <code>' . $aliado->nombre . '</code> fue creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aliado $aliado)
    {
        $aliado_id = $aliado->id;
        $users = DB::table('users')->where('aliado_id', $aliado_id)
            ->where('active', 1)
            ->get();
        $users_desactive = DB::table('users')->where('aliado_id', $aliado_id)
            ->where('active', 0)
            ->get();
        return view('admin.aliados.show')->with('aliado', $aliado)
            ->with('users_desactive', $users_desactive)
            ->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aliado $aliado)
    {
        return view('admin.aliados.edit')->with('aliado', $aliado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AliadoRequest $request, Aliado $aliado)
    {
        $aliado->nombre           = $request->nombre;
        if ($aliado->active == 2) { //Pregunta si es 2 se pasa a 0
            $aliado->active = 0;
        } else {
            $aliado->active = $request->active; //Si no se queda en 1
        }

        if ($aliado->save()) {
            return redirect()->route('admin.aliados.index')->with('message', 'El aliado: ' . $aliado->nombre . ' fue actualizado con éxito.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aliado $aliado)
    {
        $id_aliado = $aliado->id;
        $users = DB::table('users')->where('aliado_id', $id_aliado)
            ->update(['aliado_id' => 1]);
        if ($aliado->delete()) {
            return redirect()->route('admin.aliados.index')->with('message', 'El aliado: ' . $aliado->nombre . ' fue eliminada con exito con Exito!');
        }
    }
}
