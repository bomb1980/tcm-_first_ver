<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllocateController extends Controller
{
    public function create()
    {
        return view('manage.allocate.create');
    }
}
