<?php

namespace App\Http\Controllers\Api\Request;

use App\Http\Controllers\Controller;
use App\Models\OoapTblFiscalyear;
use App\Models\OoapTblReqform;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;
use Yajra\DataTables\Facades\DataTables;


class ReqformController extends Controller
{
    public function getReqform(Request $request)
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
            'ooap_tbl_reqform.status')
            ->leftjoin('ooap_mas_acttype','ooap_tbl_reqform.acttype_id','ooap_mas_acttype.id')
            ->leftjoin('um_mas_department','ooap_tbl_reqform.dept_id','um_mas_department.dept_id')
            ->leftjoin('ooap_mas_amphur','ooap_tbl_reqform.amphur_id','ooap_mas_amphur.amphur_id')
            ->leftjoin('ooap_mas_tambon','ooap_tbl_reqform.tambon_id','ooap_mas_tambon.tambon_id')
            ->leftjoin('ooap_mas_coursegroup','ooap_tbl_reqform.coursegroup_id','ooap_mas_coursegroup.id')
            ->leftjoin('ooap_mas_coursesubgroup','ooap_tbl_reqform.coursesubgroup_id','ooap_mas_coursesubgroup.id')
            ->leftjoin('ooap_mas_troubletype','ooap_tbl_reqform.troubletype_id','ooap_mas_troubletype.id')
            ->where([['ooap_tbl_reqform.in_active','=', false]]);
            // ->orderBy('ooap_tbl_reqform.reqform_no','asc');

        if($request->acttype_id){
            $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
        }

        if($request->dept_id){
            $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
        }

        if($request->fiscalyear_code){
            $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
        }

        if($request->status){
            $data = $data->where('ooap_tbl_reqform.status','=', $request->status);
        }
        $data = $data->orderBy('ooap_tbl_reqform.reqform_no','asc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('total_amt_format', function ($data) {
                $text = number_format(($data->total_amt),2);
                return $text;
            })
            ->addColumn('status_confirm', function ($data) use ($request) {
                $button = '<div class="icondemo vertical-align-middle p-2">';
                    if($data->status == 1){
                        $button .= '<span class="text-primary">บันทึกร่าง</span>';
                    }else if($data->status == 2){
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
                if($data->status == 1){
                    if($data->acttype_id == 1){
                        $button .= '<a href="/request/request2_1/' . $data->reqform_id . '/edit"><i class="icon wb-pencil" aria-hidden="true" title="แก้ไข"></i></a>';
                    }else{
                        $button .= '<a href="/request/request2_2/' . $data->reqform_id . '/edit"><i class="icon wb-pencil" aria-hidden="true" title="แก้ไข"></i></a>';
                    }
                }else{
                    if($data->acttype_id == 1){
                        $button .= '<a href="/request/request2_1/' . $data->reqform_id . '/edit"><i class="icon wb-eye" aria-hidden="true" title="ดูข้อมูล"></i></a>';
                    }else{
                        $button .= '<a href="/request/request2_2/' . $data->reqform_id . '/edit"><i class="icon wb-eye" aria-hidden="true" title="ดูข้อมูล"></i></a>';
                    }
                    // $button .= '<a href="javascript:void(0)" class="text-secondary"><i class="icon fa-eye" aria-hidden="true" title="แก้ไข"></i></a>';
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
            ->addColumn('status_show', function ($data) use ($request) {
                $button = '<button type="button" class="btn btn-pure btn-danger icon wb-trash"  onclick="change_delete(' . $data->reqform_id . ')" title="ลบ"></button>';
                $button .= '<form action="/request/reqform/' . $data->reqform_id .'" id="delete_form' . $data->reqform_id . '" method="post">
                    <input type="hidden" name="_token" value="' . $request->get('token') . '">' . method_field('DELETE') . '</form>';
                return $button;
            })
            // ->rawColumns(['startdate_view','enddate_view','edit', 'del'])
            ->rawColumns([
                'status_show',
                'status_confirm',
                'edit',
                'del'
            ])
            ->make(true);
    }

    public function getReqform_seperate(Request $request){
        return OoapTblReqform::select('reqform_id')
            ->addSelect(['col1' => function ($data) use ($request) {
                $data->selectRaw('SUM(total_amt)')
                ->from('ooap_tbl_reqform')
                ->where('status','=', 1)
                ->where('fiscalyear_code','=', 2565)
                ->where('in_active','=', false);

                if($request->acttype_id){
                    $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
                }

                if($request->dept_id){
                    $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
                }

                if($request->fiscalyear_code){
                    $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
                }

                $data = $data->groupBy('status');

            }])->addSelect(['col2' => function ($data) use ($request) {
                $data->selectRaw('count(*)')
                ->from('ooap_tbl_reqform')
                ->where('status','=', 1)
                // ->where('fiscalyear_code', 2565)
                ->where('in_active','=', false)
                ->groupBy('status');

                if($request->acttype_id){
                    $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
                }

                if($request->dept_id){
                    $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
                }

                if($request->fiscalyear_code){
                    $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
                }

            }])
            ->addSelect(['col3' => function ($data) use ($request) {
                $data->selectRaw('SUM(total_amt)')
                ->from('ooap_tbl_reqform')
                ->where('status','=', 2)
                // ->where('fiscalyear_code', 2565)
                ->where('in_active','=', false)
                ->groupBy('status');

                if($request->acttype_id){
                    $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
                }

                if($request->dept_id){
                    $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
                }

                if($request->fiscalyear_code){
                    $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
                }

            }])->addSelect(['col4' => function ($data) use ($request) {
                $data->selectRaw('count(*)')
                ->from('ooap_tbl_reqform')
                ->where('status','=', 2)
                // ->where('fiscalyear_code', 2565)
                ->where('in_active','=', false)
                ->groupBy('status');

                if($request->acttype_id){
                    $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
                }

                if($request->dept_id){
                    $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
                }

                if($request->fiscalyear_code){
                    $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
                }

            }])
            ->addSelect(['col5' => function ($data) use ($request) {
                $data->selectRaw('SUM(total_amt)')
                ->from('ooap_tbl_reqform')
                ->where('status','=', 3)
                // ->where('fiscalyear_code', 2565)
                ->where('in_active','=', false)
                ->groupBy('status');

                if($request->acttype_id){
                    $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
                }

                if($request->dept_id){
                    $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
                }

                if($request->fiscalyear_code){
                    $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
                }

            }])->addSelect(['col6' => function ($data) use ($request) {
                $data->selectRaw('count(*)')
                ->from('ooap_tbl_reqform')
                ->where('status','=', 3)
                // ->where('fiscalyear_code', 2565)
                ->where('in_active','=', false)
                ->groupBy('status');

                if($request->acttype_id){
                    $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
                }

                if($request->dept_id){
                    $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
                }

                if($request->fiscalyear_code){
                    $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
                }

            }])
            ->addSelect(['col7' => function ($data) use ($request) {
                $data->selectRaw('SUM(total_amt)')
                ->from('ooap_tbl_reqform')
                ->where('status','=', 4)
                // ->where('fiscalyear_code', 2565)
                ->where('in_active','=', false)
                ->groupBy('status');

                if($request->acttype_id){
                    $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
                }

                if($request->dept_id){
                    $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
                }

                if($request->fiscalyear_code){
                    $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
                }

            }])->addSelect(['col8' => function ($data) use ($request) {
                $data->selectRaw('count(*)')
                ->from('ooap_tbl_reqform')
                ->where('status','=', 4)
                // ->where('fiscalyear_code', 2565)
                ->where('in_active','=', false)
                ->groupBy('status');

                if($request->acttype_id){
                    $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
                }

                if($request->dept_id){
                    $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
                }

                if($request->fiscalyear_code){
                    $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
                }

            }])
            ->addSelect(['col9' => function ($data) use ($request) {
                $data->selectRaw('SUM(total_amt)')
                ->from('ooap_tbl_reqform')
                ->where('status','=', 9)
                // ->where('fiscalyear_code', 2565)
                ->where('in_active','=', false)
                ->groupBy('status');

                if($request->acttype_id){
                    $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
                }

                if($request->dept_id){
                    $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
                }

                if($request->fiscalyear_code){
                    $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
                }

            }])->addSelect(['col10' => function ($data) use ($request) {
                $data->selectRaw('count(*)')
                ->from('ooap_tbl_reqform')
                ->where('status','=', 9)
                // ->where('fiscalyear_code', 2565)
                ->where('in_active','=', false)
                ->groupBy('status');

                if($request->acttype_id){
                    $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
                }

                if($request->dept_id){
                    $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
                }

                if($request->fiscalyear_code){
                    $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
                }

            }])
            ->addSelect(['col11' => function ($data) use ($request) {
                $data->selectRaw('SUM(total_amt)')
                ->from('ooap_tbl_reqform')
                ->whereIn('status', [1,2,3,4])
                // ->where('fiscalyear_code', 2565)
                ->where('in_active','=', false);

                if($request->acttype_id){
                    $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
                }

                if($request->dept_id){
                    $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
                }

                if($request->fiscalyear_code){
                    $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
                }

            }])->addSelect(['col12' => function ($data) use ($request) {
                $data->selectRaw('count(*)')
                ->from('ooap_tbl_reqform')
                ->whereIn('status', [1,2,3,4])
                // ->where('fiscalyear_code', 2565)
                ->where('in_active','=', false);

                if($request->acttype_id){
                    $data = $data->where('ooap_tbl_reqform.acttype_id','=', $request->acttype_id);
                }

                if($request->dept_id){
                    $data = $data->where('ooap_tbl_reqform.dept_id','=', $request->dept_id);
                }

                if($request->fiscalyear_code){
                    $data = $data->where('ooap_tbl_reqform.fiscalyear_code','=', $request->fiscalyear_code);
                }

            }])
            ->first();
    }
    public function getReqformYearsNoti(Request $request)
    {
        $fiscalyear_code = $request->fiscalyear_code ?? date("Y")+543;
        $st = OoapTblFiscalyear::select(['req_startdate'])->where('fiscalyear_code','=', $fiscalyear_code)->first()->req_startdate;
        $en = OoapTblFiscalyear::select(['req_enddate'])->where('fiscalyear_code','=', $fiscalyear_code)->first()->req_enddate;

        $date1=date_create($st);
        $date2=date_create($en);
        $now = new DateTime();

        $diff1=date_diff($date1,$date2);
        $diff_all = $diff1->format("%a") ?? 0;

        $diff2=date_diff($now,$date2);
        $diff_now = $diff2->format('%a') ?? 0;

        $per = ($diff_now/$diff_all)*100 ?? 0;

        if($per <= 15){
            $alert = '#dc3545';
        }else if($per <= 30){
            $alert = '#ffc107';
        }else{
            $alert = '#28a745';
        }

        return $arr = ['st' => datetoview($st), 'en' => datetoview($en), 'amount' => $diff_all, 'diff' => $diff_now, 'per' => $per, 'alert' => $alert];
    }
}
