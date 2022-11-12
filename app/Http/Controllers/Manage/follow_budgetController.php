<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Follow_budgetController extends Controller
{
    public function index()
    {
        return view('manage.follow_budget.index');
    }
}
