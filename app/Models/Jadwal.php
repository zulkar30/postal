<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    // Nama tabel
    public $table = 'jadwal';

    // Untuk format date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Kolom tabel yang boleh diisi
    protected $fillable = [
        'lansia_id',
        'tanggal',
        'jam',
        'lokasi',
        'kegiatan',
        'created_at',
        'updated_at',
    ];

    public function lansia()
    {
        return $this->belongsTo('App\Models\Lansia', 'lansia_id', 'id');
    }

    public function sendTelegramNotification()
    {
        $message = "Jadwal pemeriksaan baru pada tanggal {$this->tanggal} jam {$this->jam} di {$this->lokasi}";

        // Mengirim notifikasi ke lansia terkait
        $this->lansia->notify(new \App\Notifications\NotifTele($message));
    }
}
