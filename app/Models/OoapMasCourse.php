<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OoapMasCourse extends Model
{

    protected $table = 'ooap_mas_course';

    protected $primaryKey = 'id';

    protected $fillable = [
        'code', 'name', 'shortname', 'descp', 'dept_id', 'ownertype_id', 'ownerdescp', 'acttype_id', 'coursegroup_id', 'coursesubgroup_id', 'coursetype_id', 'hour_descp', 'day_descp', 'people_descp', 'trainer_descp', 'status', 'in_active', 'remember_token', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'
    ];
}
