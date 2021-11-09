<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmpresaSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(UserSeeder::class);
        \App\Models\User::factory(30)->create();
        \App\Models\Cliente::factory(2000)->create();
        \App\Models\Ipaddress::factory(1000)->create();
        \App\Models\Wansolarwind::factory(4000)->create();
        \App\Models\Wancliente::factory(4000)->create();
    }
}
