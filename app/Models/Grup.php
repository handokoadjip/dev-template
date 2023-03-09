<?php

namespace App\Models;

use Harimayco\Menu\Models\MenuItems;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    use HasFactory;
    use \App\Traits\TraitUuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'grup';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'grup_id';

    const CREATED_AT = 'grup_dibuat_pada';
    const UPDATED_AT = 'grup_diubah_pada';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'grup_nama',
        'grup_deskripsi',
    ];

    /**
     * The penggunas that belong to the role.
     */
    public function penggunas()
    {
        return $this->belongsToMany(User::class, 'pengguna_grup', 'pengguna_grup_grup_id', 'pengguna_grup_pengguna_id');
    }

    /**
     * The menuItems that belong to the role.
     */
    public function menuItems()
    {
        return $this->belongsToMany(MenuItems::class, 'grup_menu_item', 'grup_menu_item_grup_id', 'grup_menu_item_menu_item_id');
    }

    /**
     * The menuItems that belong to the role.
     */
    public function aksis()
    {
        return $this->belongsToMany(Aksi::class, 'grup_aksi', 'grup_aksi_grup_id', 'grup_aksi_aksi_id');
    }

    /**
     * The unitKerjas that belong to the role.
     */
    public function unitKerjas()
    {
        return $this->belongsToMany(UnitKerja::class, 'grup_unit_kerja', 'grup_unit_kerja_grup_id', 'grup_unit_kerja_unit_kerja_id');
    }
}
