<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OoapMasRolePer extends Model
{

    protected $table = 'ooap_mas_role_per';

    protected $primaryKey = 'role_per_id';

    protected $fillable = [
        'role_id', 'submenu_id', 'view_data', 'insert_data', 'update_data', 'delete_data', 'apprv_data', 'create_by', 'create_date', 'update_by', 'update_date'
    ];
}
