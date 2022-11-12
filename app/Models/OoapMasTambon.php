<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OoapMasTambon extends Model
{

    protected $table = 'ooap_mas_tambon';

    protected $primaryKey = 'tambon_id';

    protected $fillable = [
        'tambon_code', 'postcode', 'tambon_name', 'amphur_id', 'province_id', 'geo_id', 'status', 'in_active', 'remember_token', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'
    ];
}
