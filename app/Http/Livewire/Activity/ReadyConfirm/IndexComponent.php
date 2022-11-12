<?php

namespace App\Http\Livewire\Activity\ReadyConfirm;

use App\Models\OoapMasActtype;
use App\Models\OoapTblFiscalyear;
use App\Models\OoapTblReqform;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IndexComponent extends Component
{
    public $dept_list, $fiscalyear_list, $acttype_list, $acttype;
    public $total_amt;

    public function mount()
    {
        // $this->dept_list = DB::connection('oracle_umts')->table('um_mas_department')->pluck("dept_name_th", "dept_id");
        $this->fiscalyear_list = OoapTblFiscalyear::where('in_active', '=', false)->pluck('fiscalyear_code', 'fiscalyear_code AS fiscalyear_code2');
        $this->acttype_list = OoapMasActtype::where('inactive', '=', false)->pluck('name', 'id');

        $this->total_amt = OoapTblReqform::where('in_active', '=', false)->where('status', '=', 3)->where('fiscalyear_code', '=', 2565)->sum('total_amt');

        // foreach($total_amt as $key => $val) {
        //     $total_amt_arr[$key] = $val;
        // }

        // $this->total_amt = array_sum($total_amt_arr);

        // dd($total_amt_arr);
    }

    public function render()
    {
        return view('livewire.activity.ready-confirm.index-component');
    }
}
