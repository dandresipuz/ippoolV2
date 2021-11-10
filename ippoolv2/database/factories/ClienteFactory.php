<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $nit        = $this->faker->unique(true)->numberBetween($min = 1111111, $max = 9999999);
        $nombre     = $this->faker->company();
        $contacto   = $this->faker->name();
        $telefono   = $this->faker->numberBetween($min = 3101000000, $max = 3202000000);
        $canal      = $this->faker->randomElement($array = array('Internet', 'Datos'));
        $email      = $this->faker->unique()->safeEmail;
        $usuario_id = $this->faker->numberBetween($min = 1, $max = 31);
        $created_at = now();

        return [
            'nit'           => $nit,
            'nombre'        => $nombre,
            'contacto'      => $contacto,
            'telefono'      => $telefono,
            'canal'         => $canal,
            'email'         => $email,
            'usuario_id'    => $usuario_id,
            'created_at'    => $created_at,
        ];
    }
}
