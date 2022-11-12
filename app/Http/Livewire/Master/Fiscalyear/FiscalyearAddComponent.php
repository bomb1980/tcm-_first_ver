<?php

namespace App\Http\Livewire\Master\Fiscalyear;

use App\Models\OoapTblFiscalyear;
use Livewire\Component;

class FiscalyearAddComponent extends Component
{
  public $fiscalyear_code, $startdate, $enddate, $req_status = 0, $req_startdate, $req_enddate, $status, $in_active, $remember_token, $create_by, $create_at;

  public function submit()
  {
    // dd($this);
    $this->validate([
      'fiscalyear_code' => 'required|numeric|min:4'
      // 'fiscalyear_code' => 'required|unique:ooap_tbl_fiscalyear,fiscalyear_code,'.$this->fiscalyear_code,
      // 'startdate' => 'required',
      // 'enddate' => 'required',
      // 'req_startdate' => 'required',
      // 'req_enddate' => 'required'
    ], [
      'fiscalyear_code.required' => 'กรุณากรอกปีงบประมาณ',
      // 'fiscalyear_code.unique' => 'ปีงบประมาณนี้ซ้ำ',
      'fiscalyear_code.numeric' => 'กรุณากรอกตัวเลขเท่านั้น',
      'fiscalyear_code.min' => 'กรุณากรอกปีพ.ศ.ให้ครบ 4 ตัวอักษร',
    //   'fiscalyear_code.max' => 'กรุณากรอกปีพ.ศ.ไม่เกิน 4 ตัวอักษร',
      // 'startdate.required' => 'กรุณากรอกวันที่เริ่มงบฯ',
      // 'enddate.required' => 'กรุณากรอกวันที่สิ้นสุดงบฯ',
      // 'fiscalyear_code.unique' => 'มีปีงบประมาณนี้แล้ว',
      // 'req_startdate.required' => 'กรุณากรอกวันที่เริ่มรวมรวมคำขอ',
      // 'req_enddate.required' => 'กรุณากรอกวันที่สิ้นสุดรวมรวมคำขอ',
    ]);
    OoapTblFiscalyear::create([
      'fiscalyear_code' => $this->fiscalyear_code,
      // 'startdate' => datePickerThaiToDB($this->startdate),
      // 'enddate' => datePickerThaiToDB($this->enddate),
      'req_status' => 1,
      'req_startdate' => datePickerThaiToDB($this->req_startdate),
      'req_enddate' => datePickerThaiToDB($this->req_enddate),
      'remember_token' => csrf_token(),
      'created_by' => auth()->user()->emp_citizen_id
    ]);
    $this->emit('popup');
  }

  protected $listeners = ['redirect-to' => 'redirect_to'];

  public function redirect_to()
  {
    return redirect()->to('/master/fiscalyear');
  }

  public function req_startdate_clear()
  {
    $this->reset(['req_startdate']);
  }

  public function req_enddate_clear()
  {
    $this->reset(['req_enddate']);
  }

  public function thisReset()
  {
    return redirect()->to('/master/fiscalyear');
  }

  public function render()
  {
    return view('livewire.master.fiscalyear.fiscalyear-add-component');
  }
}
