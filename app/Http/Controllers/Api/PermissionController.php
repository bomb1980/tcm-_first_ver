<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OoapTblEmployee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    public function permission_list(Request $request)
    {

        $data = OoapTblEmployee::select([
            'ooap_tbl_employees.*',
            'ooap_mas_role.role_name_th',
        ])
        ->leftjoin('ooap_mas_role', 'ooap_tbl_employees.role_id', 'ooap_mas_role.role_id')
        ->where('ooap_tbl_employees.in_active', false)
        ->orderBy('ooap_tbl_employees.role_id');
        return DataTables::of($data)
            ->addIndexColumn()

            ->addColumn('name_user', function ($data) {
                $name = $data->title_th . ' ' . $data->fname_th . ' ' . $data->lname_th;
                return $name;
            })
            ->addColumn('edit', function ($data) {


                $button = '<a href="/permission/' . $data->emp_id . '/edit"><i class="fa fa-edit"></i></i></a>';
                return $button;
            })
            ->rawColumns(['name_user', 'edit'])
            ->make(true);
    }
}
