<?php

namespace App\Http\Livewire\Master\Coursetype;

use App\Models\OoapMasCoursegroup;
use App\Models\OoapMasCoursesubgroup;
use App\Models\OoapMasCoursetype;
use Livewire\Component;

class CoursetypeAddComponent extends Component
{
    public $coursegroup_list, $coursegroup_id;
    public $coursesubgroup_list, $coursesubgroup_id;
    public $code, $name, $shortname, $status, $in_active, $remember_token, $create_by, $create_at;

    public function mount()
    {
        $this->coursegroup_list = OoapMasCoursegroup::where('in_active', '=', false)->pluck('name', 'id');
    }

    public function submit()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'coursegroup_id' => 'required',
            'coursesubgroup_id' => 'required'
        ], [
            'code.required' => 'กรุณาใส่รหัสประเภทหลักสูตร',
            'name.required' => 'กรุณากรอกชื่อประเภทหลักสูตร',
            'coursegroup_id.required' => 'กรุณาเลือกกลุ่มหลักสูตร',
            'coursesubgroup_id.required' => 'กรุณาเลือกสาขาอาชีพ',
        ]);
        OoapMasCoursetype::create([
            'code' => $this->code,
            'name' => $this->name,
            'shortname' => $this->shortname,
            'coursegroup_id' => $this->coursegroup_id,
            'coursesubgroup_id' => $this->coursesubgroup_id,
            'remember_token' => csrf_token(),
            'created_by' => auth()->user()->emp_citizen_id
        ]);
        $this->emit('popup');
    }

    protected $listeners = ['redirect-to' => 'redirect_to'];

    public function redirect_to()
    {
        return redirect()->to('/master/coursetype');
    }

    public function thisReset()
    {
        return redirect()->to('/master/coursetype');
    }

    public function render()
    {
        $this->emit('emits');
        $this->coursesubgroup_list = OoapMasCoursesubgroup::where([['in_active', '=', false], ['coursegroup_id', '=', $this->coursegroup_id]])->pluck('name', 'id');
        return view('livewire.master.coursetype.coursetype-add-component');
    }
}
