<?php

namespace App\Http\Controllers\Api\Manage;

use App\Http\Controllers\Controller;
use App\Models\OoapTblFybdtransfer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReceiveTransferController extends Controller
{
    public function getRequest(Request $request)
    {
        $data = OoapTblFybdtransfer::select([
                'ooap_tbl_fybdtransfer.id',
                'ooap_tbl_fybdperiod.period_no',
                'ooap_tbl_fybdtransfer.transfer_date',
                'ooap_tbl_fybdtransfer.transfer_amt',
            ])
            ->leftJoin('ooap_tbl_fybdperiod', 'ooap_tbl_fybdtransfer.fybdperiod_id', '=', 'ooap_tbl_fybdperiod.id')
            ->where('ooap_tbl_fybdtransfer.in_active','=', 0)
            ->orderBy('period_no','asc');

            if($request->fiscalyear_code){
                $data = $data->where('ooap_tbl_fybdtransfer.fiscalyear_code','=', $request->fiscalyear_code);
            }else{
                $year = date("Y"+543);
                $data = $data->where('ooap_tbl_fybdtransfer.fiscalyear_code','=', $year);
            }
        // dd($data->toSql());
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('transfer_date_show', function ($data) {
                $button = datetoview($data->transfer_date);
                return $button;
            })
            ->addColumn('transfer_amt_show', function ($data) {
                $button = number_format($data->transfer_amt, 2);
                return $button;
            })
            ->addColumn('edit', function ($data) {
                $button = '<div class="icondemo vertical-align-middle p-2">';
                $button .= '<a href="/manage/receivetransfer/' . $data->id . '/edit"><i class="icon wb-pencil" aria-hidden="true" title="แก้ไข"></i></a>';
                $button .= '</div>';
                return $button;
            })
            ->addColumn('del', function ($data) use ($request) {
                $button = '<button type="button" class="btn btn-pure btn-danger icon wb-trash"  onclick="change_delete(' . $data->id . ')" title="ลบ"></button>';
                $button .= '<form action="/master/center_master11/' . $data->id .'" id="delete_form' . $data->id . '" method="post">
                    <input type="hidden" name="_token" value="' . $request->get('token') . '">' . method_field('DELETE') . '</form>';
                return $button;
            })
            ->rawColumns(['edit', 'transfer_date_show', 'transfer_amt_show'])
            ->make(true);
    }
}
