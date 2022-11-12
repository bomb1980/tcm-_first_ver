<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OoapTblFybdtransfer extends Model
{
    protected $table = 'ooap_tbl_fybdtransfer';

    protected $primaryKey = 'id';

    protected $fillable = [
        'fiscalyear_code', 'fybdperiod_id', 'transfer_date', 'transfer_amt', 'transfer_desp', 'status', 'in_active', 'remember_token', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'
    ];

    protected $dates = [
        'transfer_date', 'created_at', 'updated_at', 'deleted_at'
    ];

    public $timestamps = true;
}
