<?php

namespace App\Http\Controllers;

use App\actividadtitulados;
use Illuminate\Http\Request;

class ActividadTituladosController extends Controller
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

       $registro = \App\actividad_titulados::create(
           ['titulado'=>$request->titulado,
               'rut'=>$request->rut,
               'telefono'=>$request->telefono,
               'email'=>$request->email,
               'empresa'=>$request->empresa,
               'añoTitulacion'=>$request->año,
               'carrera'=>$request->carrera,
               'indicadorid'=>1]
       );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\actividadtitulados  $actividadTitulados
     * @return \Illuminate\Http\Response
     */
    public function show(actividadtitulados $actividadTitulados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\actividadtitulados  $actividadTitulados
     * @return \Illuminate\Http\Response
     */
    public function edit(actividadtitulados $actividadTitulados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\actividadtitulados  $actividadTitulados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, actividadtitulados $actividadTitulados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\actividadtitulados  $actividadTitulados
     * @return \Illuminate\Http\Response
     */
    public function destroy(actividadtitulados $actividadTitulados)
    {
        //
    }
}
