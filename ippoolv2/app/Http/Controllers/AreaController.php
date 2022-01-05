<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.areas.index')->only('index');
        $this->middleware('can:admin.areas.create')->only('create', 'store');
        $this->middleware('can:admin.areas.edit')->only('edit', 'update');
        $this->middleware('can:admin.areas.show')->only('show');
        $this->middleware('can:admin.areas.show')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view('admin.areas.index')->with('areas', $areas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        $area = Area::create($request->all());
        return redirect()->route('admin.areas.index')->with('message', 'Fue creada el área ' . $area->nombre . ' con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        $area_id = $area->id;
        $users_active = DB::table('users')->where('area_id', $area_id)
            ->where('active', 1)
            ->get();

        $users_desactive = DB::table('users')->where('area_id', $area_id)
            ->where('active', 0)
            ->get();
        return view('admin.areas.show')->with('area', $area)
            ->with('users_desactive', $users_desactive)
            ->with('users_active', $users_active);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        return view('admin.areas.edit')->with('area', $area);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, Area $area)
    {
        $area->nombre           = $request->nombre;
        if ($area->active == 2) { //Pregunta si es 2 se pasa a 0
            $area->active = 0;
        } else {
            $area->active = $request->active; //Si no se queda en 1
        }

        if ($area->save()) {
            return redirect()->route('admin.areas.index')->with('message', 'Fue actualizada con éxito el área ' . $area->nombre);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $id_area = $area->id;
        $users = DB::table('users')->where('area_id', $id_area)
            ->update(['area_id' => 1]);
        if ($area->delete()) {
            return redirect()->route('admin.areas.index')->with('message', 'La area: ' . $area->nombre . ' fue eliminada con exito con Exito!');
        }
    }
}
