<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_encargado = Role::where('name', 'encargado')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->nombre = 'User';
        $user->email = 'user@example.com';
        $user->rut = '987654321';
        $user->departamento_id = 1;
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->nombre = 'Encargado';
        $user->email = 'encargado@example.com';
        $user->rut = '123123123';
        $user->departamento_id = 1;
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_encargado);

        $user = new User();
        $user->nombre = 'Admin';
        $user->email = 'admin@example.com';
        $user->rut = '123456789';
        $user->departamento_id = 1;
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
