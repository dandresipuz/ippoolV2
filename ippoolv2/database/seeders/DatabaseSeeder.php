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
        $this->call(AliadoSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(UserSeeder::class);
        \App\Models\User::factory(30)->create();
        \App\Models\Cliente::factory(100)->create();
        \App\Models\Ipaddress::factory(100)->create();
        \App\Models\Wansolarwind::factory(100)->create();
        // \App\Models\Wancliente::factory(100)->create();
    }
}
