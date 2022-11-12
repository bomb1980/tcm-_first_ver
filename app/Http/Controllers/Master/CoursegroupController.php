<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\OoapMasCoursegroup;

class CoursegroupController extends Controller
{

    public function index()
    {
        return view('master.coursegroup.index');
    }

    public function create()
    {

        $icon = getIcon('add');
        $getResult = NULL;
        $title = 'เพิ่มข้อมูลกลุ่มหลักสูตร';

        return view('master.coursegroup.edit', ['dataCoursegroup' => $getResult, 'title' => $title, 'icon' => $icon]);

    }

    public function edit($id)
    {

        $icon = getIcon('add');
        $getResult = NULL;
        $title = 'เพิ่มข้อมูลกลุ่มหลักสูตร';

        foreach (OoapMasCoursegroup::getDatas($id)->get() as $ka => $va) {
            $icon = getIcon('edit');

            $getResult = OoapMasCoursegroup::find($va->id);

            $title = $getResult->name;
        }

        return view('master.coursegroup.edit', ['dataCoursegroup' => $getResult, 'title' => $title, 'icon' => $icon]);
    }

    public function destroy($id)
    {
        $checkResult = OoapMasCoursegroup::find($id);
        ($checkResult->in_active == 1) ? $in_active = 0 : $in_active = 1;
        // dd($in_active);
        OoapMasCoursegroup::where('id', '=', $id)->update([
            'in_active' => $in_active,
            'deleted_by' => auth()->user()->name,
            'deleted_at' => now()
        ]);
        return redirect()->back()->with('message', 'ดำเนินการ ลบข้อมูล เรียบร้อย');
    }
}
