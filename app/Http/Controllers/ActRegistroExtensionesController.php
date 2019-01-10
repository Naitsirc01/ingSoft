<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Extension;

class ActRegistroExtensionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extensiones=Extension::all();
        return view("/act_registro_extension", compact("extensiones"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("act_regitro_extension.create");
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
            'titulo'=>'required',
            'expositor'=>'required',
            'fecha'=>'required',
            'ubicacion'=>'required',
            'cantidad_asistentes'=>'required',
            'organizador'=>'required',
            'tipo_extension'=>'required'
        ]);

        $extension=new Extension;
        $extension->titulo=$request->titulo;
        $extension->expositor=$request->expositor;
        $extension->fecha=$request->fecha;
        $extension->ubicacion=$request->ubicacion;
        $extension->cantidad_asistentes=$request->cantidad_asistentes;
        $extension->organizador=$request->organizador;
        $extension->tipo_extension=$request->tipo_extension;
        $extension->indicadorid=1;
        $extension->save();


/*
        $titulacion=new Titulacion;
        $titulacion->titulo=$request->titulo;
        $titulacion->nombre=$request->input('nombre');
        $titulacion->rut=$request->input('rut');
        $titulacion->carrera=$request->input('carrera');
        $titulacion->fecha_inicio=$request->input('fecha_inicio');
        $titulacion->fecha_termino=$request->input('fecha_termino');
        $titulacion->profesor=$request->input('profesor');
        $titulacion->empresa=$request->input('empresa');
        $titulacion->indicadorid=1;
        $titulacion->save();
*/
        return redirect('/act_regitro_extension')->with('success','Registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $extensiones=Extension::findOrFail($id);
        return view("act_regitro_extension.show", compact("act_regitro_extension"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $extensiones=Extension::findOrFail($id);
        return view("act_regitro_extension.edit", compact("act_regitro_extension"));

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
            'titulo'=>'required',
            'expositor'=>'required',
            'fecha'=>'required',
            'ubicacion'=>'required',
            'cantidad_asistentes'=>'required',
            'organizador'=>'required',
            'tipo_extension'=>'required'
        ]);
        /*$extensiones=Extension::findOrFail($id);*/
        $extension=Extension::find($id);
        $extension->titulo=$request->titulo;
        $extension->expositor=$request->expositor;
        $extension->fecha=$request->fecha;
        $extension->ubicacion=$request->ubicacion;
        $extension->cantidad_asistentes=$request->cantidad_asistentes;
        $extension->organizador=$request->organizador;
        $extension->tipo_extension=$request->tipo_extension;
        $extension->indicadorid=1;
        $extension->save();

        return redirect('/act_regitro_extension')->with('success','Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extension=Extension::find($id);
        $extension->delete();
        return redirect('/act_regitro_extension')->with('success','Eliminado');
    }
}
