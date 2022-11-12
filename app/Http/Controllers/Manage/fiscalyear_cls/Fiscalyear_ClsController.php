<?php

namespace App\Http\Controllers\Manage\fiscalyear_cls;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Fiscalyear_ClsController extends Controller
{
    public function index()
    {
        return view('manage.fiscalyear_cls.index');
    }
}
