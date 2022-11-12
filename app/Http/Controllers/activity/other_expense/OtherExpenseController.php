<?php

namespace App\Http\Controllers\activity\other_expense;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtherExpenseController extends Controller
{
    public function index()
    {
        return view('activity.other_expense.index');
    }

    public function create()
    {
        return view('activity.other_expense.create');
    }
}
