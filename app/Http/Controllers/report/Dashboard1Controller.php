<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard1Controller extends Controller
{
    public function index()
    {
        return view('report.dashboard1.index');
    }
}
