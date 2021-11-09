<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa = new Area();
        $empresa->nombre       = 'CCST';
        $empresa->save();

        $empresa = new Area();
        $empresa->nombre       = 'CGP';
        $empresa->save();

        $empresa = new Area();
        $empresa->nombre       = 'CNOC';
        $empresa->save();

        $empresa = new Area();
        $empresa->nombre       = 'Coordinador Servicios Convergentes';
        $empresa->save();

        $empresa = new Area();
        $empresa->nombre       = 'Direccion Ingenieria Clientes';
        $empresa->save();

        $empresa = new Area();
        $empresa->nombre       = 'Especialista Servicios Convergentes';
        $empresa->save();

        $empresa = new Area();
        $empresa->nombre       = 'Implantacion Soluciones';
        $empresa->save();

        $empresa = new Area();
        $empresa->nombre       = 'Ingeniero Especialista';
        $empresa->save();

        $empresa = new Area();
        $empresa->nombre       = 'Profesional Atencion Clientes TOP';
        $empresa->save();

        $empresa = new Area();
        $empresa->nombre       = 'Profesional Calidad Instalaciones';
        $empresa->save();

        $empresa = new Area();
        $empresa->nombre       = 'Profesional Evaluación Técnica';
        $empresa->save();

        $empresa = new Area();
        $empresa->nombre       = 'Profesional Gestion Servicio y Calidad';
        $empresa->save();

        $empresa = new Area();
        $empresa->nombre       = 'Profesional Nivel II';
        $empresa->save();
    }
}
