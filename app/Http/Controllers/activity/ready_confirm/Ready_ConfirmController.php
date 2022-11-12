<?php

namespace App\Http\Controllers\activity\ready_confirm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Ready_ConfirmController extends Controller
{
    public function index()
    {
        return view('activity.ready_confirm.index');
    }

    public function list()
    {
        return view('activity.ready_confirm.list');
    }

    public function hire()
    {
        return view('activity.ready_confirm.hire');
    }

    public function train()
    {
        return view('activity.ready_confirm.train');
    }
}
