<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Models\OoapTblFiscalyear;
use App\Models\OoapTblFybdtransfer;
use App\Models\OoapTblReqform;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FiscalyearController extends Controller
{
    public function getFiscalyear(Request $request)
    {
        $data = OoapTblFiscalyear::getDatas();


        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('fiscalyear_code', function ($data) {
                $text = $data->fiscalyear_code;
                return $text;
            })
            ->addColumn('sum_total_amt', function ($data) {

                $result_total_amt = OoapTblReqform::select('total_amt')
                ->where('fiscalyear_code','=',$data->fiscalyear_code)
                ->where('status','=',3)
                ->sum('total_amt');

                return number_format($result_total_amt,2);
            })
            ->addColumn('req_amt', function ($data) {
                $text = number_format($data->req_amt,2);
                return $text;
            })
            ->addColumn('budget_amt', function ($data) {
                $text = number_format($data->budget_amt,2);
                return $text;
            })
            ->addColumn('sum_transfer_amt', function ($data) {

                $result_transfer_amt = OoapTblFybdtransfer::select('transfer_amt')
                ->where('fiscalyear_code','=',$data->fiscalyear_code)
                ->sum('transfer_amt');

                return number_format($result_transfer_amt,2);
            })
            ->addColumn('centerbudget_amt', function ($data) {
                $text = number_format($data->centerbudget_amt,2);
                return $text;
            })
            ->addColumn('sum_pay_amt', function ($data) {
                $text = number_format($data->sum_pay_amt,2);
                return $text;
            })
            ->addColumn('centerbudget_balance', function ($data) {
                $text = number_format(($data->centerbudget_amt)-($data->pay_amt),2);
                return $text;
            })
            // ->addColumn('refund_amt', function ($data) {
            //     $text = number_format($data->refund_amt,2);
            //     return $text;
            // })
            // ->addColumn('ostbudget_amt', function ($data) {
            //     $text = number_format($data->ostbudget_amt,2);
            //     return $text;
            // })
            // ->addColumn('centerbudget_withdraw', function ($data) {
            //     $text = number_format(0,2);
            //     return $text;
            // })
            ->addColumn('regionbudget_amt', function ($data) {
                $text = number_format($data->regionbudget_amt,2);
                return $text;
            })
            ->addColumn('regionperiod_amt', function ($data) {
                $text = number_format(0,2);
                return $text;
            })
            ->addColumn('regionpay_amt', function ($data) {
                $text = number_format(0,2);
                return $text;
            })
            ->addColumn('regionbudget_balance', function ($data) {
                $text = number_format(0,2);
                return $text;
            })
            ->addColumn('edit', function ($data) {
                $button = '<div class="icondemo vertical-align-middle p-2">';
                $button .= '<a href="fiscalyear/' . $data->id . '/edit"><i class="icon wb-pencil" aria-hidden="true" title="แก้ไข"></i></a>';
                $button .= '</div>';
                return $button;
            })
            ->addColumn('del', function ($data) use ($request) {
                $button = '<button type="button" class="btn btn-pure btn-danger icon wb-trash"  onclick="change_delete(' . $data->id . ')" title="ลบ"></button>';
                $button .= '<form action="/master/fiscalyear/' . $data->id .'" id="delete_form' . $data->id . '" method="post">
                    <input type="hidden" name="_token" value="' . $request->get('token') . '">' . method_field('DELETE') . '</form>';
                return $button;
            })
            // ->rawColumns(['startdate_view','enddate_view','edit', 'del'])
            ->rawColumns(['id','fiscalyear_code','sum_period_amt','edit', 'del'])
            ->make(true);
    }
}
