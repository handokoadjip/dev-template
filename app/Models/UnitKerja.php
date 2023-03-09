<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;
    use \App\Traits\TraitUuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unit_kerja';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'unit_kerja_id';

    const CREATED_AT = 'unit_kerja_dibuat_pada';
    const UPDATED_AT = 'unit_kerja_diubah_pada';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'unit_kerja_nama',
        'unit_kerja_deskripsi',
    ];

    /**
     * Get the user that owns the phone.
     */
    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_unit_kerja_id', 'unit_kerja_id');
    }

    /**
     * The menuItems that belong to the role.
     */
    public function grups()
    {
        return $this->belongsToMany(Grup::class, 'grup_unit_kerja', 'grup_unit_kerja_unit_kerja_id', 'grup_unit_kerja_grup_id');
    }

    /**
     * The menuItems that belong to the role.
     */
    public function penggunas()
    {
        return $this->belongsToMany(User::class, 'pengguna_unit_kerja', 'pengguna_unit_kerja_unit_kerja_id', 'pengguna_unit_kerja_pengguna_id');
    }
}
