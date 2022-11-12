<?php

namespace App\Http\Livewire\Master\Troubletype;

use App\Models\OoapMasTroubletype;
use Livewire\Component;

class TroubletypeAddComponent extends Component
{
  public $name, $shotname, $status, $in_active, $remember_token, $create_by, $create_at;

  public function submit()
  {
    $this->validate([
      'name' => 'required'
    ], [
      'name.required' => 'กรุณากรอกชื่อประเภทความเดือดร้อน',
    ]);
    OoapMasTroubletype::create([
      'name' => $this->name,
      'shotname' => $this->shotname,
      'remember_token' => csrf_token(),
      'created_by' => auth()->user()->emp_citizen_id
    ]);
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
    return view('livewire.master.troubletype.troubletype-add-component');
  }
}
