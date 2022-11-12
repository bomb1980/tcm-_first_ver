<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Models\OoapTblEmployee;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $logs = array(
            'log_type' => 'permission',
            'log_name' => 'เข้าเมนู กำหนดสิทธิ์การเข้าใช้งานระบบ',
        );

        // log_save($logs);

        return view('permission.index');
    }

    public function create()
    {
        $logs = array(
            'log_type' => 'permission',
            'log_name' => 'สร้าง กำหนดสิทธิ์การเข้าใช้งานระบบ',
        );

        // log_save($logs);

        return view('permission.create');
    }

    public function edit($id)
    {
        $logs = array(
            'log_type' => 'permission',
            'log_name' => 'แก้ไข กำหนดสิทธิ์การเข้าใช้งานระบบ',
            'data_array' => $id,
        );

        // log_save($logs);

        $dataRoleUser = OoapTblEmployee::find($id);
        return view('permission.edit', [
            'dataRoleUser' => $dataRoleUser,
        ]);
    }
}
