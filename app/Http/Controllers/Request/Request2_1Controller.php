<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Request2_1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('request.request2.request2_1.index');
    }

    public function create()
    {
        return view('request.request2.request2_1.create');
    }

    public function edit($id)
    {
        return view('request.request2.request2_1.edit', ['reqform_id' => $id]);
    }
}
