<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\OoapMasCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $getResult = OoapMasCourse::find($id);
        return view('master.course.edit', ['course_id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkResult = OoapMasCourse::find($id);
        ($checkResult->in_active == 1) ? $in_active = 0 : $in_active = 1;
        // dd($in_active);
        OoapMasCourse::where('id','=', $id)->update([
            'in_active' => $in_active,
            'deleted_by' => auth()->user()->name,
            'deleted_at' => now()
        ]);
        return redirect()->back()->with('message', 'ดำเนินการ ลบข้อมูล เรียบร้อย');
    }
}
