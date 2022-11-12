<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\OoapMasLecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index()
    {
        return view('master.lecturer.index');
    }

    public function create()
    {
        return view('master.lecturer.create');
    }

    public function edit($id)
    {
        $getResult = OoapMasLecturer::find($id);
        // dd($getResult);
        return view('master.lecturer.edit', ['datacentermaster' => $getResult]);
    }

    public function destroy($id)
    {
        $checkResult = OoapMasLecturer::find($id);
        ($checkResult->in_active == 1) ? $in_active = 0 : $in_active = 1;
        OoapMasLecturer::where('lecturer_id', '=', $id)->update([
            'in_active' => $in_active
        ]);
        return redirect()->back()->with('message', 'ดำเนินการ ลบข้อมูล เรียบร้อย');
    }
}
