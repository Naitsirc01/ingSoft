<?php

namespace App\Http\Controllers;

use App\Extension;
use App\Indicadores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class IndicadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columnasExtension=Schema::getColumnListing('extensiones');
        $columnasRegConvenio=Schema::getColumnListing('registroconvenios');
        $columnasAprendizajeServicio=Schema::getColumnListing('aprendizajes');
        $indicadores=Indicadores::all();
        return view("/indicadores",compact('indicadores','columnasExtension'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function show(Indicadores $indicadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function edit(Indicadores $indicadores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indicadores $indicadores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indicadores $indicadores)
    {
        //
    }
}
