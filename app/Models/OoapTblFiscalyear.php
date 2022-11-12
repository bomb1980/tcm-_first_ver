<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OoapTblFiscalyear extends Model
{

    protected $table = 'ooap_tbl_fiscalyear';


    protected $primaryKey = 'id';

    protected $fillable = [
        'fiscalyear_code', 'startdate', 'enddate', 'req_status', 'req_startdate', 'req_enddate', 'req_amt', 'budget_amt', 'refund_amt', 'ostbudget_amt', 'centerbudget_amt', 'regionbudget_amt', 'status', 'in_active', 'remember_token', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'
    ];

    static function getDatas( $id = NULL ) {

        $data = self::select('*')->where('in_active','=', false);

        if( !empty( $id ) ) {
            $data = $data->where('id', $id );

        }

        $data = $data->orderBy('fiscalyear_code','desc');

        return $data;
    }
}
