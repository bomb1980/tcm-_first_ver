<?php

namespace App\Http\Livewire\Master\Ownertype;

use App\Models\OoapMasCourseOwnertype;
use Livewire\Component;

class OwnertypeAddComponent extends Component
{
  public $name, $shortname, $status, $in_active, $remember_token, $create_by, $create_at;

  public function submit()
  {
    $this->validate([
      'name' => 'required',
      'shortname' => 'required'
    ], [
      'name.required' => 'กรุณากรอกชื่อแหล่งที่มาของหลักสูตร',
      'shortname.required' => 'กรุณากรอกชื่อย่อ',
    ]);
    OoapMasCourseOwnertype::create([
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
    return redirect()->to('/master/ownertype');
  }

  public function thisReset()
  {
    return redirect()->to('/master/ownertype');
  }

  public function render()
  {
    return view('livewire.master.ownertype.ownertype-add-component');
  }
}
