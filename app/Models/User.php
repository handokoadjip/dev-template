<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use \App\Traits\TraitUuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengguna';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'pengguna_id';

    const CREATED_AT = 'pengguna_dibuat_pada';
    const UPDATED_AT = 'pengguna_diubah_pada';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pengguna_nama',
        'pengguna_email',
        'pengguna_password',
        'pengguna_unit_kerja_id',
        'pengguna_nik',
        'pengguna_nip',
        'pengguna_telp',
        'pengguna_jenis_kelamin',
        'pengguna_agama',
        'pengguna_alamat',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'pengguna_password',
        'pengguna_remeber_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'pengguna_email_verifikasi_pada' => 'datetime',
    ];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->pengguna_password;
    }

    /**
     * The grups that belong to the user.
     */
    public function grups()
    {
        return $this->belongsToMany(Grup::class, 'pengguna_grup', 'pengguna_grup_pengguna_id', 'pengguna_grup_grup_id');
    }

    /**
     * Get the unit kerja associated with the user.
     */
    public function unitKerja()
    {
        return $this->hasOne(UnitKerja::class, 'unit_kerja_id', 'pengguna_unit_kerja_id');
    }

    /**
     * The unitKerjas that belong to the role.
     */
    public function unitKerjas()
    {
        return $this->belongsToMany(UnitKerja::class, 'pengguna_unit_kerja', 'pengguna_unit_kerja_pengguna_id', 'pengguna_unit_kerja_unit_kerja_id');
    }
}
