<?php

namespace Database\Factories;

use App\Models\Empresa;
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
        $ipaddress          = $this->faker->unique(true)->localIpv4();
        $service             = $this->faker->randomElement($array = array('Internet', 'Troncal SIP', 'Datos', 'Global LAN'));
        $estado             = $this->faker->randomElement($array = array(0, 1));
        // $empresa_id         = $this->faker->numberBetween($min = 1, $max = 99);
        $empresa_id         = Empresa::all()->random()->id;

        $created_at         = now();
        return [
            'ipaddress'     => $ipaddress,
            'service'       => $service,
            'estado'        => $estado,
            'empresa_id'    => $empresa_id,
            'created_at'    => $created_at,
        ];
    }
}
