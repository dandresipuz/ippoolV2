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

        $vlanid        = $this->faker->unique(true)->numberBetween($min = 1100, $max = 40000);
        $vprn          = $this->faker->unique(true)->numberBetween($min = 500000000, $max = 599999999);
        $redwanuno     = $this->faker->unique(true)->ipv4();
        $redwandos     = $this->faker->unique(true)->ipv4();
        $ipbogrtdntres = $this->faker->unique(true)->ipv4();
        $ipboggcuno    = $this->faker->unique(true)->ipv4();
        $ipbog41000    = $this->faker->unique(true)->ipv4();
        $ipboggcdos    = $this->faker->unique(true)->ipv4();
        $estado        = $this->faker->randomElement($array = array(0, 1));
        $created_at    = now();

        return [
            'vlanid'        => $vlanid,
            'vprn'          => $vprn,
            'redwanuno'     => $redwanuno,
            'redwandos'     => $redwandos,
            'ipbogrtdntres' => $ipbogrtdntres,
            'ipboggcuno'    => $ipboggcuno,
            'ipbog41000'    => $ipbog41000,
            'ipboggcdos'    => $ipboggcdos,
            'estado'        => $estado,
            'created_at'    => $created_at,
        ];
    }
}
