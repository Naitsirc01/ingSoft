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
            'nombre' => 'indicador1',
            'tipo_indicador'=>'tipoPrueba',
            'usuario_id'=>1,
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
