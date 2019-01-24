<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'encargado';
        $role->description = 'Encargado de vinculacion con el medio';
        $role->save();

        $role = new Role();
        $role->name = 'secretaria';
        $role->description = 'Persona asignada a labores de secretaria';
        $role->save();

        $role = new Role();
        $role->name = 'academico';
        $role->description = 'Academico';
        $role->save();

        $role = new Role();
        $role->name = 'jefeDeCarrera';
        $role->description = 'Jefe de carrera o director';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->description = 'User';
        $role->save();
    }
}
