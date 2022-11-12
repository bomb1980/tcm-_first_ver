<?php

namespace App\Http\Controllers\activity\join_activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JoinActivityController extends Controller
{
    public function index()
    {
        return view('activity.join_activity.index');
    }
    public function create()
    {
        return view('activity.join_activity.create');
    }
}
