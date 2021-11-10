<?php

namespace Database\Factories;

use App\Models\Wancliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class WanclienteFactory extends Factory
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

        $vprn          = $this->faker->unique(true)->numberBetween($min = 500000000, $max = 599999999);
        $vlan_id       = $this->faker->unique(true)->numberBetween($min = 1, $max = 100);
        $cliente_id    = $this->faker->numberBetween($min = 1, $max = 99);
        $created_at    = now();

        return [
            'vprn' => $vprn,
            'vlan_id' => $vlan_id,
            'cliente_id' => $cliente_id,
            'created_at' => $created_at,

        ];
    }
}
