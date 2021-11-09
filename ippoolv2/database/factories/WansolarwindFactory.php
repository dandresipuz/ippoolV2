<?php

namespace Database\Factories;

use App\Models\Wansolarwind;
use Illuminate\Database\Eloquent\Factories\Factory;

class WansolarwindFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wansolarwind::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $vlanid        = $this->faker->numberBetween($min = 1100, $max = 5000);
        $redwanuno     = $this->faker->ipv4();
        $redwandos     = $this->faker->ipv4();
        $ipbogrtdntres = $this->faker->ipv4();
        $ipboggcuno    = $this->faker->ipv4();
        $ipbog4100     = $this->faker->ipv4();
        $ipboggcdos    = $this->faker->ipv4();
        $estado        = $this->faker->randomElement($array = array(0, 1));
        $created_at    = $this->faker->now();

        return [
            'vlanid'        => $vlanid,
            'redwanuno'     => $redwanuno,
            'redwandos'     => $redwandos,
            'ipbogrtdntres' => $ipbogrtdntres,
            'ipboggcuno'    => $ipboggcuno,
            'ipbog4100'     => $ipbog4100,
            'ipboggcdos'    => $ipboggcdos,
            'estado'        => $estado,
            'created_at'    => $created_at,
        ];
    }
}
