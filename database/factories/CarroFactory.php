<?php

namespace Database\Factories;

use App\Models\Carro;
use App\Models\Color;
use App\Models\Modelo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carro>
 */
class CarroFactory extends Factory
{
    protected $model = Carro::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ano'=> rand(1900, 2025),
            'precio'=> rand(1500, 50000),
            'kilometraje'=> rand(0, 300000),
            'color_id'=> Color::inRandomOrder()->first()->id,
            'modelo_id'=> Modelo::inRandomOrder()->first()->id
        ];
    }
}
