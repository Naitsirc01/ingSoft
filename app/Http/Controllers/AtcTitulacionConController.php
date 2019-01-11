<?php

namespace App\Http\Controllers;

use App\atc_titulacion_con;
use App\Indicadores;
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
        //dd($request);
        $this->validate($request,[
            'titulo'=>'required',
            'nombre'=>'required',
            'rut'=>'required',
            'carrera'=>'required',
            'fecha_inicio'=>'required',
            'profesor'=>'required',
            'empresa'=>'required'
        ]);
        $indicador = Indicadores::find(1);
        $i=0;
        $arreglo=$request->nombre;
        $nombre1="";
        foreach ($arreglo as $valor) {
            $nombre1 = $valor . ',' . $nombre1;
        }
        unset($valor);
        $arreglo1=$request->profesor;
        $profesor1="";
        foreach ($arreglo1 as $valor1){
            $profesor1= $valor1. ',' .$profesor1;
        }
        unset($valor1);
        //$nombre1 =$nombre1+ $request->nombre[i].',';
        //$nombre1 = $request->nombre[0].','.$request->nombre[1].','.$request->nombre[2].','.$request->nombre[3];
        $titulacion=new atc_titulacion_con;
        $titulacion->titulo=$request->titulo;
        $titulacion->nombre=$nombre1;
        $titulacion->rut=$request->input('rut');
        $titulacion->carrera=$request->input('carrera');
        $titulacion->fecha_inicio=$request->input('fecha_inicio');
        $titulacion->fecha_termino=$request->input('fecha_termino');
        $titulacion->profesor=$profesor1;
        $titulacion->empresa=$request->input('empresa');

        $indicador->atc_titulacion_con()->save($titulacion);


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
        $titulacion->indicadores=1;
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
