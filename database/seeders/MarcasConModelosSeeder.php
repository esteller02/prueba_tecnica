<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MarcasConModelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $toyota = Marca::create([
            'nombre'=> 'toyota'
        ]);

        $toyota->modelos()->createMany([
            ['nombre'=> 'corolla'],
            ['nombre'=> 'meru'],
            ['nombre'=> 'yaris']
            
        ]);

        $ford = Marca::create([
            'nombre'=> 'ford'
        ]);

        $ford->modelos()->createMany([
            ['nombre'=> 'mustang'],
            ['nombre'=> 'fiesta'],
            ['nombre'=> 'Explorer']
            
        ]);

        $chevrolet= Marca::create([
            'nombre'=> 'chevrolet'
        ]);

        $chevrolet->modelos()->createMany([
            ['nombre'=> 'aveo'],
            ['nombre'=> 'spark'],
            ['nombre'=> 'optra']
            
        ]);


    }
}
