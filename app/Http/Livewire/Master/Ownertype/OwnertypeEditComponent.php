<?php

namespace App\Http\Livewire\Master\Ownertype;

use App\Models\OoapMasCourseOwnertype;
use Livewire\Component;

class OwnertypeEditComponent extends Component
{
  public $ownertype_id, $name, $shortname, $status, $in_active, $remember_token, $create_by, $create_at;

  public function mount($dataOwnertype)
  {
    $this->ownertype_id = $dataOwnertype->id;
    $this->name = $dataOwnertype->name;
    $this->shortname = $dataOwnertype->shortname;
  }

  public function submit()
  {
    $this->validate([
      'name' => 'required',
      'shortname' => 'required'
    ], [
      'name.required' => 'กรุณากรอกชื่อแหล่งที่มาของหลักสูตร',
      'shortname.required' => 'กรุณากรอกชื่อย่อ',
    ]);
    $checkResult = OoapMasCourseOwnertype::where('id', '=', $this->ownertype_id)->first();
    if ($checkResult) {
      OoapMasCourseOwnertype::where('id', '=', $this->ownertype_id)->update([
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
    return redirect()->to('/master/ownertype');
  }

  public function thisReset()
  {
    return redirect()->to('/master/ownertype');
  }

  public function render()
  {
    return view('livewire.master.ownertype.ownertype-edit-component');
  }
}
