<?php

namespace App\Http\Livewire\Manage\Installment;

use App\Models\OoapTblFiscalyear;
use App\Models\OoapTblFybdperiod;
use Livewire\Component;

class InstallmentEditComponent extends Component
{
  public $period_id, $fiscalyear_select, $fiscalyear_code, $databudget_list, $startdate, $enddate, $period_no, $budget_amt, $period_rate, $period_amt;
  public $left_per, $left_amt;

  public function mount()
  {
    $this->fiscalyear_select = OoapTblFiscalyear::where('in_active', '=', false)->get()->pluck('fiscalyear_code', 'fiscalyear_code');

    $mount = OoapTblFybdperiod::where('id', '=', $this->period_id)->first();
    $this->fiscalyear_code = $mount->fiscalyear_code;
    $this->period_no = $mount->period_no;
    $this->startdate = dateToMontYears($mount->startdate);
    $this->enddate = dateToMontYears($mount->enddate);
    $this->period_rate = $mount->period_rate;
    $this->period_amt = $mount->period_amt;

    $this->budget_amt = OoapTblFiscalyear::select('budget_amt')->where('fiscalyear_code', '=', $this->fiscalyear_code)->first()->budget_amt ?? 0;
  }

  public function submit()
  {
    // dd($this);
    $this->validate([
      'fiscalyear_code' => 'required',
      'period_no' => 'required',
      'startdate' => 'required',
      'enddate' => 'required',
      'period_rate' => 'required',
      'period_amt' => 'numeric|max:' . $this->left_amt,
    ], [
      'fiscalyear_code.required' => 'กรุณาเลือก ปีงบประมาณ',
      'period_no.required' => 'กรุณากรอก งวดที่',
      'startdate.required' => 'กรุณากรอก ช่วงเวลาเริ่มต้น',
      'enddate.required' => 'กรุณากรอก ช่วงเวลาสิ้นสุด',
      'period_rate.required' => 'กรุณากรอก สัดส่วน',
      'period_amt.required' => 'กรุณากรอก จำนวนเงิน',
      'period_amt.max' => 'กรุณากรอก จำนวนเงินไม่เกิน ' . $this->left_amt,
    ]);
    // dd();
    $OoapTblFybdperiod = OoapTblFybdperiod::where('id', '=', $this->period_id)->update([
      'fiscalyear_code' => $this->fiscalyear_code,
      'period_no' => $this->period_no,
      'startdate' => montYearsToDate($this->startdate),
      'enddate' => montYearsToDate($this->enddate),
      'period_month' => 1,
      'period_rate' => $this->period_rate,
      'period_amt' => $this->period_amt,
      'updated_at' => now(),
      'updated_by' => auth()->user()->emp_citizen_id,
    ]);
    $this->emit('popup');
  }

  protected $listeners = ['redirect-to' => 'redirect_to'];

  public function redirect_to()
  {
    return redirect()->to('/manage/installment');
  }

  public function thisReset()
  {
    return redirect()->to('/manage/installment');
  }

  public function render()
  {
    // $this->databudget_list=OoapTblFiscalyear::select('budget_amt')->where('fiscalyear_code',$this->fiscalyear_code)->first()->budget_amt ?? 0;

    // $this->period_rate= $this->databudget_list === 0 ? 0 : number_format(($this->period_amt / $this->databudget_list) * 100,2);

    $this->left_amt = $this->budget_amt - (OoapTblFybdperiod::where('fiscalyear_code', '=', $this->fiscalyear_code)->where('id', '!=', $this->period_id)->sum('period_amt') ?? 0);

    $this->period_rate = $this->budget_amt === 0 ? 0 : ($this->period_amt / $this->budget_amt) * 100;

    $this->left_per = number_format($this->period_rate, 2);

    return view('livewire.manage.installment.installment-edit-component');
  }
}
