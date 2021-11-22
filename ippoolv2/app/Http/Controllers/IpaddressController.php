<?php

namespace App\Http\Controllers;

use App\Http\Requests\IpaddressRequest;
use App\Models\Ipaddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IpaddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ipaddresses = Ipaddress::paginate(10);
        return view('admin.ipaddresses.index')->with('ipaddresses', $ipaddresses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $empresas = Empresa::all()->where('active', 1);
        $empresas = DB::table('empresas')->where('active', 1)
            ->orderBy('empresa', 'asc')
            ->get();

        // $ips = DB::table('ipaddresses')->where('estado', 0)
        //     ->orderBy('ipaddress', 'desc')
        //     ->take(10)
        //     ->get();
        return view('admin.ipaddresses.create')->with('empresas', $empresas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IpaddressRequest $request)
    {
        $ipaddress = Ipaddress::create($request->all());
        return redirect()->route('admin.ipaddresses.index')->with('message', 'La dirección IP ' . $ipaddress->ipaddress . ' fue creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ipaddress $ipaddress)
    {
        return view('admin.ipaddresses.show')->with('ipaddress', $ipaddress);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ipaddress $ipaddress)
    {
        if ($ipaddress->delete()) {
            return redirect()->route('admin.ipaddresses.index')->with('message', 'La dirección IP ' . $ipaddress->ipaddress . ' fue eliminada con exito con Exito!');
        }
    }
}
