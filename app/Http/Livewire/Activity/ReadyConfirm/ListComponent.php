<?php

namespace App\Http\Livewire\Activity\ReadyConfirm;

use App\Models\OoapTblFiscalyear;
use App\Models\OoapTblReqform;
use Livewire\Component;

class ListComponent extends Component
{
  public $fiscalyear_list, $fiscalyear_code;
  public $actlist, $select = [], $select_all;

  public function mount()
  {
    $this->fiscalyear_code = 2565;
    $this->fiscalyear_list = OoapTblFiscalyear::where('in_active', '=', false)->pluck('fiscalyear_code', 'fiscalyear_code AS fiscalyear_code2');
    $this->actlist = OoapTblReqform::select(
      'ooap_tbl_reqform.reqform_id',
      'ooap_tbl_reqform.reqform_no',
      'ooap_tbl_reqform.dept_id',
      'ooap_tbl_reqform.acttype_id',
      'ooap_mas_acttype.name',
      'ooap_tbl_reqform.amphur_id',
      'ooap_mas_amphur.amphur_name',
      'ooap_tbl_reqform.tambon_id',
      'ooap_mas_tambon.tambon_name',
      'ooap_tbl_reqform.moo',
      'ooap_tbl_reqform.day_qty',
      'ooap_tbl_reqform.people_qty',
      'ooap_tbl_reqform.total_amt',
      'ooap_tbl_reqform.status',
      'ooap_tbl_reqform.in_active'
    )
      ->where('ooap_tbl_reqform.in_active', '=', false)->where('ooap_tbl_reqform.status', '=', 3)
      ->leftjoin('ooap_mas_acttype', 'ooap_tbl_reqform.acttype_id', 'ooap_mas_acttype.id')
      ->leftjoin('ooap_mas_amphur', 'ooap_tbl_reqform.amphur_id', 'ooap_mas_amphur.amphur_id')
      ->leftjoin('ooap_mas_tambon', 'ooap_tbl_reqform.tambon_id', 'ooap_mas_tambon.tambon_id')
      ->get()->toArray();
    $this->select_all = 0;
    foreach ($this->actlist as $key => $val) {
      $this->select[$key] = 0;
    }

    // dd($this->choose);
  }

  public function check_list()
  {
    if ($this->select_all == 0) {
      $this->select = [];
      $this->select_all = 1;
      foreach ($this->actlist as $key => $val) {
        $this->select[$key] = $val['reqform_id'];
      }
    } elseif ($this->select_all == 1) {
      $this->select = [];
      $this->select_all = 0;
      foreach ($this->actlist as $key => $val) {
        $this->select[$key] = 0;
      }
    }

    // dd($this->select_all);
  }

  public function submit()
  {
    // dd($this->select)/;
    $chack_array = [];
    foreach ($this->select as $key => $reqform_id) {
      if ($reqform_id != 0) {
        $chack_array[] = $reqform_id;
      }
    }
    // dd($chack_array);
    // foreach ($this->select as $key => $reqform_id) {
    $test = OoapTblReqform::whereNotIn('reqform_id', $chack_array)->where('status', '=', 3)
      // dd($test);
      ->update([
        'in_active' => 1,
        'updated_by' => auth()->user()->emp_citizen_id,
        'updated_at' => now(),
      ]);
    // }
    $this->emit('popup');
  }
  protected $listeners = ['redirect-to' => 'redirect_to'];

  public function redirect_to()
  {
    return redirect()->to('/activity/ready_confirm');
  }

  public function render()
  {
    return view('livewire.activity.ready-confirm.list-component');
  }
}
