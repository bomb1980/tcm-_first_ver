<?php

namespace App\Http\Livewire\Activity\Operate;

use App\Models\OoapTblFiscalyear;
use App\Models\OoapTblReqform;
use App\Models\UmMasDepartment;
use Livewire\Component;

class OperateComponent extends Component
{
    public $dept_list, $fiscalyear_list, $acttype_list = [], $acttype;
    public $total_amt1 = 400000, $total_amt2 = 6000, $total_amt_arr;


    public function mount()
    {
        // $this->dept_list = DB::connection('oracle_umts')->table('um_mas_department')->pluck("dept_name_th", "dept_id");
        $this->dept_list = UmMasDepartment::pluck('dept_name_th', 'dept_id');
        $this->fiscalyear_list = OoapTblFiscalyear::where('in_active', '=', false)->pluck('fiscalyear_code', 'fiscalyear_code as fiscalyear_code2');

        $this->total_amt = OoapTblReqform::where('in_active', '=', false)->where('status', '=', 3)->where('fiscalyear_code', '=', 2565)
            ->pluck('total_amt');

        $this->total_amt = OoapTblReqform::where('in_active', '=', false)->where('status', '=', 3)->where('fiscalyear_code', '=', 2565)
            ->sum('total_amt');

        // dd($total_amt_arr);
    }
    public function render()
    {
        return view('livewire.activity.operate.operate-component');
    }
}
