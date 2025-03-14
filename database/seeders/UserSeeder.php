<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'Esteller Silva',
            'email'=> 'esteller03@gmail.com',
            'password'=> '12345678'
        ]);


        //USUARIO INACTIVO

        User::create([
            'name'=> 'Usuario Inactivo',
            'email'=> 'inactivo@gmail.com',
            'password'=> '12345678',
            'activo'=> false
        ]);
    }
}
