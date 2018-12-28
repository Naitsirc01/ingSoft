<?php

namespace App\Http\Controllers;

use App\actividad_convenio;
use Illuminate\Http\Request;

class ActividadConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $archivo="archivo";

        //no funciona pq el request mete todos los parametros en orden y los guardan en los filleables , que deben estar en orden como sale abajo
        //y el only request le pasa los valores a los filleables, lo que en la anterior no era pósible y no le pasaba nada
        //$registro =  \App\actividad_convenio::create($request->only('empresa','tipo_convenio','fecha_comienzo','duracion','indicadorid'));

        $registro = \App\actividad_convenio::create(
            ['empresa'=>$request->name,
                'convenioid'=>1,
                'fecha_comienzo'=>$request->fecha,
                'duracion'=>$request->duracion,
                'indicadorid'=>1,]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\actividad_convenio  $actividad_convenio
     * @return \Illuminate\Http\Response
     */
    public function show(actividad_convenio $actividad_convenio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\actividad_convenio  $actividad_convenio
     * @return \Illuminate\Http\Response
     */
    public function edit(actividad_convenio $actividad_convenio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\actividad_convenio  $actividad_convenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, actividad_convenio $actividad_convenio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\actividad_convenio  $actividad_convenio
     * @return \Illuminate\Http\Response
     */
    public function destroy(actividad_convenio $actividad_convenio)
    {
        //
    }
}
