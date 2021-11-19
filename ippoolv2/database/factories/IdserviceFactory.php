<?php

namespace Database\Factories;

use App\Models\Empresa;
use App\Models\Idservice;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdserviceFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Idservice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $service    = $this->faker->numberBetween($min = 100000, $max = 9999999999);
        $empresa_id = Empresa::all()->random()->id;
        return [
            'service'       => $service,
            'empresa_id'    => $empresa_id,

        ];
    }
}
