<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\OoapMasAssessmentTopic;
use Illuminate\Http\Request;

class AssessmentTopicController extends Controller
{
    public function index()
    {
        return view('master.assessment_topic.index');
    }

    public function create()
    {
        return view('master.assessment_topic.create');
    }

    public function edit($id)
    {
        $getResult = OoapMasAssessmentTopic::find($id);
        return view('master.assessment_topic.edit', ['datacentermaster' => $getResult]);
    }

    public function destroy($id)
    {
        $checkResult = OoapMasAssessmentTopic::find($id);
        ($checkResult->in_active == 1) ? $in_active = 0 : $in_active = 1;
        OoapMasAssessmentTopic::where('assessment_topics_id', '=', $id)->update([
            'in_active' => $in_active
        ]);
        return redirect()->back()->with('message', 'ดำเนินการ ลบข้อมูล เรียบร้อย');
    }
}
