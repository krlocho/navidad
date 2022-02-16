<?php

namespace App\Http\Controllers;

use App\Models\Tabla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TablaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tablas = Tabla::orderBy('')->get();
        return view('tabla.index', compact('tablas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tabla.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosTabla = request()->except('_token', 'Enviar');
        if ($request->hasFile('foto')) {
            $datosTabla['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Tabla::insert($datosTabla);
        return redirect('tablas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tabla  $tabla
     * @return \Illuminate\Http\Response
     */
    public function show(Tabla $tabla)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tabla  $tabla
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tabla = Tabla::findOrFail($id);
        return view('tabla.edit', compact('tabla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tabla  $tabla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosTabla = request()->except('_token', 'Enviar');
        Tabla::where('id', '=', $id)->update($datosTabla);

        if ($request->hasFile('foto')) {
            $tabla = Tabla::findOrFail($id);
            Storage::delete('public/' .$tabla->foto);
            $datosTabla['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        $tabla = Tabla::findOrFail($id);
        return view('tabla.edit', compact('tabla'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tabla  $tabla
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tabla = Tabla::findOrFail($id);

        if(Storage::delete('public/' .$tabla->foto)){ Tabla::destroy($id);};
        return redirect('tablas');
    }
}
