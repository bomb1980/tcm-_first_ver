<?php

namespace App\Http\Controllers\Manage\local_mng;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalMngController extends Controller
{
    public function index()
    {
        return view('manage.local_mng.index');
    }

    public function tranback()
    {
        return view('manage.local_mng.tranbackcen');
    }
}
