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
        // $this->call(UsersTableSeeder::class);
    }
}
