<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReceivetransferController extends Controller
{
    public function index()
    {
        return view('manage.receivetransfer.index');
    }

    public function create()
    {
        return view('manage.receivetransfer.create');
    }

    public function edit($id)
    {
        return view('manage.receivetransfer.edit', ['ret_id' => $id]);
    }
}
