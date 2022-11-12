<?php

namespace App\Http\Livewire\Master\Buildingtype;

use App\Models\OoapMasBuildingtype;
use Livewire\Component;

class BuildingtypeEditComponent extends Component
{
  public $buildingtype_id, $name, $shortname, $status, $in_active, $remember_token, $create_by, $create_at;

  public function mount($dataBuildingtype)
  {
    $this->buildingtype_id = $dataBuildingtype->buildingtype_id;
    $this->name = $dataBuildingtype->name;
    $this->shortname = $dataBuildingtype->shortname;
  }

  public function submit()
  {
    $this->validate([
      'name' => 'required',
      'shortname' => 'required'
    ], [
      'name.required' => 'กรุณากรอกชื่อสิ่งปลูกสร้าง',
      'shortname.required' => 'กรุณากรอกชื่อย่อ',
    ]);
    $checkResult = OoapMasBuildingtype::where('buildingtype_id', '=', $this->buildingtype_id)->first();
    if ($checkResult) {
      OoapMasBuildingtype::where('buildingtype_id', '=', $this->buildingtype_id)->update([
        'name' => $this->name,
        'shortname' => $this->shortname,
        'updated_by' => auth()->user()->emp_citizen_id
      ]);
    }
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
    return view('livewire.master.buildingtype.buildingtype-edit-component');
  }
}
