<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        $fecha_actual = Carbon::now();

        Color::insert([
            ['nombre' => 'rojo', 'created_at' => $fecha_actual, 'updated_at' => $fecha_actual],
            ['nombre' => 'azul', 'created_at' => $fecha_actual, 'updated_at' => $fecha_actual],
            ['nombre' => 'plateado', 'created_at' => $fecha_actual, 'updated_at' => $fecha_actual],
            ['nombre' => 'verde', 'created_at' => $fecha_actual, 'updated_at' => $fecha_actual],
            ['nombre' => 'amarillo', 'created_at' => $fecha_actual, 'updated_at' => $fecha_actual],
            ['nombre' => 'morado', 'created_at' => $fecha_actual, 'updated_at' => $fecha_actual],
        ]);
    }
}
