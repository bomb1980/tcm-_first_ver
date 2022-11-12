<?php

namespace App\Http\Controllers\activity\operate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperateController extends Controller
{
    public function index()
    {
        return view('activity.operate.index');
    }
}
