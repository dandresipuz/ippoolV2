<?php

namespace Database\Seeders;

use App\Models\Aliado;
use Illuminate\Database\Seeder;

class AliadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aliado = new aliado();
        $aliado->nombre       = 'Fractalia';
        $aliado->save();

        $aliado = new aliado();
        $aliado->nombre       = 'Oesia';
        $aliado->save();

        $aliado = new aliado();
        $aliado->nombre       = 'Telefonica';
        $aliado->save();

        $aliado = new aliado();
        $aliado->nombre       = 'Xorex';
        $aliado->save();
    }
}
