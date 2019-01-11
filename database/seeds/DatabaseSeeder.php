<?php

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
            'objetivo'=>'no definido',
            'meta_descripcion' =>'N° de actividades de extension -artisticas, culturales y otras - oranizadas por 
            cada unidad y el numero total de participantes en las actividades de extension',
            'tipo_de_calculo'=>'2010-01-01',
            'parametro1'=>0,
            'parametro2'=>0,
            'tipo1'=>'Total de actividades',
            'tipo2'=>'cantidad_asistentes',
            'meta1'=>115,
            'meta2'=>1377,
            'año_meta'=>'2020-11-30',
            'usuario_id'=>1,
        ]);

        DB::table('registros')->insert([
            'departamento' => 'no definido',
            'año'=>'2019-01-10',
            'cantidad_alcanzada1' =>0,
            'cantidad_alcanzada2' =>0,
            'Indicadores_id'=>1,
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
