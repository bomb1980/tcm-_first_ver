<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    public function index()
    {
        return view('manage.installment.index');
    }

    public function create()
    {
        // dd($_REQUEST);
        return view('manage.installment.create');
    }

    public function edit($id)
    {
        return view('manage.installment.edit', ['period_id' => $id]);
    }
}
