<?php

namespace Database\Factories;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $documento  = $this->faker->unique(true)->numberBetween($min = 111111111, $max = 999999999);
        $nombre     = $this->faker->company();
        $segmento   = $this->faker->randomElement($array = array('Empresas', 'Juridicas', 'Negocios'));
        // $usuario_id = $this->faker->numberBetween($min = 1, $max = 31);
        $usuario_id = User::all()->random()->id;
        $created_at = now();

        return [
            'tipo_doc'      => $this->faker->randomElement($array = array('NIT', 'CC')),
            'documento'     => $documento,
            'empresa'       => $nombre,
            'segmento'      => $segmento,
            'usuario_id'    => $usuario_id,
            'created_at'    => $created_at,
        ];
    }
}
