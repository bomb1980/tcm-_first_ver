<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard3Controller extends Controller
{
    public function index()
    {
        return view('report.dashboard3.index');
    }
    public function repoer4()
    {
        return view('report.dashboard4.index');
    }
    public function repoer5()
    {
        return view('report.dashboard5.index');
    }
    public function repoer6()
    {
        return view('report.dashboard6.index');
    }
}
