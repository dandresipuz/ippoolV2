<?php

namespace App\Http\Controllers;

use App\Exports\IpaddressExport;
use App\Http\Requests\IpaddressRequest;
use App\Imports\IpaddressImport;
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
        $ipaddresses = Ipaddress::all();
        return view('admin.ipaddresses.index')->with('ipaddresses', $ipaddresses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ipaddress $ipaddress)
    {
        $empresas = DB::table('empresas')->where('active', 1)
            ->orderBy('empresa', 'asc')
            ->get();
        return view('admin.ipaddresses.edit')->with('ipaddress', $ipaddress)
            ->with("empresas", $empresas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IpaddressRequest $request, Ipaddress $ipaddress)
    {

        $ipaddress->ipaddress        = $request->ipaddress;
        $ipaddress->service          = $request->service;
        $ipaddress->idservice        = $request->idservice;
        if ($ipaddress->service != null) {
            $ipaddress->estado = 1;
        } else {
            $ipaddress->estado = 0;
        }

        $ipaddress->empresa_id       = $request->empresa_id;

        if ($ipaddress->save()) {
            // return redirect()->route('admin.ipaddresses.index')->with('message', 'La dirección ' . $ipaddress->ipaddress . ' fue asignada con éxito.');
            return redirect()->back()->with('message', 'La dirección ' . $ipaddress->ipaddress . ' fue asignada con éxito.');
        }
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

    public function excel()
    {
        return \Excel::download(new IpaddressExport, 'allips.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        \Excel::import(new IpaddressImport, $file);
        return redirect()->back()->with('message', 'Las IP\'s fueron importadas con exito');
    }

    public function addIndexResource()
    {
        $ipaddresses = Ipaddress::where('estado', 0)->get();
        return view('gestion.ipaddresses.index')->with('ipaddresses', $ipaddresses);
    }

    public function addEditResource($id)
    {
        $ipaddress = Ipaddress::find($id);
        $empresas = DB::table('empresas')->where('active', 1)
            ->orderBy('empresa', 'asc')
            ->get();
        return view('gestion.ipaddresses.edit')->with('ipaddress', $ipaddress)
            ->with("empresas", $empresas);
    }
}
