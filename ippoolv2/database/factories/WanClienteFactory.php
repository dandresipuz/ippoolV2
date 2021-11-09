<?php

namespace Database\Factories;

use App\Models\Wancliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class WanClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wancliente::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $vprn          = $this->faker->numberBetween($min = 500000000, $max = 599999999);
        $vlan_id       = $this->faker->numberBetween($min = 1100, $max = 4000);
        $cliente_id    = $this->faker->numberBetween($min = 1, $max = 2000);
        $created_at    = $this->faker->now();

        return [
            'vprn' => $vprn,
            'vlan_id' => $vlan_id,
            'cliente_id' => $cliente_id,
            'created_at' => $created_at,

        ];
    }
}
