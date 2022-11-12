<?php

namespace App\Http\Controllers\activity\act_detail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Act_DetailController extends Controller
{
    public function index()
    {
        return view('activity.act_detail.index');
    }

    public function create()
    {
        return view('activity.act_detail.create');
    }
}
