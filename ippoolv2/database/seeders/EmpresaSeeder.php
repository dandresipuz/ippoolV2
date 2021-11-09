<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa = new Empresa();
        $empresa->nombre       = 'Fractalia';
        $empresa->save();

        $empresa = new Empresa();
        $empresa->nombre       = 'Oesia';
        $empresa->save();

        $empresa = new Empresa();
        $empresa->nombre       = 'Telefonica';
        $empresa->save();

        $empresa = new Empresa();
        $empresa->nombre       = 'Xorex';
        $empresa->save();
    }
}
