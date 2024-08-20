<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    // Nama tabel
    public $table = 'layanan';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'user_id',
        'petugas_id',
        'lansia_id',
        'berat_badan',
        'tinggi_badan',
        'tekanan_darah',
        'keluhan',
        'created_at',
        'updated_at',
    ];

    public function petugas()
    {
        return $this->belongsTo('App\Models\Petugas', 'petugas_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function lansia()
    {
        return $this->belongsTo('App\Models\Lansia', 'lansia_id', 'id');
    }
}
