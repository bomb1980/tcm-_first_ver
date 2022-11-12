<?php

namespace App\Http\Controllers\activity\assessment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
    {
        return view('activity.assessment.index');
    }

    public function create()
    {
        return view('activity.assessment.create');
    }
}
