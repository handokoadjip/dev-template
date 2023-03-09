<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aksi extends Model
{
    use HasFactory;
    use \App\Traits\TraitUuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aksi';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'aksi_id';

    const CREATED_AT = 'aksi_dibuat_pada';
    const UPDATED_AT = 'aksi_diubah_pada';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'aksi_menu_item_id',
        'aksi_label',
        'aksi_tautan',
    ];

    /**
     * The menuItems that belong to the role.
     */
    public function menuItems()
    {
        return $this->belongsToMany(MenuItems::class, 'grup_menu_item', 'grup_menu_item_grup_id', 'grup_menu_item_menu_item_id');
    }

    /**
     * The grups that belong to the role.
     */
    public function grups()
    {
        return $this->belongsToMany(Grup::class, 'grup_aksi', 'grup_aksi_aksi_id', 'grup_aksi_grup_id');
    }
}
