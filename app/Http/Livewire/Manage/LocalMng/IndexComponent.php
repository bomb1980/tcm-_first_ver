<?php

namespace App\Http\Livewire\Manage\LocalMng;

use App\Models\OoapTblFiscalyear;
use App\Models\OoapTblFybdpayment;
use App\Models\OoapTblFybdtransfer;
use App\Models\OoapTblReqform;
use App\Models\UmMasDepartment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IndexComponent extends Component
{
    public $dept_list, $fiscalyear_list, $fiscalyear_code, $total_sum, $req_amt, $budget_amt, $centerbudget_amt, $regionbudget_amt;
    public $receive_tran, $tran_hold, $mng_hold, $disburse, $balance_center, $balance_region, $balance_sum, $mng_bond, $pro_bond, $tran_back;
    public $able_mng_bud, $mng_center, $mng_region, $balance_end;

    public function mount()
    {
        // $this->dept_list = DB::connection('oracle_umts')->table('um_mas_department')->pluck("dept_name_th", "dept_id");
        $this->dept_list = UmMasDepartment::pluck('dept_name_th', 'dept_id');
        $this->fiscalyear_list = OoapTblFiscalyear::where('in_active','=', false)->pluck('fiscalyear_code', 'fiscalyear_code AS fiscalyear_code2');
        $this->centerbudget_amt = $this->disburse = $this->regionbudget_amt = $this->mng_bond = $this->pro_bond = $this->tran_back = $this->mng_hold = 0;
        $this->able_mng_bud = $this->mng_center = $this->mng_region = $this->balance_center = $this->balance_region = $this->balance_sum = $this->balance_end = 0;
        $this->fiscalyear_code = date("Y")+543;

        $reqform_get = OoapTblReqform::where('in_active','=', false)->where('fiscalyear_code','=', $this->fiscalyear_code)
            ->where('status','=', 3)->get()->toArray();
        if ($reqform_get) {
            foreach ($reqform_get as $key => $valreq) {
                $total_sum[] = $valreq['total_amt'];
            }
            $this->total_sum = array_sum($total_sum);
        } else {
            $this->total_sum = 0;
        }

        $fiscal_get = OoapTblFiscalyear::where('in_active','=', false)->where('fiscalyear_code','=', $this->fiscalyear_code)
            ->where('status','=', 3)->first();
        $this->req_amt = $fiscal_get->req_amt ?? 0;
        $this->budget_amt = $fiscal_get->budget_amt ?? 0;
        $this->receive_tran = OoapTblFybdtransfer::where('in_active','=', false)->where('fiscalyear_code','=', $this->fiscalyear_code)->sum('transfer_amt');
        $this->tran_hold = $this->budget_amt - $this->receive_tran;
        $this->mng_hold = $this->receive_tran;

        $this->centerbudget_amt = $fiscal_get->centerbudget_amt ?? 0;
        $this->regionbudget_amt = $fiscal_get->regionbudget_amt ?? 0;
        // $this->disburse = 11000;
        $this->disburse = OoapTblFybdpayment::where('in_active','=', 0)->where('fiscalyear_code','=', $this->fiscalyear_code)->sum('pay_amt');
        $this->mng_bond = $this->pro_bond = 14000;
        $this->tran_back = 0;
    }

    public function setValue($name, $val)
    {
        $this->$name = $val; //$this->fiscalyear_code = $val

        $reqform_get = OoapTblReqform::where('in_active','=', false)->where('fiscalyear_code','=', $this->fiscalyear_code)
            ->where('status','=', 3)->get()->toArray();
        if ($reqform_get) {
            foreach ($reqform_get as $key => $valreq) {
                $total_sum[] = $valreq['total_amt'];
            }
            $this->total_sum = array_sum($total_sum);
        } else {
            $this->total_sum = 0;
        }

        $fiscal_get = OoapTblFiscalyear::where('in_active','=', false)->where('fiscalyear_code','=', $val)->first();
        $this->req_amt = $fiscal_get->req_amt ?? 0;
        $this->budget_amt = $fiscal_get->budget_amt ?? 0;
        $this->receive_tran = OoapTblFybdtransfer::where('in_active','=', false)->where('fiscalyear_code','=', $this->fiscalyear_code)->sum('transfer_amt');
        $this->tran_hold = $this->budget_amt - $this->receive_tran;
        $this->mng_hold = $this->receive_tran;

        $this->centerbudget_amt = $fiscal_get->centerbudget_amt ?? 0;
        $this->regionbudget_amt = $fiscal_get->regionbudget_amt ?? 0;
        // $this->disburse = 11000;
        $this->disburse = OoapTblFybdpayment::where('in_active','=', 0)->where('fiscalyear_code','=', $this->fiscalyear_code)->sum('pay_amt');
        $this->mng_bond = $this->pro_bond = 14000;
        $this->tran_back = 0;

    }

    public function submit()
    {
        OoapTblFiscalyear::where('fiscalyear_code','=', $this->fiscalyear_code)
            ->update([
                'centerbudget_amt' => $this->mng_center,
                'regionbudget_amt' => $this->mng_region,
                'ostbudget_amt' => $this->balance_end,
            ]);
        $this->emit('popup');
    }
    protected $listeners = ['redirect-to' => 'redirect_to'];

    public function redirect_to()
    {
        return redirect()->to('/manage/local_mng');
    }

    public function render()
    {
        if ($this->centerbudget_amt && $this->regionbudget_amt) {
            if ($this->disburse > 0 && $this->disburse <= $this->centerbudget_amt) {
                $this->balance_center = $this->centerbudget_amt - $this->disburse;
            } elseif ($this->disburse > 0 && $this->disburse > $this->centerbudget_amt) {
                $this->disburse = $this->centerbudget_amt;
                $this->balance_center = $this->centerbudget_amt - $this->disburse;
            } else {
                $this->balance_center = $this->centerbudget_amt;
            }

            if ($this->mng_bond && $this->pro_bond) {
                if ($this->regionbudget_amt < $this->mng_bond + $this->pro_bond) {
                    if ($this->mng_bond > $this->pro_bond) {
                        $this->mng_bond = $this->regionbudget_amt - $this->pro_bond;
                    } elseif ($this->pro_bond > $this->mng_bond) {
                        $this->pro_bond = $this->regionbudget_amt - $this->mng_bond;
                    }
                    $this->balance_region = 0;
                } else {
                    $this->balance_region = $this->regionbudget_amt - ($this->mng_bond + $this->pro_bond);
                }
            } elseif (!$this->mng_bond && $this->pro_bond) {
                if ($this->pro_bond > $this->regionbudget_amt) {
                    $this->pro_bond = $this->regionbudget_amt;
                    $this->balance_region = 0;
                } else {
                    $this->balance_region = $this->regionbudget_amt - $this->pro_bond;
                }
            } elseif ($this->mng_bond && !$this->pro_bond) {
                if ($this->mng_bond > $this->regionbudget_amt) {
                    $this->mng_bond = $this->regionbudget_amt;
                    $this->balance_region = 0;
                } else {
                    $this->balance_region = $this->regionbudget_amt - $this->mng_bond;
                }
            } else {
                $this->balance_region = $this->regionbudget_amt;
            }

            $this->balance_sum = $this->balance_center + $this->balance_region;

            if ($this->tran_back > $this->balance_sum) {
                $this->tran_back = $this->balance_sum;
            }

            if ($this->tran_back > 0) {
                $this->mng_hold = $this->receive_tran - ($this->centerbudget_amt + $this->regionbudget_amt) + $this->tran_back;
            } else {
                $this->tran_back = 0;
                $this->mng_hold = $this->receive_tran - ($this->centerbudget_amt + $this->regionbudget_amt);
            }
        } else {
            $this->mng_hold = $this->receive_tran;
        }

        $this->able_mng_bud = $this->mng_hold + $this->balance_center + $this->balance_region;

        if ($this->mng_center && $this->mng_region) {
            $this->balance_end = $this->able_mng_bud + ($this->centerbudget_amt - $this->mng_center) + ($this->regionbudget_amt - $this->mng_region);
        } elseif (!$this->mng_center && $this->mng_region) {
            $this->balance_end = $this->able_mng_bud + ($this->regionbudget_amt - $this->mng_region);
        } elseif ($this->mng_center && !$this->mng_region) {
            $this->balance_end = $this->able_mng_bud + ($this->centerbudget_amt - $this->mng_center);
        } else {
            $this->balance_end = $this->able_mng_bud;
        }

        return view('livewire.manage.local-mng.index-component');
    }
}
