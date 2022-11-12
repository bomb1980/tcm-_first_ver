<?php

namespace App\Http\Livewire\Master\Coursetype;

use App\Models\OoapMasCoursegroup;
use App\Models\OoapMasCoursetype;
use App\Models\OoapMasCoursesubgroup;
use Livewire\Component;

class CoursetypeEditComponent extends Component
{
    public $coursegroup_list, $coursegroup_id, $dataCoursetype;
    public $coursesubgroup_list, $coursesubgroup_id;
    public $coursetype_id, $code, $name, $shortname, $status, $in_active, $remember_token, $create_by, $create_at;

    public function mount()
    {

        if ($this->dataCoursetype) {
            $this->coursetype_id = $this->dataCoursetype->id;
            $this->code = $this->dataCoursetype->code;
            $this->name = $this->dataCoursetype->name;
            $this->shortname = $this->dataCoursetype->shortname;
            $this->coursegroup_id = $this->dataCoursetype->coursegroup_id;
            $this->coursesubgroup_id = $this->dataCoursetype->coursesubgroup_id;
        } else {

            $this->coursetype_id = NULL;
            $this->code = NULL;
            $this->name = NULL;
            $this->shortname = NULL;
            $this->coursegroup_id = NULL;
            $this->coursesubgroup_id = NULL;
        }
    }

    public function render()
    {
        $this->coursesubgroup_list = OoapMasCoursesubgroup::where('in_active', '=', false)->pluck('name', 'id');
        $this->coursegroup_list = OoapMasCoursegroup::where('in_active', '=', false)->pluck('name', 'id');

        return view('livewire.master.coursetype.coursetype-edit-component');
    }

    public function submit()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'coursegroup_id' => 'required',
            'coursesubgroup_id' => 'required'
        ], [
            'name.required' => 'กรุณากรอกชื่อประเภทหลักสูตร',
            'coursegroup_id.required' => 'กรุณาเลือกกลุ่มหลักสูตร',
            'coursesubgroup_id.required' => 'กรุณาเลือกสาขาอาชีพ',
        ]);

        $datas =[
            'code' => $this->code,
            'name' => $this->name,
            'shortname' => $this->shortname,
            'coursegroup_id' => $this->coursegroup_id,
            'coursesubgroup_id' => $this->coursesubgroup_id,
            'updated_by' => auth()->user()->emp_citizen_id,
            'remember_token' => csrf_token(),
        ];

        if ($this->dataCoursetype) {

            OoapMasCoursetype::where('id', $this->dataCoursetype->id)->update($datas);

            $this->parent_id = $this->dataCoursetype->id;
        } else {

            $OoapMasCoursetype =    OoapMasCoursetype::create($datas);

            $this->parent_id = $OoapMasCoursetype->id;
        }

        $this->emit('popup');
    }

    protected $listeners = ['redirect-to' => 'redirect_to'];

    public function redirect_to()
    {
        return redirect(route('master.coursetype.edit', ['id' => $this->parent_id]));

        // return redirect()->to('/master/coursetype');
    }

    public function thisReset()
    {
        return redirect()->to('/master/coursetype');
    }

    public function coursegroupchange($val)
    {
        $this->coursegroup_id = $val;
    }

    public function coursesubgroupchange($val)
    {
        $this->coursesubgroup_id = $val;
    }
}
