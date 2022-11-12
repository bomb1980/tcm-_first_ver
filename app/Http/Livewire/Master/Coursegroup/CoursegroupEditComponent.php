<?php

namespace App\Http\Livewire\Master\Coursegroup;

use App\Models\OoapMasCoursegroup;
use App\Models\OoapMasActtype;
use Livewire\Component;

class CoursegroupEditComponent extends Component
{
    public $acttype_list, $acttype_id, $dataCoursegroup;
    public $coursegroup_id, $code, $name, $shortname, $status, $in_active, $remember_token, $create_by, $create_at;

    public function mount()
    {
        // $this->acttype_id = OoapMasActtype::where('inactive', '=', 0)->orderby('id', 'asc')->first()->id;

        if ($this->dataCoursegroup) {
            $this->coursegroup_id = $this->dataCoursegroup->id;
            $this->acttype_id = $this->dataCoursegroup->acttype_id;
            $this->code = $this->dataCoursegroup->code;
            $this->name = $this->dataCoursegroup->name;
            $this->shortname = $this->dataCoursegroup->shortname;
        } else {

            $this->coursegroup_id = NULL;
            $this->acttype_id = NULL;
            $this->code = NULL;
            $this->name = NULL;
            $this->shortname = NULL;
        }
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
        if ($this->dataCoursegroup) {
            $checkResult = OoapMasCoursegroup::where('id', '=', $this->coursegroup_id)->first();
            if ($checkResult) {
                OoapMasCoursegroup::where('id', '=', $this->coursegroup_id)->update([
                    'code' => $this->code,
                    'name' => $this->name,
                    'shortname' => $this->shortname,
                    'acttype_id' => $this->acttype_id,
                    'updated_by' => auth()->user()->emp_citizen_id
                ]);

                $this->parent_id = $this->dataCoursegroup->id;
            }
        } else {

            $OoapMasCoursegroup = OoapMasCoursegroup::create([
                'code' => $this->code,
                'name' => $this->name,
                'shortname' => $this->shortname,
                'acttype_id' => $this->acttype_id,
                'updated_by' => auth()->user()->emp_citizen_id
            ]);

            $this->parent_id = $OoapMasCoursegroup->id;
        }

        $this->emit('popup');
    }

    protected $listeners = ['redirect-to' => 'redirect_to'];

    public function redirect_to()
    {

        return redirect(route('master.coursegroup.edit', ['id' => $this->parent_id]));

        // return redirect()->to('/master/coursegroup');
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
        $this->acttype_list = OoapMasActtype::where('inactive', '=', 0)->pluck('name', 'id');

        $this->emit('emits');
        return view('livewire.master.coursegroup.coursegroup-edit-component');
    }
}
