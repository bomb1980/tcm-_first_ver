<?php

namespace App\Http\Controllers\activity\assessment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecordattendanceController extends Controller
{
    public function index()
    {
        return view('activity.recordattendance.index');
    }

    public function create($reqform_id)
    {
        return view('activity.recordattendance.create', ['reqform_id' => $reqform_id]);
    }
}
