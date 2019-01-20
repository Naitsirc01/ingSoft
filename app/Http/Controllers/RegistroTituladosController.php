<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Titulado;
class RegistroTituladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulados=Titulado::all();
        return view('registro_titulados',compact('titulados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre'=>'required',
            'rut'=>'required',
            'lugar_trabajo'=>'required',
            'anio_titulacion'=>'required',
            'carrera'=>'required'
        ]);
        $titulado=new Titulado;
        $titulado->nombre=$request->input('nombre');
        $titulado->rut=$request->input('rut');
        $titulado->telefono=$request->input('telefono');
        $titulado->correo=$request->input('correo');
        $titulado->empresa=$request->input('empresa');
        $titulado->lugar_trabajo=$request->input('lugar_trabajo');
        $titulado->anio_titulacion=$request->input('anio_titulacion');
        $titulado->carrera=$request->input('carrera');
        $titulado->indicadorid=1;
        $titulado->save();

        return redirect('/regitro_titulados')->with('success','Se ha registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre'=>'required',
            'rut'=>'required',
            'lugar_trabajo'=>'required',
            'anio_titulacion'=>'required',
            'carrera'=>'required'
        ]);
        $titulado=Titulado::find($id);
        $titulado->nombre=$request->input('nombre');
        $titulado->rut=$request->input('rut');
        $titulado->telefono=$request->input('telefono');
        $titulado->correo=$request->input('correo');
        $titulado->empresa=$request->input('empresa');
        $titulado->lugar_trabajo=$request->input('lugar_trabajo');
        $titulado->anio_titulacion=$request->input('anio_titulacion');
        $titulado->carrera=$request->input('carrera');
        $titulado->indicadorid=1;
        $titulado->save();

        return redirect('/regitro_titulados')->with('success','Se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $titulado=Titulado::find($id);
        $titulado->delete();
        return redirect('/regitro_titulados')->with('success','Se ha eliminado correctamente.');
    }
}
