<?php

namespace App\Http\Controllers;

use App\atc_aprendizaje_mas_serv;
use App\atc_extension;
use App\atc_titulacion_con;
use App\convenio;
use App\evidencia;
use Illuminate\Http\Request;
use App\Registroconvenio;
use App\Indicadores;
use App\Registro;
use App\Traits\preload;

class RegistroConvenioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    use preload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $indicadores=Indicadores::all();
        $conv = Registroconvenio::all();
        $tipoCon= convenio::all();
        $request->user()->authorizeRoles(['academico','secretaria','encargado', 'admin']);
        return view('/reg_registro_convenio',compact('conv','tipoCon','indicadores'));
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
        $this->validate($request, [
            'nombre' => 'required',
            'tipoCon' => 'required',
            'fecha' => 'required',
            'duracion' => 'required'
        ]);
        $path=$request->file('evidencia')->store('upload');
        $indicador = Indicadores::find(4);
        $registroCon = new Registroconvenio;
        $registroCon->empresa = $request->input('nombre');
        $registroCon->convenioid = $request->input('tipoCon');
        $registroCon->fecha_comienzo = $request->input('fecha');
        $registroCon->duracion = $request->input('duracion');

        $indicador->atc_registroCon()->save($registroCon);

        $registro = Registro::find(1);


        $archivo = \App\evidencia::create(
            ['nombre'=>$request->file('evidencia')->getClientOriginalName(),'archivo' => $path,
                'actividad_convenioid' => $registro->id]);
        $registroCon->evidencia()->save($archivo);


        $registro->cantidad_de_atc_registroCon=Registroconvenio::all()->count();
        $registro->save();

        $this->loadData(4,1);
        return redirect('/reg_registro_convenio')->with('success','Se ha registrado correctamente.');
    }

        /*
         * $registro2 = \App\evidencia::create(
            ['archivo'=>$request->evidencia,
                'actividad_convenioid'=>$registro->id]);



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
            'nombre'=>'required',
            'tipoCon'=>'required',
            'fecha'=>'required',
            'duracion'=>'required'
        ]);
        $path=$request->file('evidencia')->store('upload');
        $registro=Registroconvenio::find($id);
        $registro->empresa=$request->input('nombre');
        $registro->convenioid=$request->input('tipoCon');
        $registro->fecha_comienzo=$request->input('fecha');
        $registro->duracion=$request->input('duracion');
        $registro->save();

        $archivo = evidencia::where('Registroconvenio_id','=',$id)->first();
        $archivo->archivo=$path;
        $archivo->nombre=$request->evidencia->getClientOriginalName();
        $archivo->save();

        /*

         $registro2 = \App\evidencia::create(
            ['archivo'=>$request->evidencia,
                'actividad_convenioid'=>$registro->id]);
        */
        return redirect('/reg_registro_convenio')->with('success','Se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro=Registro::find(1);
        $registroCon=Registroconvenio::find($id);
        $registroCon->delete();
        $registro->cantidad_de_atc_registroCon=Registroconvenio::all()->count();
        $registro->save();
        $this->loadData(4,1);
        return redirect('/reg_registro_convenio')->with('success','Se ha eliminado correctamente.');
    }
}
