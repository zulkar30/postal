<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $petugas = [
            [
                'nama'           => 'Dokter Muda',
                'nip'            => '140304043005562',
                'jenis_kelamin'  => 'laki-laki',
                'no_hp'          => '082286391023',
                'tempat_lahir'   => 'Wonosari',
                'tanggal_lahir'  => '1982-12-01',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ]
        ];

        Petugas::insert($petugas);
    }
}
