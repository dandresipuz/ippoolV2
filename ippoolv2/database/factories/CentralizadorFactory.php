<?php

namespace Database\Factories;

use App\Models\Centralizador;
use Illuminate\Database\Eloquent\Factories\Factory;

class CentralizadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Centralizador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'nombre'            => $this->faker->firstName(),
            'apellido'          => $this->faker->lastName(),
            'telefono'          => $this->faker->numberBetween($min = 3101000000, $max = 3202000000),
            'email'             => $this->faker->unique()->safeEmail(),
            'tipo_doc'          => $this->faker->randomElement($array = array('NIT', 'CC')),
            'documento'         => $this->faker->numberBetween($min = 100000, $max = 9999999999),
            'created_at'        => now(),
        ];
    }
}
