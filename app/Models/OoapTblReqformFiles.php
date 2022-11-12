<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OoapTblReqformFiles extends Model
{
    protected $table = 'ooap_tbl_reqform_files';

    protected $primaryKey = 'files_id';

    protected $fillable = [
        'files_ori',
        'files_gen',
        'files_path',
        'files_type',
        'files_size',
        'reqform_id',

        'status',
        'in_active',
        'remember_token',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
}
