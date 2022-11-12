<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Models\OoapMasCourse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    public function getCourse(Request $request)
    {
    $data = OoapMasCourse::select('ooap_mas_course.id','ooap_mas_course.acttype_id','ooap_mas_acttype.name as acttype_name','ooap_mas_course_ownertype.name as ownertype_name',
        'ooap_mas_course.code','ooap_mas_course.name','ooap_mas_course.shortname','ooap_mas_course.descp','ooap_mas_coursegroup.name as coursegroup_name',
        'ooap_mas_coursetype.name as coursetype_name','ooap_mas_coursesubgroup.name as coursesubgroup_name','ooap_mas_course.hour_descp','ooap_mas_course.day_descp','ooap_mas_course.people_descp')
            ->leftjoin('ooap_mas_course_ownertype','ooap_mas_course_ownertype.id','ooap_mas_course.ownertype_id')
            ->leftjoin('ooap_mas_acttype','ooap_mas_acttype.id','ooap_mas_course.acttype_id')
            ->leftjoin('ooap_mas_coursegroup','ooap_mas_coursegroup.id','ooap_mas_course.coursegroup_id')
            ->leftjoin('ooap_mas_coursesubgroup','ooap_mas_coursesubgroup.id','ooap_mas_course.coursesubgroup_id')
            ->leftjoin('ooap_mas_coursetype','ooap_mas_coursetype.id','ooap_mas_course.coursetype_id')
            ->where('ooap_mas_course.in_active','=', false)
            ->orderBy('ooap_mas_course.code','asc');
        // dd($data->toSql());
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('coursetype_name', function ($data) {
                $show = $data->coursetype_name ?? 'ไม่ระบุ';
                return $show;
            })
            ->addColumn('coursesubgroup_name', function ($data) {
                $show = $data->coursesubgroup_name ?? 'ไม่ระบุ';
                return $show;
            })
            ->addColumn('edit', function ($data) {
                $button = '<div class="icondemo vertical-align-middle p-2">';
                $button .= '<a href="course/' . $data->id . '/edit"><i class="icon wb-pencil" aria-hidden="true" title="แก้ไข"></i></a>';
                $button .= '</div>';
                return $button;
            })
            ->addColumn('del', function ($data) use ($request) {
                $button = '<button type="button" class="btn btn-pure btn-danger icon wb-trash"  onclick="change_delete(' . $data->id . ')" title="ลบ"></button>';
                $button .= '<form action="/master/course/' . $data->id .'" id="delete_form' . $data->id . '" method="post">
                    <input type="hidden" name="_token" value="' . $request->get('token') . '">' . method_field('DELETE') . '</form>';
                return $button;
            })
            // ->addColumn('management', function ($data) use ($request) {
            //     $button = '<div class="icondemo vertical-align-middle p-2">';
            //     $button .= '<a href="course/' . $data->id . '/edit"><i class="icon wb-pencil" aria-hidden="true" title="แก้ไข"></i></a>';
            //     $button .= '</div>';
            //     return $button;

            //     $button = '<button type="button" class="btn btn-pure btn-danger icon wb-trash"  onclick="change_delete(' . $data->id . ')" title="ลบ"></button>';
            //     $button .= '<form action="/master/course/' . $data->id .'" id="delete_form' . $data->id . '" method="post">
            //         <input type="hidden" name="_token" value="' . $request->get('token') . '">' . method_field('DELETE') . '</form>';
            //     return $button;
            // })
            ->rawColumns(['coursetype_name', 'coursesubgroup_name', 'edit', 'del'])
            // ->rawColumns(['management'])
            ->make(true);
        }
}
