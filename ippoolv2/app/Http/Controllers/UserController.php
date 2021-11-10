<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Area;
use App\Models\User;
use App\Models\Empresa;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('lista de usuarios');
        $users = User::all();
        // dd($users);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        $areas    = Area::all();
        return view('admin.users.create')->with("empresas", $empresas)
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
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $empresas = Empresa::all();
        $areas    = Area::all();
        return view('admin.users.edit')->with('user', $user)
            ->with("empresas", $empresas)
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
        $user->empresa_id       = $request->empresa__id;
        $user->area_id          = $request->area_id;

        if ($user->save()) {
            return redirect()->route('admin.users.index');
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
        //
    }
}
