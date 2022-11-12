<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupPermissionController extends Controller
{
    public function index()
    {
        return view('grouppermission.create');
    }
}
