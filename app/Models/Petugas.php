<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    // Nama tabel
    public $table = 'petugas';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'nama',
        'nip',
        'jenis_kelamin',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'foto',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function user()
    {
        return $this->hasOne('App\Models\User', 'petugas_id');
    }

    // Relasi one to many
    public function layanan()
    {
        return $this->hasMany('App\Models\Layanan', 'petugas_id');
    }
}
