<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Aliado;
use App\Models\Empresa;
use App\Models\Ipaddress;
use App\Models\Wansolarwind;
use App\Models\Centralizador;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('can:admin.home')->only('index');
    }
    public function index()
    {
        $users = User::all();
        $usersDisable = User::where('active', 0)->get();
        $usersActive = User::where('active', 1)->get();
        $aliados = Aliado::all();
        $areas = Area::all();
        $centralizadores = Centralizador::all();
        $empresas = Empresa::all();
        $empresasDisable = Empresa::where('active', 0)->get();
        $empresasActive = Empresa::where('active', 1)->get();
        $ips = Ipaddress::all();
        $ipsDisable = Ipaddress::where('estado', 0)->get();
        $ipsActive = Ipaddress::where('estado', 1)->get();
        $wans = Wansolarwind::all();
        $wansDisable = Wansolarwind::where('estado', 0)->get();
        $wansActive = Wansolarwind::where('estado', 1)->get();
        return view('admin.admin')->with('users', $users)
            ->with('usersDisable', $usersDisable)
            ->with('usersActive', $usersActive)
            ->with('aliados', $aliados)
            ->with('areas', $areas)
            ->with('centralizadores', $centralizadores)
            ->with('empresas', $empresas)
            ->with('empresasDisable', $empresasDisable)
            ->with('empresasActive', $empresasActive)
            ->with('ips', $ips)
            ->with('ipsDisable', $ipsDisable)
            ->with('ipsActive', $ipsActive)
            ->with('wans', $wans)
            ->with('wansDisable', $wansDisable)
            ->with('wansActive', $wansActive);
    }
}
