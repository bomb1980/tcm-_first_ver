<?php

namespace App\Http\Controllers\activity\plan_adjust;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Plan_AdjustController extends Controller
{
    public function index()
    {
        return view('activity.plan_adjust.index');
    }

    public function hire()
    {
        return view('activity.plan_adjust.hire');
    }

    public function train()
    {
        return view('activity.plan_adjust.train');
    }
}
