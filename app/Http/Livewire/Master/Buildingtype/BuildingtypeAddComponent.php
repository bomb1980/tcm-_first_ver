<?php

namespace App\Http\Livewire\Master\Buildingtype;

use App\Models\OoapMasBuildingtype;
use Livewire\Component;

class BuildingtypeAddComponent extends Component
{
  public $name, $shortname, $status, $in_active, $remember_token, $create_by, $create_at;

  public function submit()
  {
    $this->validate([
      'name' => 'required',
      'shortname' => 'required'
    ], [
      'name.required' => 'กรุณากรอกชื่อสิ่งปลูกสร้าง',
      'shortname.required' => 'กรุณากรอกชื่อย่อ',
    ]);
    OoapMasBuildingtype::create([
      'name' => $this->name,
      'shortname' => $this->shortname,
      'remember_token' => csrf_token(),
      'created_by' => auth()->user()->emp_citizen_id
    ]);
    $this->emit('popup');
  }

  protected $listeners = ['redirect-to' => 'redirect_to'];

  public function redirect_to()
  {
    return redirect()->to('/master/buildingtype');
  }

  public function thisReset()
  {
    return redirect()->to('/master/buildingtype');
  }

  public function render()
  {
    return view('livewire.master.buildingtype.buildingtype-add-component');
  }
}
