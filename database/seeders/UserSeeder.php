<?php

namespace Database\Seeders;

use App\Models\Lansia;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'           => 'Abraham Lincoln',
                'email'          => 'kader@gmail.com',
                'password'       => Hash::make('kader@gmail.com'),
                'remember_token' => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
                'lansia_id'      => null,
                'petugas_id'     => null,
            ],
            [
                'name'           => 'Dokter Muda',
                'email'          => 'dokter@gmail.com',
                'password'       => Hash::make('dokter@gmail.com'),
                'remember_token' => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
                'lansia_id'      => null,
                'petugas_id'     => Petugas::first()->id ?? null,
            ],
            [
                'name'           => 'Lansia Tua',
                'email'          => 'lansia@gmail.com',
                'password'       => Hash::make('lansia@gmail.com'),
                'remember_token' => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
                'lansia_id'      => Lansia::first()->id ?? null,
                'petugas_id'     => null
            ]
        ];

        User::insert($user);
    }
}
