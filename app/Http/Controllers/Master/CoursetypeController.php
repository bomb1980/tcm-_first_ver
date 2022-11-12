<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\OoapMasCoursetype;

class CoursetypeController extends Controller
{

    function __construct() {
        $this->main_title = 'ข้อมูลประเภทหลักสูตร';
    }

    public function index()
    {
        return view('master.coursetype.index',['main_title'=>$this->main_title]);

    }

    public function edit($id)
    {
        $icon = getIcon('add');
        $getResult = NULL;
        $title = 'เพิ่ม'. $this->main_title .'';

        foreach (OoapMasCoursetype::getDatas($id)->get() as $ka => $va) {

            $icon = getIcon('edit');

            $getResult = OoapMasCoursetype::find($va->id);

            $title = $getResult->name;
        }

        return view('master.coursetype.edit', ['dataCoursetype' => $getResult, 'title' => $title, 'icon' => $icon, 'main_title'=>$this->main_title]);
    }

    public function create()
    {

        $icon = getIcon('add');
        $getResult = NULL;
        $title = 'เพิ่ม'. $this->main_title .'';

        return view('master.coursetype.edit', ['dataCoursetype' => $getResult, 'title' => $title, 'icon' => $icon, 'main_title'=>$this->main_title]);
    }

    public function destroy($id)
    {
        $checkResult = OoapMasCoursetype::find($id);
        ($checkResult->in_active == 1) ? $in_active = 0 : $in_active = 1;

        OoapMasCoursetype::where('id','=', $id)->update([
            'in_active' => $in_active,
            'deleted_by' => auth()->user()->name,
            'deleted_at' => now()
        ]);
        return redirect()->back()->with('message', 'ดำเนินการ ลบข้อมูล เรียบร้อย');
    }
}
