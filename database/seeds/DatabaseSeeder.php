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

        DB::table('departamentos')->insert([
            'nombre' => 'Departamento De Ingeniería De Sistemas Y Computación',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Ingeniería Industrial',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento De Ingeniería Civil',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento De Ingenieria Metalurgia y Minas',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Ingeniería Química',
        ]);

        // La creación de datos de roles debe ejecutarse primero
        $this->call(RoleTableSeeder::class);

        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserTableSeeder::class);

        DB::table('indicadores')->insert([
            'nombre' => 'Extension',
            'departamento_id' => 1,
            'meta_descripcion' =>'N° de actividades de extension -artisticas, culturales y otras - oranizadas por 
            cada unidad y el numero total de participantes en las actividades de extension',
            'tipo_de_calculo'=>2,
            'parametro1'=>0,
            'parametro2'=>0,
            'tipo1'=>2,
            'tipo2'=>6,
            'meta1'=>115,
            'meta2'=>1377,
            'año_meta'=>'2020-11-30',
            'usuario_id'=>1,
        ]);

        DB::table('indicadores')->insert([
            'nombre' => 'Aprendizaje más servicio',
            'departamento_id' => 1,
            'meta_descripcion' =>'Numero actividades de Aprendizaje más Servicios, N° estudiantes que participaron en
            estas actividades.',
            'tipo_de_calculo'=>'2',
            'parametro1'=>0,
            'parametro2'=>0,
            'tipo1'=>1,
            'tipo2'=>5,
            'meta1'=>63,
            'meta2'=>870,
            'año_meta'=>'2020-11-30',
            'usuario_id'=>1,
        ]);

        DB::table('indicadores')->insert([
            'nombre' => 'Actividades de titulacion por convenio',
            'departamento_id' => 1,
            'meta_descripcion' =>'Número de actividades de titulacion -tesis, memorias, "capstone porject", entre otras-
            avaladas por convenio activo/Números total de actividades de titulación*100',
            'tipo_de_calculo'=>'1',
            'parametro1'=>0,
            'parametro2'=>0,
            'tipo1'=>7,
            'tipo2'=>3,
            'meta1'=>15,
            'meta2'=>0,
            'año_meta'=>'2020-11-30',
            'usuario_id'=>1,
        ]);

        DB::table('indicadores')->insert([
            'nombre' => 'N° de convenios de colaboracion activos',
            'departamento_id' => 1,
            'meta_descripcion' =>'Alcanzar al año 2020 un total de 208 cibvebuis activos con 271 actividades',
            'tipo_de_calculo'=>2,
            'parametro1'=>0,
            'parametro2'=>0,
            'tipo1'=>4,
            'tipo2'=>0,
            'meta1'=>208,
            'meta2'=>271,
            'año_meta'=>'2020-11-30',
            'usuario_id'=>1,
        ]);

        DB::table('registros')->insert([
            'departamento_id' => 1,
            'año'=>Carbon::now(),
            'total_de_actividades' =>0,
            'cantidad_de_titulados' =>0,
            'cantidad_de_asistentes' =>0,
            'cantidad_de_estudiantes' =>0,
            'cantidad_de_atc_AprServ' =>0,
            'cantidad_de_atc_extension' =>0,
            'cantidad_de_atc_registroCon' =>0,
            'cantidad_de_atc_titulacionCon' =>0,
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


        DB::table('profesores')->insert([
            'nombre' => 'Aldo quelopana',
        ]);
        DB::table('profesores')->insert([
            'nombre' => 'German morales',
        ]);
        DB::table('profesores')->insert([
            'nombre' => 'Brian Keith',
        ]);
        DB::table('profesores')->insert([
            'nombre' => 'Vianca Vega',
        ]);
        DB::table('profesores')->insert([
            'nombre' => 'Juan Bekios',
        ]);
        DB::table('profesores')->insert([
            'nombre' => 'Carlos Pon',
        ]);
        DB::table('profesores')->insert([
            'nombre' => 'Manuel Olivares',
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
