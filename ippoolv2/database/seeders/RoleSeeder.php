<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin      = Role::create(['name' => 'Admin']);
        $gestion    = Role::create(['name' => 'Gestion']);
        $consulta   = Role::create(['name' => 'Consulta']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$admin, $gestion, $consulta]);

        Permission::create(['name' => 'admin.users.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.show'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.excel'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.import'])->assignRole($admin);
        Permission::create(['name' => 'admin.users.passwordForm'])->assignRole($admin);


        Permission::create(['name' => 'admin.aliados.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.aliados.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.aliados.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.aliados.show'])->assignRole($admin);

        Permission::create(['name' => 'admin.centralizadores.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.centralizadores.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.centralizadores.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.centralizadores.show'])->assignRole($admin);
        Permission::create(['name' => 'admin.centralizadores.excel'])->assignRole($admin);
        Permission::create(['name' => 'admin.centralizadores.import'])->assignRole($admin);

        Permission::create(['name' => 'admin.areas.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.areas.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.areas.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.areas.show'])->assignRole($admin);

        Permission::create(['name' => 'admin.empresas.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.empresas.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.empresas.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.empresas.show'])->assignRole($admin);
        Permission::create(['name' => 'admin.empresas.excel'])->syncRoles([$admin, $gestion]);
        Permission::create(['name' => 'admin.empresas.import'])->syncRoles([$admin, $gestion]);

        // Liberar IP's y VPRN
        Permission::create(['name' => 'releases.empresas.indexResource'])->syncRoles([$admin, $gestion, $consulta]);
        Permission::create(['name' => 'releases.empresas.releaseResource'])->syncRoles([$admin, $gestion, $consulta]);
        Permission::create(['name' => 'releases.empresas.releaseVprnResource'])->syncRoles([$admin, $gestion, $consulta]);

        // Consultar
        Permission::create(['name' => 'consulta.empresas.indexEmpresas'])->syncRoles([$admin, $gestion, $consulta]);
        Permission::create(['name' => 'consulta.empresas.createEmpresa'])->syncRoles([$admin, $gestion, $consulta]);
        Permission::create(['name' => 'consulta.empresas.showEmpresa'])->syncRoles([$admin, $gestion, $consulta]);


        Permission::create(['name' => 'admin.ipaddresses.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.ipaddresses.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.ipaddresses.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.ipaddresses.show'])->assignRole($admin);
        Permission::create(['name' => 'admin.ipaddresses.excel'])->syncRoles([$admin, $gestion]);
        Permission::create(['name' => 'admin.ipaddresses.import'])->syncRoles([$admin, $gestion]);

        // Gestión
        Permission::create(['name' => 'gestion.ipaddresses.addIndexResource'])->syncRoles([$admin, $gestion, $consulta]);
        Permission::create(['name' => 'gestion.ipaddresses.addEditResource'])->syncRoles([$admin, $gestion, $consulta]);

        Permission::create(['name' => 'admin.wansolarwinds.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.wansolarwinds.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.wansolarwinds.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.wansolarwinds.show'])->assignRole($admin);
        Permission::create(['name' => 'admin.wansolarwinds.excel'])->syncRoles([$admin, $gestion]);
        Permission::create(['name' => 'admin.wansolarwinds.import'])->syncRoles([$admin, $gestion]);

        // Gestion
        Permission::create(['name' => 'admin.wansolarwinds.addIndexResource'])->syncRoles([$admin, $gestion, $consulta]);
        Permission::create(['name' => 'admin.wansolarwinds.addEditResource'])->syncRoles([$admin, $gestion, $consulta]);

        // Consulta
        Permission::create(['name' => 'admin.wansolarwinds.indexWansolarwinds'])->syncRoles([$admin, $gestion, $consulta]);
        Permission::create(['name' => 'admin.wansolarwinds.showWansolarwind'])->syncRoles([$admin, $gestion, $consulta]);
    }
}
