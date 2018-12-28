<?php

namespace App\Http\Controllers;

use App\actividad_extension;
use Illuminate\Http\Request;

class ActividadExtensionController extends Controller
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
        $registro = \App\actividad_extension::create(
            ['titulo'=>$request->title,
                'expositor'=>$request->expositor,
                'fecha'=>$request->date,
                'ubicacion'=>$request->ubicacion,
                'cantidad_asistentes'=>$request->cantAsis,
                'organizador'=>$request->organizador,
                'tipo_extension'=>$request->tipo_extension,
                'indicadorid'=>1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\actividad_extension  $actividad_extension
     * @return \Illuminate\Http\Response
     */
    public function show(actividad_extension $actividad_extension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\actividad_extension  $actividad_extension
     * @return \Illuminate\Http\Response
     */
    public function edit(actividad_extension $actividad_extension)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\actividad_extension  $actividad_extension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, actividad_extension $actividad_extension)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\actividad_extension  $actividad_extension
     * @return \Illuminate\Http\Response
     */
    public function destroy(actividad_extension $actividad_extension)
    {
        //
    }
}
