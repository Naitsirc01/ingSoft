<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Titulacion;

class TitulacionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulacions=Titulacion::all();
        return view("/titulacion", compact("titulacions"));

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
        return view("titulacions.create");
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

        return redirect('/titulacion')->with('success','Registrado');
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
        return view("titulacions.show", compact("titulacions"));*/
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
        return view("titulacions.edit", compact("titulacions"));*/
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
        $titulacion=Titulacion::find($id);
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


        /*return redirect("/titulacions");*/
        return redirect('/titulacion')->with('success','Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $titulacion=Titulacion::find($id);
        $titulacion->delete();
        return redirect('/titulacion')->with('success','Eliminado');
    }
}
