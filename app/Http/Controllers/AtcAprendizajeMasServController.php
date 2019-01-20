<?php

namespace App\Http\Controllers;

use App\atc_aprendizaje_mas_serv;
use App\Indicadores;
use App\Registro;
use App\evidencia;
use Illuminate\Http\Request;

class AtcAprendizajeMasServController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
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
        $path=$request->file('evidencia')->store('upload');
        $indicador = Indicadores::find(2);

        $aprendizaje=new atc_aprendizaje_mas_serv;
        $aprendizaje->nombre_profesor=$request->input('nombre_profesor');
        $aprendizaje->cantidad_estudiantes=$request->input('cantidad_estudiantes');
        $aprendizaje->nombre_socio=$request->input('nombre_socio');
        $aprendizaje->semestreaño=$request->input('semestreaño');
        $aprendizaje->asignaturaid=$request->input('asignaturaid');;

        $indicador->atc_aprendizajeServ()->save($aprendizaje);

        $registro=Registro::find(2);
        $total=$registro->cantidad_alcanzada2+$request->cantidad_estudiantes;
        $registro->cantidad_alcanzada1=atc_aprendizaje_mas_serv::all()->count();
        $registro->cantidad_alcanzada2=$total;
        $registro->save();

        $archivo = new \App\evidencia(['archivo'=>$path]);
//        $registro2=new evidencia;
//        $registro2->archivo=$request->input('evidencia');

        $aprendizaje->evidencia()->save($archivo);

        $totalIndicador=$total+$indicador->parametro2;
        $indicador->parametro2=$totalIndicador;
        $indicador->parametro1=atc_aprendizaje_mas_serv::all()->count();
        $indicador->save();


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
        $path=$request->file('evidencia')->store('upload');
        $aprendizaje=atc_aprendizaje_mas_serv::find($id);
        $aprendizaje->nombre_profesor=$request->input('nombre_profesor');
        $aprendizaje->cantidad_estudiantes=$request->input('cantidad_estudiantes');
        $aprendizaje->nombre_socio=$request->input('nombre_socio');
        $aprendizaje->semestreaño=$request->input('semestreaño');
        $aprendizaje->asignaturaid=$request->input('asignaturaid');
        $aprendizaje->save();

        $archivo = evidencia::where('atc_aprendizaje_mas_serv_id','=',$id)->first();
        $archivo->archivo=$path;
        $archivo->save();

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
