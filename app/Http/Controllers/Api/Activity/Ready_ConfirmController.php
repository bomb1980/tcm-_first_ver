<?php

namespace App\Http\Controllers\api\Activity;

use App\Http\Controllers\Controller;
use App\Models\OoapTblReqform;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Ready_ConfirmController extends Controller
{
    public function getAct(Request $request)
    {
        $data = OoapTblReqform::select(
                'ooap_mas_acttype.name as acttype_name',
                'um_mas_department.dept_name_th',
                'ooap_tbl_reqform.moo',
                'ooap_mas_amphur.amphur_name',
                'ooap_mas_tambon.tambon_name',
                'ooap_tbl_reqform.reqform_id',
                'ooap_tbl_reqform.fiscalyear_code',
                'ooap_tbl_reqform.reqform_no',
                'ooap_tbl_reqform.acttype_id',
                'ooap_tbl_reqform.actname',
                'ooap_tbl_reqform.plan_startdate',
                'ooap_tbl_reqform.plan_enddate',
                'ooap_mas_coursegroup.name as coursegroup_name',
                'ooap_mas_coursesubgroup.name as coursesubgroup_name',
                'ooap_tbl_reqform.day_qty','ooap_tbl_reqform.people_qty',
                'ooap_tbl_reqform.total_amt',
                'ooap_tbl_reqform.status'
            )
            ->leftjoin('ooap_mas_acttype','ooap_tbl_reqform.acttype_id','ooap_mas_acttype.id')
            ->leftjoin('um_mas_department','ooap_tbl_reqform.dept_id','um_mas_department.dept_id')
            ->leftjoin('ooap_mas_amphur','ooap_tbl_reqform.amphur_id','ooap_mas_amphur.amphur_id')
            ->leftjoin('ooap_mas_tambon','ooap_tbl_reqform.tambon_id','ooap_mas_tambon.tambon_id')
            ->leftjoin('ooap_mas_coursegroup','ooap_tbl_reqform.coursegroup_id','ooap_mas_coursegroup.id')
            ->leftjoin('ooap_mas_coursesubgroup','ooap_tbl_reqform.coursesubgroup_id','ooap_mas_coursesubgroup.id')
            ->leftjoin('ooap_mas_troubletype','ooap_tbl_reqform.troubletype_id','ooap_mas_troubletype.id')
            ->where([['ooap_tbl_reqform.in_active','=', 0],['ooap_tbl_reqform.status', '!=', 1],['ooap_tbl_reqform.status', '!=', 9],['ooap_tbl_reqform.status', '=', 3]]);

            if($request->fiscalyear_code){
                $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
            }
            if($request->dept_id){
                $data = $data->where('um_mas_department.dept_id','=', $request->dept_id);
            }
            if($request->acttype_id){
                $data = $data->where('ooap_mas_acttype.id','=', $request->acttype_id);
            }
            if($request->status){
                $data = $data->where('ooap_tbl_reqform.status','=', $request->status);
            }
            $data = $data->orderBy('ooap_tbl_reqform.reqform_no','asc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status_confirm', function ($data) {
                $button = '<div class="icondemo vertical-align-middle p-2">';
                if($data->status == 2){
                    $button .= '<span class="text-primary">รอพิจารณา</span>';
                }else if($data->status == 3){
                    $button .= '<span class="text-success">ผ่าน</span>';
                }else if($data->status == 4){
                    $button .= '<span class="text-warning">ไม่ผ่าน</span>';
                }else if($data->status == 9){
                    $button .= '<span class="text-danger">ยกเลิก</span>';
                }
                $button .= '</div>';
                return $button;
            })
            ->addColumn('edit', function ($data) {
                $button = '<div class="icondemo vertical-align-middle p-2">';
                if($data->acttype_id == 1){
                    $button .= '<a href="/request/request3_1/' . $data->reqform_id . '/edit"><i class="icon wb-pencil" aria-hidden="true" title="แก้ไข"></i></a>';
                }else{
                    $button .= '<a href="/request/request3_2/' . $data->reqform_id . '/edit"><i class="icon wb-pencil" aria-hidden="true" title="แก้ไข"></i></a>';
                }
                $button .= '</div>';
                return $button;
            })
            ->addColumn('del', function ($data) use ($request) {
                $button = '<button type="button" class="btn btn-pure btn-danger icon wb-trash"  onclick="change_delete(' . $data->reqform_id . ')" title="ลบ"></button>';
                $button .= '<form action="/request/reqform/' . $data->reqform_id .'" id="delete_form' . $data->reqform_id . '" method="post">
                    <input type="hidden" name="_token" value="' . $request->get('token') . '">' . method_field('DELETE') . '</form>';
                return $button;
            })
            // ->addColumn('status_show', function ($data) use ($request) {
            //     $button = '<button type="button" class="btn btn-pure btn-danger icon wb-trash"  onclick="change_delete(' . $data->reqform_id . ')" title="ลบ"></button>';
            //     $button .= '<form action="/request/reqform/' . $data->reqform_id .'" id="delete_form' . $data->reqform_id . '" method="post">
            //         <input type="hidden" name="_token" value="' . $request->get('token') . '">' . method_field('DELETE') . '</form>';
            //     return $button;
            // })
            ->rawColumns([
                'status_confirm',
                'status_show',
                'edit',
                'del'
            ])
            ->make(true);
    }
}
