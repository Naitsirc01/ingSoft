<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuarios')->insert([
            'nombre' => 'Admin',
        ]);
        DB::table('tipo_usuarios')->insert([
            'nombre' => 'Usuario',
        ]);

        DB::table('usuarios')->insert([
            'nombre' => 'testerUser',
            'rut'=>'0000000-0',
            'contraseña'=>'159357',
            'tipo_usuarioid'=>'2',
        ]);
        DB::table('indicadores')->insert([
            'nombre' => 'Extension',
            'meta_descripcion' =>'N° de actividades de extension -artisticas, culturales y otras - oranizadas por 
            cada unidad y el numero total de participantes en las actividades de extension',
            'tipo_de_calculo'=>'2',
            'parametro1'=>0,
            'parametro2'=>0,
            'tipo1'=>'Total de actividades',
            'tipo2'=>'cantidad_asistentes',
            'meta1'=>115,
            'meta2'=>1377,
            'año_meta'=>'2020-11-30',
            'usuario_id'=>1,
        ]);

        DB::table('indicadores')->insert([
            'nombre' => 'Aprendizaje más servicio',
            'meta_descripcion' =>'Numero actividades de Aprendizaje más Servicios, N° estudiantes que participaron en
            estas actividades.',
            'tipo_de_calculo'=>'2',
            'parametro1'=>0,
            'parametro2'=>0,
            'tipo1'=>'Total de actividades',
            'tipo2'=>'cantidad_estudiantes',
            'meta1'=>63,
            'meta2'=>870,
            'año_meta'=>'2020-11-30',
            'usuario_id'=>1,
        ]);

        DB::table('indicadores')->insert([
            'nombre' => 'Actividades de titulacion por convenio',
            'meta_descripcion' =>'Número de actividades de titulacion -tesis, memorias, "capstone porject", entre otras-
            avaladas por convenio activo/Números total de actividades de titulación*100',
            'tipo_de_calculo'=>'1',
            'parametro1'=>0,
            'parametro2'=>0,
            'tipo1'=>'Total de actividades',
            'tipo2'=>'Total de actividades',
            'meta1'=>15,
            'meta2'=>0,
            'año_meta'=>'2020-11-30',
            'usuario_id'=>1,
        ]);

        DB::table('indicadores')->insert([
            'nombre' => 'N° de convenios de colaboracion activos',
            'meta_descripcion' =>'Alcanzar al año 2020 un total de 208 cibvebuis activos con 271 actividades',
            'tipo_de_calculo'=>'1',
            'parametro1'=>0,
            'parametro2'=>0,
            'tipo1'=>'Total de convenios',
            'tipo2'=>'Total de actividades',
            'meta1'=>208,
            'meta2'=>271,
            'año_meta'=>'2020-11-30',
            'usuario_id'=>1,
        ]);

        DB::table('registros')->insert([
            'departamento' => 'Ingenieria Sistemas y Computación',
            'año'=>Carbon::now(),
            'cantidad_alcanzada1' =>0,
            'cantidad_alcanzada2' =>0,
            'Indicadores_id'=>1,
        ]);

        DB::table('registros')->insert([
            'departamento' => 'Ingenieria Sistemas y Computación',
            'año'=>Carbon::now(),
            'cantidad_alcanzada1' =>0,
            'cantidad_alcanzada2' =>0,
            'Indicadores_id'=>2,
        ]);

        DB::table('registros')->insert([
            'departamento' => 'Ingenieria Sistemas y Computación',
            'año'=>Carbon::now(),
            'cantidad_alcanzada1' =>0,
            'cantidad_alcanzada2' =>0,
            'Indicadores_id'=>3,
        ]);

        DB::table('registros')->insert([
            'departamento' => 'Ingenieria Sistemas y Computación',
            'año'=>Carbon::now(),
            'cantidad_alcanzada1' =>0,
            'cantidad_alcanzada2' =>0,
            'Indicadores_id'=>4,
        ]);


        DB::table('convenios')->insert([
            'nombre' => 'Capstone',
        ]);
        DB::table('convenios')->insert([
            'nombre' => 'Marco',
        ]);
        DB::table('convenios')->insert([
            'nombre' => 'Especifico',
        ]);
        DB::table('convenios')->insert([
            'nombre' => 'A+S',
        ]);

        //debe ser actualizado
        DB::table('asignaturas')->insert([
            'nombre' => 'Programacion',
        ]);
        DB::table('asignaturas')->insert([
            'nombre' => 'Lenguaje de programacion',
        ]);
        DB::table('asignaturas')->insert([
            'nombre' => 'Base de datos',
        ]);
        DB::table('asignaturas')->insert([
            'nombre' => 'Ingenieria Software',
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
