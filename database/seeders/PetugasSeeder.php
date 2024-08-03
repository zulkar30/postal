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
                'nama'           => 'Abraham Lincoln',
                'nip'            => '123456789',
                'jenis_kelamin'  => 'laki-laki',
                'no_hp'          => '083127719390',
                'tempat_lahir'   => 'Rintis',
                'tanggal_lahir'  => '2000-03-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ]
        ];

        Petugas::insert($petugas);
    }
}
