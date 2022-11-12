<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\OoapMasEstimate;
use Illuminate\Http\Request;

class EstimateActivityController extends Controller
{
    public function index()
    {
        return view('master.estimate.index');
    }

    public function create()
    {
        return view('master.estimate.create');
    }

    public function edit($id)
    {
        $getResult = OoapMasEstimate::find($id);
        return view('master.estimate.edit', ['data' => $getResult]);
    }

    public function destroy($id)
    {
        $checkResult = OoapMasEstimate::find($id);
        ($checkResult->in_active == 1) ? $in_active = 0 : $in_active = 1;
        OoapMasEstimate::where('estimate_id', $id)->update([
            'in_active' => $in_active
        ]);
        return redirect()->back()->with('message', 'ดำเนินการ ลบข้อมูล เรียบร้อย');
    }
}
