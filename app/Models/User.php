<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lansia_id',
        'petugas_id',
        'name',
        'email',
        'password',
        'foto'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Relasi many to many
    public function role()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    // Relasi one to many
    public function role_user()
    {
        return $this->hasMany('App\Models\RoleUser', 'user_id');
    }

    public function lansia()
    {
        return $this->belongsTo('App\Models\Lansia', 'lansia_id', 'id');
    }

    public function petugas()
    {
        return $this->belongsTo('App\Models\Petugas', 'petugas_id', 'id');
    }

    // Relasi one to many
    public function layanan()
    {
        return $this->hasMany('App\Models\Layanan', 'user_id');
    }
}
