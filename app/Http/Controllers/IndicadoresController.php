<?php

namespace App\Http\Controllers;

use App\departamento;
use App\Extension;
use App\Registro;
use App\Indicadores;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndicadoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parametros=['Total de actividades',
            'cantidad de actividades A+S',
            'cantidad de actividades extension',
            'cantidad de titulaciones por convenio',
            'cantidad de registro de convenios',
            'cantidad de estudiantes A+S',
            'cantidad de asistentes extension',
            'cantidad de titulados'];
        $indicadores=Indicadores::all();
        $departamentos=departamento::all();
        $user=User::find(Auth::user()->id);
        $request->user()->authorizeRoles(['jefeDeCarrera','encargado', 'admin']);
        return view("/indicadores",compact('indicadores','parametros','departamentos','user'));
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
            'nombre'=>'required',
            'mdes'=>'required',
            'tipoCal'=>'required',
            'param1'=>'required',
            'param2'=>'required',
            'meta1'=>'required',
            'meta'=>'required',
        ]);

        $depId=Auth::user()->departamento_id;

        $indicador=new Indicadores;
        $indicador->nombre=$request->input('nombre');
        $indicador->departamento_id=$depId;
        $indicador->meta_descripcion=$request->input('mdes');
        $indicador->tipo_de_calculo=$request->input('tipoCal');
        $indicador->parametro1=0;
        $indicador->parametro2=0;
        $indicador->tipo1=$request->input('param1');
        $indicador->tipo2=$request->input('param2');
        $indicador->meta1=$request->input('meta1');
        $indicador->meta2=$request->input('meta2');
        $indicador->año_meta=$request->input('meta');
        $indicador->usuario_id=Auth::user()->id;
        $indicador->save();

        $existe=false;
        $regs=Registro::all();
        foreach ($regs as $d) {
            if($d->departamento_id==$depId){
                $existe=true;
                break;
            }
        }
        if(!$existe){
            $registro=new Registro;
            $registro->departamento_id=$depId;
            $registro->año=Carbon::now();
            $registro->total_de_actividades=0;
            $registro->cantidad_de_titulados=0;
            $registro->cantidad_de_asistentes=0;
            $registro->cantidad_de_estudiantes=0;
            $registro->cantidad_de_atc_AprServ=0;
            $registro->cantidad_de_atc_extension=0;
            $registro->cantidad_de_atc_registroCon=0;
            $registro->cantidad_de_atc_titulacionCon=0;
            $registro->save();
        }

        return redirect('/indicadores')->with('success','Registrado');
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
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre'=>'required',
            'mdes'=>'required',
            'tipoCal'=>'required',
            'param1'=>'required',
            'param2'=>'required',
            'meta1'=>'required',
            'meta'=>'required',
        ]);
        $indicador=Indicadores::find($id);
        $indicador->nombre=$request->input('nombre');
        $indicador->meta_descripcion=$request->input('mdes');
        $indicador->tipo_de_calculo=$request->input('tipoCal');
        $indicador->tipo1=$request->input('param1');
        $indicador->tipo2=$request->input('param2');
        $indicador->meta1=$request->input('meta1');
        $indicador->meta2=$request->input('meta2');
        $indicador->año_meta=$request->input('meta');
        $indicador->usuario_id=Auth::user()->id;
        $indicador->save();
        return redirect('/indicadores')->with('success','Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indicador=Indicadores::find($id);
        $indicador->delete();
        return redirect('/indicadores')->with('success','Eliminado');
    }
}
