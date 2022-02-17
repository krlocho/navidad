<?php

namespace App\Http\Controllers;

use App\Models\Tabla;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

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

    public function qr(Tabla $tablas){
		return view("tabla.qr",compact("tablas"));
}

public function pdf()
{
    $tablas = Tabla::paginate();
    $pdf =PDF::loadView('tabla.pdf',['tablas'=>$tablas]);

    return $pdf->stream();
    /* return view('tabla.pdf', compact('tablas')); */
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
        $campos=[
            'marca' => 'required|string|max:30',
            'modelo'=> 'required|string|max:35',
            'tamaño'=>'',
            'volumen'=>'numeric|between:15,110',
            'num_quillas'=>'numeric|between:0,5',
            'foto' => 'mimes:jpeg,png,jpg'
        ];

        $mensaje=[
            'required' =>'El campo :attribute es requerido',
            'foto.mimes' =>'La foto debe ser un archivo jpg o png',
            'volumen.numeric'=>'Introduzca un volumen valido',
            'num_quillas.numeric'=>'Introduzca un numero de quillas valido, entre 0 y 5'



        ];
        $this->validate($request,$campos, $mensaje);

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
        $datosTabla = request()->except('_token', 'Enviar', '_method');
        Tabla::where('id', '=', $id)->update($datosTabla);

        if ($request->hasFile('foto')) {
            $tabla = Tabla::findOrFail($id);
            Storage::delete('public/' .$tabla->foto);
            $datosTabla['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        $tabla = Tabla::findOrFail($id);
        return redirect('tablas');
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
