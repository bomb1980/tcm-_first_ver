<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OoapMasSubmenu extends Model
{
    protected $table = 'ooap_mas_submenu';

    protected $primaryKey = 'submenu_id';

    protected $fillable = [
        'menu_id', 'submenu_name', 'display_order', 'status', 'in_active', 'remember_token', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'
    ];
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];
    public $timestamps = true;
}
