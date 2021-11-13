<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Aliado;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aliados = Aliado::all();
        $areas    = Area::all();
        return view('admin.users.create')->with("aliados", $aliados)
            ->with('areas', $areas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        return redirect()->route('admin.users.index')->with('message', 'El usuario ' . $user->nombre . ' ' . $user->apellido . ' fue creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $aliados = Aliado::all();
        $areas    = Area::all();
        return view('admin.users.edit')->with('user', $user)
            ->with("aliados", $aliados)
            ->with('areas', $areas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->nombre           = $request->nombre;
        $user->apellido         = $request->apellido;
        $user->login            = $request->login;
        $user->email            = $request->email;
        $user->telefono         = $request->telefono;
        $user->perfil           = $request->perfil;
        $user->aliado_id        = $request->aliado_id;
        $user->area_id          = $request->area_id;
        $user->password         = bcrypt($request->password);
        if ($user->active == 2) { //Pregunta si es 2 se pasa a 0
            $user->active = 0;
        } else {
            $user->active = $request->active; //Si no se queda en 1
        }

        if ($user->save()) {
            return redirect()->route('admin.users.index')->with('message', 'El usuario ' . $user->nombre . ' ' . $user->apellido . ' fue actualizado con éxito.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $id_user = $user->id;
        // Seleccionamos todos los clientes que pertenezcan a ese usuario por ID y lo actualizamos al ID del administrador
        $clientes = DB::table('clientes')->where('usuario_id', $id_user)
            ->update(['usuario_id' => 1]);
        // Luego de actualizarlo podemos borrar para evitar el problema de las llaves foráneas
        if ($user->delete()) {
            return redirect()->route('admin.users.index')->with('message', 'El usuario: ' . $user->nombre . ' ' . $user->apellido . ' fue eliminado con exito con Exito!. Sus registros fueron asignamos al Administrador');
        }
    }
}
