<?php

namespace Database\Factories;

use App\Models\Ipaddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class IpaddressFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ipaddress::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ipaddress          = $this->faker->localIpv4();
        $estado             = $this->faker->randomElement($array = array(0, 1));
        $cliente_id         = $this->faker->numberBetween($min = 1, $max = 2000);
        $created_at         = $this->faker->now();
        return [
            'ipaddress'     => $ipaddress,
            'estado'        => $estado,
            'cliente_id'    => $cliente_id,
            'created_at'    => $created_at,
        ];
    }
}
