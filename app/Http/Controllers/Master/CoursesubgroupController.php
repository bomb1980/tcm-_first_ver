<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\OoapMasCoursesubgroup;

class CoursesubgroupController extends Controller
{

    function __construct() {
        $this->main_title = 'ข้อมูลกลุ่มสาขาอาชีพ';
    }

    public function index()
    {
        return view('master.coursesubgroup.index',['main_title'=>$this->main_title]);
    }


    public function create()
    {
        $icon = getIcon('add');
        $getResult = NULL;
        $title = 'เพิ่มข้อมูลกลุ่มสาขาอาชีพ';

        return view('master.coursesubgroup.edit', ['dataCoursesubgroup' => $getResult, 'title' => $title, 'icon' => $icon, 'main_title'=>$this->main_title]);

    }

    public function edit($id)
    {
        $icon = getIcon('add');
        $getResult = NULL;
        $title = 'เพิ่มข้อมูลกลุ่มสาขาอาชีพ';

        foreach (OoapMasCoursesubgroup::getDatas($id)->get() as $ka => $va) {
            $icon = getIcon('edit');

            $getResult = OoapMasCoursesubgroup::find($va->id);

            $title = $getResult->name;
        }

        return view('master.coursesubgroup.edit', ['dataCoursesubgroup' => $getResult, 'title' => $title, 'icon' => $icon, 'main_title'=>$this->main_title]);

    }

    public function destroy($id)
    {
        $checkResult = OoapMasCoursesubgroup::find($id);
        ($checkResult->in_active == 1) ? $in_active = 0 : $in_active = 1;
        // dd($in_active);
        OoapMasCoursesubgroup::where('id','=', $id)->update([
            'in_active' => $in_active,
            'deleted_by' => auth()->user()->name,
            'deleted_at' => now()
        ]);
        return redirect()->back()->with('message', 'ดำเนินการ ลบข้อมูล เรียบร้อย');
    }
}
