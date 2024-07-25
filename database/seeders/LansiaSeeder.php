<?php

namespace Database\Seeders;

use App\Models\Lansia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LansiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lansia = [
            [
                'nama'           => 'Sapik',
                'nik'            => '140304043005562',
                'jenis_kelamin'  => 'laki-laki',
                'no_hp'          => '082286391023',
                'tempat_lahir'   => 'Wonosari',
                'tanggal_lahir'  => '1982-12-01',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ]
        ];
        Lansia::insert($lansia);
    }
}
