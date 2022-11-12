<?php

namespace App\Http\Controllers\activity\tran_mng;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Tran_MngController extends Controller
{
    public function index()
    {
        return view('activity.tran_mng.index');
    }

    public function manage()
    {
        return view('activity.tran_mng.manage');
    }

    public function transfer()
    {
        return view('activity.tran_mng.transfer');
    }

    public function allocate()
    {
        return view('activity.tran_mng.allocate');
    }
}
