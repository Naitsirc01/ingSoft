<?php

namespace App\Http\Controllers;

use App\atc_aprendizaje_mas_serv;
use Illuminate\Http\Request;

class AtcAprendizajeMasServController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aprendizajes=atc_aprendizaje_mas_serv::all();
        return view("/act_aprendizaje_servicio", compact("aprendizajes"));
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
            'nombre_profesor'=>'required',
            'cantidad_estudiantes'=>'required',
            'nombre_socio'=>'required',
            'semestreaño'=>'required',
            'asignaturaid'=>'required',
        ]);


        $aprendizaje=new atc_aprendizaje_mas_serv;
        $aprendizaje->nombre_profesor=$request->input('nombre_profesor');
        $aprendizaje->cantidad_estudiantes=$request->input('cantidad_estudiantes');
        $aprendizaje->nombre_socio=$request->input('nombre_socio');
        $aprendizaje->semestreaño=$request->input('semestreaño');
        $aprendizaje->asignaturaid=$request->input('asignaturaid');;
        $aprendizaje->indicadorid=1;
        $aprendizaje->save();


        $registro2 = new \App\evidencia(['archivo'=>$request->evidencia]);
//        $registro2=new evidencia;
//        $registro2->archivo=$request->input('evidencia');

        $aprendizaje->evidencia()->save($registro2);




        return redirect('/act_aprendizaje_servicio')->with('success','Registrado');
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
            'nombre_profesor'=>'required',
            'cantidad_estudiantes'=>'required',
            'nombre_socio'=>'required',
            'semestreaño'=>'required',
            'asignaturaid'=>'required'
        ]);
        $aprendizaje=atc_aprendizaje_mas_serv::find($id);
        $aprendizaje->nombre_profesor=$request->input('nombre_profesor');
        $aprendizaje->cantidad_estudiantes=$request->input('cantidad_estudiantes');
        $aprendizaje->nombre_socio=$request->input('nombre_socio');
        $aprendizaje->semestreaño=$request->input('semestreaño');
        $aprendizaje->asignaturaid=$request->input('asignaturaid');
        $aprendizaje->indicadorid=1;
        $aprendizaje->save();

        return redirect('/act_aprendizaje_servicio')->with('success','Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aprendizaje=atc_aprendizaje_mas_serv::find($id);
        $aprendizaje->delete();
        return redirect('/act_aprendizaje_servicio')->with('success','Eliminado');
    }
}
