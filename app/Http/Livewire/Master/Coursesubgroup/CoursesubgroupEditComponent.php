<?php

namespace App\Http\Livewire\Master\Coursesubgroup;

use App\Models\OoapMasCoursesubgroup;
use App\Models\OoapMasCoursegroup;
use App\Models\OoapMasActtype;
use Livewire\Component;

class CoursesubgroupEditComponent extends Component
{
    public $acttype_list, $acttype_id, $dataCoursesubgroup;
    public $coursegroup_list, $coursegroup_id;
    public $coursesubgroup_id, $code, $name, $shortname, $status, $in_active, $remember_token, $create_by, $create_at;

    public function mount()
    {
        // $this->acttype_id = OoapMasActtype::where('inactive', '=', 0)->orderby('id', 'asc')->first()->id;
        //$this->coursegroup_id = OoapMasCoursegroup::where('in_active', '=', false)->orderby('id', 'asc')->first()->id;


        if ($this->dataCoursesubgroup) {
            $this->coursesubgroup_id = $this->dataCoursesubgroup->id;
            $this->code = $this->dataCoursesubgroup->code;
            $this->name = $this->dataCoursesubgroup->name;
            $this->shortname = $this->dataCoursesubgroup->shortname;
            $this->acttype_id = $this->dataCoursesubgroup->acttype_id;
            $this->coursegroup_id = $this->dataCoursesubgroup->coursegroup_id;
        } else {

            $this->coursesubgroup_id = NULL;
            $this->code = NULL;
            $this->name = NULL;
            $this->shortname = NULL;
            $this->acttype_id = NULL;
            $this->coursegroup_id = NULL;
        }
    }

    public function submit()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'shortname' => 'required',
            'acttype_id' => 'required',
            'coursegroup_id' => 'required',
        ], [
            'code.required' => 'กรุณาใส่รหัสกลุ่มหลักสูตร',
            'name.required' => 'กรุณากรอกชื่อกลุ่มหลักสูตร',
            'shortname.required' => 'กรุณากรอกชื่อย่อ',
            'acttype_id.required' => 'กรุณาเลือกประเภทกิจกรรม',
            'coursegroup_id.required' => 'กรุณาเลือกกลุ่มหลักสูตร',
        ]);

        $datas = [
            'code' => $this->code,
            'name' => $this->name,
            'shortname' => $this->shortname,
            'acttype_id' => $this->acttype_id,
            'coursegroup_id' => $this->coursegroup_id,
            'updated_by' => auth()->user()->emp_citizen_id,
            'remember_token' => csrf_token(),

        ];

        if ($this->dataCoursesubgroup) {

            OoapMasCoursesubgroup::where('id', $this->dataCoursesubgroup->id)->update($datas);


            $this->parent_id = $this->dataCoursesubgroup->id;
        } else {

            $OoapMasCoursesubgroup = OoapMasCoursesubgroup::create( $datas);


            $this->parent_id = $OoapMasCoursesubgroup->id;
        }



        $this->emit('popup');
    }

    protected $listeners = ['redirect-to' => 'redirect_to'];

    public function redirect_to()
    {
        return redirect(route('master.coursesubgroup.edit', ['id' => $this->parent_id]));

        return redirect()->to('/master/coursesubgroup');
    }

    public function thisReset()
    {
        return redirect()->to('/master/coursesubgroup');
    }

    // public function changeActtype($value)
    // {
    //     $this->acttype_id = $value;
    // }

    // public function changeCoursegroup($value)
    // {
    //     $this->coursegroup_id = $value;
    // }

    public function render()
    {
        $this->acttype_list = OoapMasActtype::where('inactive', '=', 0)->pluck('name', 'id');

        $this->coursegroup_list = OoapMasCoursegroup::where('in_active', '=', false)->pluck('name', 'id');
        $this->emit('emits');
        return view('livewire.master.coursesubgroup.coursesubgroup-edit-component');
    }
}
