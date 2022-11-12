<?php

namespace App\Http\Livewire\Master\Troubletype;

use App\Models\OoapMasTroubletype;
use Livewire\Component;

class TroubletypeEditComponent extends Component
{
  public $troubletype_id, $name, $shortname, $status, $in_active, $remember_token, $create_by, $create_at;

  public function mount($dataTroubletype)
  {
    $this->troubletype_id = $dataTroubletype->id;
    $this->name = $dataTroubletype->name;
    $this->shotname = $dataTroubletype->shotname;
  }

  public function submit()
  {
    $this->validate([
      'name' => 'required'
    ], [
      'name.required' => 'กรุณากรอกชื่อประเภทความเดือดร้อน',
    ]);
    $checkResult = OoapMasTroubletype::where('id', '=', $this->troubletype_id)->first();
    if ($checkResult) {
      OoapMasTroubletype::where('id', '=', $this->troubletype_id)->update([
        'name' => $this->name,
        'shotname' => $this->shotname,
        'updated_by' => auth()->user()->emp_citizen_id
      ]);
    }
    $this->emit('popup');
  }

  protected $listeners = ['redirect-to' => 'redirect_to'];

  public function redirect_to()
  {
    return redirect()->to('/master/troubletype');
  }

  public function thisReset()
  {
    return redirect()->to('/master/troubletype');
  }

  public function render()
  {
    return view('livewire.master.troubletype.troubletype-edit-component');
  }
}
