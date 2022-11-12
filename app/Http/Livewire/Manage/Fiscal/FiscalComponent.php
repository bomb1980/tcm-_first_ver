<?php

namespace App\Http\Livewire\Manage\Fiscal;

use App\Models\OoapTblFiscalyear;
use App\Models\OoapMasActtype;
use App\Models\OoapTblReqform;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class FiscalComponent extends Component
{
  public $fiscalyear_select, $fiscalyear_code, $reqform_list = [], $acttype_list = [], $datareq_list = [], $budget_amt, $req_amt, $budget_amt_test;

  public function mount()
  {
    $this->fiscalyear_select = OoapTblFiscalyear::where('in_active', '=', false)->get()->pluck('fiscalyear_code', 'fiscalyear_code');
    $this->fiscalyear_code = date("Y") + 543;

    $this->datareq_list = OoapTblFiscalyear::select('req_amt', 'budget_amt')
      ->where('fiscalyear_code', '=', $this->fiscalyear_code)
      ->first();


    $this->req_amt = $this->datareq_list->req_amt ?? 0;

    $this->budget_amt = $this->datareq_list->budget_amt ?? 0;
    $this->budget_amt_test = $this->budget_amt ?? 0;
  }

  public function changeyear($years)
  {
    // dd($years);
    $this->fiscalyear_code = $years;

    $this->datareq_list = OoapTblFiscalyear::select('req_amt', 'budget_amt')
      ->where('fiscalyear_code', '=', $this->fiscalyear_code)
      ->first();

    $this->req_amt = $this->datareq_list->req_amt ?? 0;

    $this->budget_amt = $this->datareq_list->budget_amt ?? 0;
    $this->budget_amt_test = $this->budget_amt ?? 0;
    // $this->datareq_list=OoapTblFiscalyear::select('req_amt','budget_amt')
    // ->where('fiscalyear_code',$this->fiscalyear_search)
    // ->first();
    // $this->req_amt = $this->datareq_list->req_amt ?? 0;
    // $this->budget_amt = $this->datareq_list->budget_amt ?? 0;
  }

  public function render()
  {
    $this->reqform_list = OoapTblReqform::select('ooap_mas_acttype.name')
      ->selectRaw('sum(ooap_tbl_reqform.total_amt) as sum_total_amt')
      ->leftjoin('ooap_mas_acttype', 'ooap_tbl_reqform.acttype_id', 'ooap_mas_acttype.id')
      ->where([['ooap_tbl_reqform.in_active', '=', false], ['ooap_tbl_reqform.fiscalyear_code', '=', $this->fiscalyear_code], ['ooap_tbl_reqform.status', '=', 3]])
      ->groupBy('ooap_mas_acttype.name', 'ooap_tbl_reqform.in_active', 'ooap_tbl_reqform.status')
      ->orderBy('ooap_mas_acttype.name')
      ->get();

    $this->acttype_list = OoapMasActtype::select('name')
      ->where('inactive', '=', 0)
      ->get();

    return view('livewire.manage.fiscal.fiscal-component');
  }

  public function submit()
  {
    if ($this->budget_amt) {
      $this->validate([
        'budget_amt' => 'required'
      ], [
        'budget_amt.required' => 'กรุณากรอกจำนวนงบประมาณ',
      ]);
      OoapTblFiscalyear::where('fiscalyear_code', '=', $this->fiscalyear_code)->update([
        'budget_amt' => $this->budget_amt,
        'updated_at' => now(),
        'updated_by' => auth()->user()->emp_citizen_id
      ]);
      $this->emit('popup');
    }
  }
}
