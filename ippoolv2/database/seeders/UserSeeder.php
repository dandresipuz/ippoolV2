<?php

namespace Database\Seeders;

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
        $user->nombre       = 'Diego Andrés';
        $user->apellido     = 'Ipuz García';
        $user->telefono     = 3023744844;
        $user->login        = 'diego.ipuz';
        $user->email        = 'diegoandres.ipuz@fractalia.es';
        $user->password     = bcrypt('Pa$$w0rd2021*');
        $user->perfil       = 'Admin';
        $user->empresa_id   = 1;
        $user->area_id      = 11;
        $user->save();
    }
}
