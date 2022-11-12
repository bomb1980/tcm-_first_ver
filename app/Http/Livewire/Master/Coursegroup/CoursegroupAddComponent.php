<?php

namespace App\Http\Livewire\Master\Coursegroup;

use App\Models\OoapMasCoursegroup;
use App\Models\OoapMasActtype;
use Livewire\Component;

class CoursegroupAddComponent extends Component
{
    public $acttype_list, $acttype_id;
    public $code, $name, $shortname, $status, $in_active, $remember_token, $create_by, $create_at;

    public function mount()
    {
        $this->acttype_list = OoapMasActtype::where('inactive', '=', 0)->pluck('name', 'id');
    }
    public function submit()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'shortname' => 'required',
            'acttype_id' => 'required'
        ], [
            'code.required' => 'กรุณาใส่รหัสกลุ่มหลักสูตร',
            'name.required' => 'กรุณากรอกชื่อกลุ่มหลักสูตร',
            'shortname.required' => 'กรุณากรอกชื่อย่อ',
            'acttype_id.required' => 'กรุณาเลือกประเภทกิจกรรม',
        ]);
        OoapMasCoursegroup::create([
            'code' => $this->code,
            'name' => $this->name,
            'shortname' => $this->shortname,
            'acttype_id' => $this->acttype_id,
            'remember_token' => csrf_token(),
            'created_by' => auth()->user()->emp_citizen_id
        ]);
        $this->emit('popup');
    }

    protected $listeners = ['redirect-to' => 'redirect_to'];

    public function redirect_to()
    {
        return redirect()->to('/master/coursegroup');
    }

    public function thisReset()
    {
        return redirect()->to('/master/coursegroup');
    }

    // public function changeActtype($value)
    // {
    //     $this->acttype_id = $value;
    // }

    public function render()
    {
        $this->emit('emits');
        return view('livewire.master.coursegroup.coursegroup-add-component');
    }
}
