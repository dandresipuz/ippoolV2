<?php

namespace Database\Seeders;

use App\Models\Aliado;
use App\Models\Area;
use App\Models\Centralizador;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->nombre               = 'Diego Andrés';
        $user->apellido             = 'Ipuz García';
        $user->tipo_doc             = 'CC';
        $user->documento            = 1075210888;
        $user->telefono             = 3023744844;
        $user->login                = 'diego.ipuz';
        $user->email                = 'diegoandres.ipuz@fractalia.es';
        $user->password             = bcrypt('Pa$$w0rd2021*');
        $user->perfil               = 'Admin';
        $user->aliado_id            = Aliado::all()->random()->id;
        $user->area_id              = Area::all()->random()->id;
        $user->centralizador_id     = Centralizador::all()->random()->id;
        $user->save();
    }
}
