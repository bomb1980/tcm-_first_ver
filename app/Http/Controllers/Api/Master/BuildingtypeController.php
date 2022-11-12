<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Models\OoapMasBuildingtype;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BuildingtypeController extends Controller
{
    public function getBuildingtype(Request $request)
    {
    $data = OoapMasBuildingtype::select('buildingtype_id','name','shortname')
            ->where('in_active','=', false)
            ->orderBy('buildingtype_id','asc');
        // dd($data->toSql());
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('edit', function ($data) {
                $button = '<div class="icondemo vertical-align-middle p-2">';
                $button .= '<a href="buildingtype/' . $data->buildingtype_id . '/edit"><i class="icon wb-pencil" aria-hidden="true" title="แก้ไข"></i></a>';
                $button .= '</div>';
                return $button;
            })
            ->addColumn('del', function ($data) use ($request) {
                $button = '<button type="button" class="btn btn-pure btn-danger icon wb-trash"  onclick="change_delete(' . $data->buildingtype_id . ')" title="ลบ"></button>';
                $button .= '<form action="/master/buildingtype/' . $data->buildingtype_id .'" id="delete_form' . $data->buildingtype_id . '" method="post">
                    <input type="hidden" name="_token" value="' . $request->get('token') . '">' . method_field('DELETE') . '</form>';
                return $button;
            })
            ->rawColumns(['edit', 'del'])
            ->make(true);
    }
}
