<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lansia extends Model
{
    use Notifiable;
    // Nama tabel
    public $table = 'lansia';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'nama',
        'nik',
        'jenis_kelamin',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'foto',
        'chat_id',
        'created_at',
        'updated_at',
    ];

    // Relasi one to many
    public function layanan()
    {
        return $this->hasMany('App\Models\Layanan', 'lansia_id');
    }

    // Relasi one to many
    public function user()
    {
        return $this->hasMany('App\Models\User', 'lansia_id');
    }

    // Relasi one to many
    public function jadwal()
    {
        return $this->hasMany('App\Models\Jadwal', 'lansia_id');
    }

    public function routeNotificationForTelegram()
    {
        return $this->no_hp;
    }

    // public function routeNotificationForWhatsApp()
    // {
    //     return $this->no_hp;
    // }
}
