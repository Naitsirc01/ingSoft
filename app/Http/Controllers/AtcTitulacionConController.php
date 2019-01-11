<?php

namespace App\Http\Controllers;

use App\atc_titulacion_con;
use Illuminate\Http\Request;

class AtcTitulacionConController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulacions=atc_titulacion_con::all();
        return view("/act_titulacion_con", compact("titulacions"));

        /*$titulados=Titulado::all();
        return view('titulado')->with('titulados',$titulados);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("act_titulacion_con.create");
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
            'nombre'=>'required',
            'rut'=>'required',
            'carrera'=>'required',
            'fecha_inicio'=>'required',
            'fecha_termino'=>'required',
            'profesor'=>'required',
            'empresa'=>'required'
        ]);

        $titulacion=new atc_titulacion_con;
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

        $registro2 = new \App\evidencia(['archivo'=>$request->evidencia]);
        $titulacion->evidencia()->save($registro2);

        return redirect('/act_titulacion_con')->with('success','Registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$titulacions=Titulacion::findOrFail($id);
        return view("act_titulacion_con.show", compact("act_titulacion_con"));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* $titulacions=Titulacion::findOrFail($id);
         return view("act_titulacion_con.edit", compact("act_titulacion_con"));*/
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
            'nombre'=>'required',
            'rut'=>'required',
            'carrera'=>'required',
            'fecha_inicio'=>'required',
            'fecha_termino'=>'required',
            'profesor'=>'required',
            'empresa'=>'required'
        ]);
        /*$titulacion=Titulacion::findOrFail($id);*/
        $titulacion=atc_titulacion_con::find($id);
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


        /*return redirect("/act_titulacion_con");*/
        return redirect('/act_titulacion_con')->with('success','Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $titulacion=atc_titulacion_con::find($id);
        $titulacion->delete();
        return redirect('/act_titulacion_con')->with('success','Eliminado');
    }
}
