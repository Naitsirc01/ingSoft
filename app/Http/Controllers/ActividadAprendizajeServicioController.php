<?php

namespace App\Http\Controllers;

use App\actividad_aprendizaje_servicio;
use Illuminate\Http\Request;

class ActividadAprendizajeServicioController extends Controller
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
        $registro = \App\actividad_aprendizaje_servicio::create(
            ['nombre_profesor'=>$request->profesor,
                'cantidad_estudiantes'=>$request->cestudiantes,
                'nombre_socio'=>$request->sociocomunitario,
                'semestre/año'=>$request->semestreaño,
                'asignaturaid'=>1,
                'indicadorid'=>1]);
        //return redirect()->action('ActividadAprendizajeServicioController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\actividad_aprendizaje_servicio  $actividad_aprendizaje_servicio
     * @return \Illuminate\Http\Response
     */
    public function show(actividad_aprendizaje_servicio $actividad_aprendizaje_servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\actividad_aprendizaje_servicio  $actividad_aprendizaje_servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(actividad_aprendizaje_servicio $actividad_aprendizaje_servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\actividad_aprendizaje_servicio  $actividad_aprendizaje_servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, actividad_aprendizaje_servicio $actividad_aprendizaje_servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\actividad_aprendizaje_servicio  $actividad_aprendizaje_servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(actividad_aprendizaje_servicio $actividad_aprendizaje_servicio)
    {
        //
    }
}
