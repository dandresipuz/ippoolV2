<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;;

use App\Models\Aliado;

use App\Exports\UserExport;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangepasswordRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
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
        return redirect()->route('admin.users.index')->with('message', 'El centralizador ' . $user->nombre . ' ' . $user->apellido . ' fue creado con éxito.');
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
        $user->tipo_doc         = $request->tipo_doc;
        $user->documento        = $request->documento;
        $user->login            = $request->login;
        $user->email            = $request->email;
        $user->telefono         = $request->telefono;
        $user->perfil           = $request->perfil;
        $user->aliado_id        = $request->aliado_id;
        $user->area_id          = $request->area_id;
        if ($user->password != null) {
            $user->password     = bcrypt($request->password);
        } else {
            unset($user->password);
        }
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

    public function excel()
    {
        return \Excel::download(new UserExport, 'allusers.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        \Excel::import(new UserImport, $file);
        return redirect()->back()->with('message', 'Los usuarios fueron importados con exito');
    }

    public function passwordForm()
    {
        return view('profile.password');
    }

    public function updatePassword(ChangepasswordRequest $request)
    {
        if (Hash::check($request->oldpassword, Auth::user()->password)) {
            $user = new User;
            $user->where('id', '=', Auth::user()->id)
                ->update(['password' => bcrypt($request->password)]);
            return redirect()->route('admin.users.index')->with('message', 'La contraseña fue cambiada con exito');
        } else {
            return redirect()->back()->with('error', 'La contraseña antigua es incorrecta');
        }
    }
}
