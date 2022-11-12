<?php

namespace App\Http\Livewire\Manage\Receivetransfer;

use App\Models\OoapTblFiscalyear;
use App\Models\OoapTblFybdperiod;
use App\Models\OoapTblFybdtransfer;
use Livewire\Component;

class ReceivetransferEditComponent extends Component
{
  public $fiscalyear_list, $fiscalyear_code, $fybdperiod_list, $fybdperiod_id, $transfer_date, $transfer_amt, $transfer_desp;
  public $ret_id;

  public function mount()
  {
    $OoapTblFybdtransfer = OoapTblFybdtransfer::where('ooap_tbl_fybdtransfer.id', '=', $this->ret_id)->first();
    $this->fiscalyear_code = $OoapTblFybdtransfer->fiscalyear_code;
    $this->fybdperiod_id = $OoapTblFybdtransfer->fybdperiod_id;
    $this->transfer_date = datetoview($OoapTblFybdtransfer->transfer_date);
    $this->transfer_amt = $OoapTblFybdtransfer->transfer_amt;
    $this->transfer_desp = $OoapTblFybdtransfer->transfer_desp;

    $this->fiscalyear_list = OoapTblFiscalyear::pluck('fiscalyear_code', 'fiscalyear_code AS fiscalyear_code2') ?? [];
  }

  public function submit()
  {
    // dd($this);
    $this->validate([
      'fiscalyear_code' => 'required',
      'fybdperiod_id' => 'required',
      'transfer_date' => 'required',
      'transfer_amt' => 'required',
    ], [
      'fiscalyear_code.required' => 'กรุณากรอก ปีงบประมาณ',
      'fybdperiod_id.required' => 'กรุณากรอก งวดที่',
      'transfer_date.required' => 'กรุณากรอก วันที่รับโอน',
      'transfer_amt.required' => 'กรุณากรอก จำนวนเงิน',
    ]);

    $OoapTblFybdtransfer = OoapTblFybdtransfer::where('ooap_tbl_fybdtransfer.id', '=', $this->ret_id)->update([
      'fiscalyear_code' => $this->fiscalyear_code,
      'fybdperiod_id' => $this->fybdperiod_id,
      'transfer_date' => datePickerThaiToDB($this->transfer_date),
      'transfer_amt' => $this->transfer_amt,
      'transfer_desp' => $this->transfer_desp,
      'updated_at' => now(),
      'updated_by' => auth()->user()->emp_citizen_id,
    ]);

    // dd($OoapTblFybdtransfer);
    $this->emit('popup');
  }

  protected $listeners = ['redirect-to' => 'redirect_to'];

  public function redirect_to()
  {
    return redirect()->to('/manage/receivetransfer/index');
  }

  public function render()
  {
    $this->fybdperiod_list = OoapTblFybdperiod::where('fiscalyear_code', '=', $this->fiscalyear_code)->pluck('period_no', 'id') ?? [];

    return view('livewire.manage.receivetransfer.receivetransfer-edit-component');
  }
}
