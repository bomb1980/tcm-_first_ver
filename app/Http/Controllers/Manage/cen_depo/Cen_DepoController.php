<?php

namespace App\Http\Controllers\Manage\cen_depo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Cen_DepoController extends Controller
{
    public function index()
    {
        return view('manage.cen_depo.index');
    }

    public function create()
    {
        return view('manage.cen_depo.create');
    }

    public function edit($id)
    {
        return view('manage.cen_depo.edit', ['den_id' => $id]);
    }
}
