<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OoapTblFybdpayment extends Model
{
    protected $table = 'ooap_tbl_fybdpayment';

    protected $primaryKey = 'id';

    protected $fillable = [
        'fiscalyear_code', 'pay_date', 'pay_amt', 'pay_name', 'pay_desp', 'status', 'in_active', 'remember_token', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'
    ];

    protected $dates = [
        'pay_date', 'created_at', 'updated_at', 'deleted_at'
    ];

    public $timestamps = true;
}
