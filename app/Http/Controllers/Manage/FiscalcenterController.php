<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FiscalcenterController extends Controller
{
    public function index()
    {
        return view('manage.fiscalcenter.index');
    }
}
