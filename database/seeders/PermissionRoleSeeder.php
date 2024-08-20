<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        // Kader
        $kader_permissions = $permissions->filter(function ($permission) {
            return substr($permission->name, 0, 10) != 'lay_dokter' && substr($permission->name, 0, 10) != 'lay_lansia';
        });
        Role::findOrFail(1)->permission()->sync($kader_permissions->pluck('id'));

        // Dokter
        $dokter_permissions = $permissions->filter(function ($permission) {
            return substr($permission->name, 0, 11) != 'management_' && substr($permission->name, 0, 7) != 'master_' && substr($permission->name, 0, 10) != 'lay_lansia' && substr($permission->name, 0, 9) != 'lay_kader';
        });
        Role::findOrFail(2)->permission()->sync($dokter_permissions);

        // Lansia
        $lansia_permissions = $permissions->filter(function ($permission) {
            return substr($permission->name, 0, 11) != 'management_' && substr($permission->name, 0, 7) != 'master_' && substr($permission->name, 0, 9) != 'lay_kader' && substr($permission->name, 0, 10) != 'lay_dokter' && substr($permission->name, 0, 14) != 'petugas_access' && substr($permission->name, 0, 13) != 'lansia_access' && substr($permission->name, 0, 14) != 'layanan_create' && substr($permission->name, 0, 12) != 'layanan_edit' && substr($permission->name, 0, 14) != 'layanan_delete' && substr($permission->name, 0, 13) != 'jadwal_create' && substr($permission->name, 0, 11) != 'jadwal_edit' && substr($permission->name, 0, 13) != 'jadwal_delete';
        });
        Role::findOrFail(3)->permission()->sync($lansia_permissions);
    }
}
