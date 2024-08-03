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
                'email'          => 'superadmin@gmail.com',
                'password'       => Hash::make('superadmin@gmail.com'),
                'remember_token' => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
                'lansia_id'      => null,
                'petugas_id'     => Petugas::first()->id ?? null,
            ],
            [
                'name'           => 'Sapik',
                'email'          => 'sapik@gmail.com',
                'password'       => Hash::make('sapik@gmail.com'),
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
