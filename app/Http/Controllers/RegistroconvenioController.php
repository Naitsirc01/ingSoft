<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registroconvenio;

class RegistroconvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conv = Registroconvenio::all();
        return view('registroconvenio')->with('conv',$conv);
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
           'empresa'=>'required',
            'convenioid'=>'required',
            'fecha_comienzo'=>'required',
            'duracion'=>'required'
        ]);
        $registro=new Registroconvenio;
        $registro->empresa=$request->input('empresa');
        $registro->convenioid=$request->input('convenioid');
        $registro->fecha_comienzo=$request->input('fecha_comienzo');
        $registro->duracion=$request->input('duracion');
        $registro->indicadorid=1;
        $registro->save();

        /*
         * $registro2 = \App\evidencia::create(
            ['archivo'=>$request->evidencia,
                'actividad_convenioid'=>$registro->id]);

        $registro2->actividadConvenio()->save($registro);
        */

        return redirect('/registroconvenio')->with('success','Registrado');
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
            'empresa'=>'required',
            'convenioid'=>'required',
            'fecha_comienzo'=>'required',
            'duracion'=>'required'
        ]);
        $registro=Registroconvenio::find($id);
        $registro->empresa=$request->input('empresa');
        $registro->convenioid=$request->input('convenioid');
        $registro->fecha_comienzo=$request->input('fecha_comienzo');
        $registro->duracion=$request->input('duracion');
        $registro->indicadorid=1;
        $registro->save();

        /*

         $registro2 = \App\evidencia::create(
            ['archivo'=>$request->evidencia,
                'actividad_convenioid'=>$registro->id]);
        */
        return redirect('/registroconvenio')->with('success','Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro=Registroconvenio::find($id);
        $registro->delete();
        return redirect('/registroconvenio')->with('success','Eliminado');
    }
}