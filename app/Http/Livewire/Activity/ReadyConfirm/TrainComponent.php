<?php

namespace App\Http\Livewire\Activity\ReadyConfirm;

use App\Models\OoapMasActtype;
use App\Models\OoapMasAmphur;
use App\Models\OoapMasBuildingtype;
use App\Models\OoapMasCourse;
use App\Models\OoapMasCoursegroup;
use App\Models\OoapMasCoursesubgroup;
use App\Models\OoapMasPatternarea;
use App\Models\OoapMasProvince;
use App\Models\OoapMasTambon;
use App\Models\OoapMasTroubletype;
use App\Models\OoapMasUnit;
use App\Models\OoapTblFiscalyear;
use App\Models\OoapTblReqform;
use App\Models\UmMasDepartment;
use DateTime;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TrainComponent extends Component
{
  public $stdate, $endate, $date_list = [], $perioddays, $wages, $target_peoples;
  public $lat, $lng, $moo, $tambon_id, $tambon_list, $amphur_id, $amphur_list, $province_id, $province_list, $cmleader_desp, $cmname, $cmleader_name, $cmleader_position;
  public $reqform_no, $panel = 1, $status = 1, $acttype2;
  public $acttype_id, $fiscalyear_code, $fiscalyear_list, $dept_id, $dept_list, $unit_id = 1, $unit_list, $acttye_list, $acttye_id, $buildingtype_list, $buildingtype_id;
  public $actname, $troubletype_id, $troubletype_list;
  public $patternarea_id = 0, $actdetail, $actremark, $local_material, $people_benefit_qty;
  public $area_wide, $area_long, $area_high, $area_total;
  public $plan_startdate, $plan_enddate, $day_qty, $people_qty, $trainer_qty, $job_wage_rate, $other_rate, $job_wage_amt, $other_amt, $total_amt;
  public $created_at, $building_name, $building_lat, $building_long;

  public $coursegroup_id, $coursegroup_list, $coursesubgroup_id, $coursesubgroup_list, $course_id, $course_list;
  public $course_lunch_rate, $course_lunch_amt, $course_trainer_rate, $course_trainer_amt, $course_material_rate, $course_material_amt;

  public function latLng($latlng){
    // dd($latlng);
    $this->building_lat = $latlng['lat'];
    $this->building_long = $latlng['lng'];
  }

  public function mount()
  {
    // $this->dept_list = DB::connection('oracle_umts')->table('um_mas_department')->pluck("dept_name_th", "dept_id");
    // $this->dept_list = UmMasDepartment::pluck('dept_name_th', 'dept_id');
    $this->fiscalyear_list = OoapTblFiscalyear::pluck('fiscalyear_code', 'fiscalyear_code as new');
    $this->acttye_list = OoapMasActtype::pluck('name', 'id');
    $this->troubletype_list = OoapMasTroubletype::pluck('name', 'id');
    $this->unit_list = OoapMasUnit::pluck('name', 'id');
    $this->province_list = OoapMasProvince::pluck('province_name', 'province_id');
    $this->created_at = date("Y-m-d");
    $this->acttye_id = 2;
    $this->buildingtype_list = OoapMasBuildingtype::pluck('name', 'buildingtype_id');
    $this->patternarea_list = OoapMasPatternarea::pluck('name', 'patternarea_id');

    $this->coursegroup_list = OoapMasCoursegroup::where('in_active', '=', false)
      ->where('acttype_id', '=', 2)
      ->orderby('name', 'asc')->pluck('name', 'id');

    $this->coursesubgroup_list = OoapMasCoursesubgroup::where('in_active', '=', false)
      ->where('coursegroup_id', '=', $this->coursegroup_id)
      ->orderby('name', 'asc')->pluck('name', 'id');

    $this->course_list = OoapMasCourse::where('in_active', '=', false)
      ->where('coursegroup_id', '=', $this->coursegroup_id)->where('coursesubgroup_id', '=', $this->coursesubgroup_id)
      ->orderby('name', 'asc')->pluck('name', 'id');

    $this->acttype2 = OoapMasActtype::where('inactive', '=', false)->where('id', '=', 2)->first();
    $this->course_lunch_rate = $this->acttype2->couse_lunch_maxrate;
    $this->course_trainer_rate = $this->acttype2->couse_trainer_maxrate;
    $this->course_material_rate = $this->acttype2->couse_material_maxrate;

    // dd($this->course_lunch_rate);
  }

  public function submit_prototype($status)
  {
    // dd($this->moo);
    $this->validate([
      'fiscalyear_code' => 'required',
    ], [
      'fiscalyear_code.required' => 'กรุณากรอก ปีงบประมาณ',
    ]);
    OoapTblReqform::insert([
      'reqform_no' => $this->reqform_no,
      'fiscalyear_code' => $this->fiscalyear_code,
      'dept_id' => $this->dept_id,
      'acttype_id' => 2,
      'coursegroup_id' => $this->coursegroup_id,
      'coursesubgroup_id' => $this->coursesubgroup_id,
      'course_id' => $this->course_id,
      'actname' => $this->actname,
      // 'troubletype_id' => 1, //suppose to be nullable
      'actdetail' => $this->actdetail,
      'actremark' => $this->actremark,
      // 'local_material' => $this->local_material,
      // 'people_benefit_qty' => 1, //suppose to be nullable
      // 'patternarea_id' => 1, //suppose to be nullable
      // 'area_wide' => $this->area_wide,
      // 'area_long' => $this->area_long,
      // 'area_high' => $this->area_high,
      // 'area_total' => $this->area_total,

      'cmname' => $this->cmname,
      'cmleader_name' => $this->cmleader_name,
      'cmleader_position' => $this->cmleader_position,
      'cmleader_desp' => $this->cmleader_desp,

      // 'buildingtype_id' => 1, //suppose to be nullable
      'building_name' => $this->building_name,
      'moo' => $this->moo,
      'tambon_id' => $this->tambon_id,
      'amphur_id' => $this->amphur_id,
      'province_id' => $this->province_id,
      'building_lat' => $this->building_lat,
      'building_long' => $this->building_long,
      // 'area_total' => $this->area_total,
      'plan_startdate' => $this->plan_startdate,
      'plan_enddate' => $this->plan_enddate,
      'day_qty' => $this->day_qty,
      'people_qty' => $this->people_qty,
      'trainer_qty' => $this->trainer_qty,
      'couse_lunch_rate' => $this->course_lunch_rate,
      'couse_trainer_rate' => $this->course_trainer_rate,
      'couse_material_rate' => $this->course_material_rate,
      'other_rate' => 1, //this column shouldn't exist
      // 'job_wage_amt' => $this->job_wage_amt,
      'couse_lunch_amt' => $this->course_lunch_amt,
      'couse_trainer_amt' => $this->course_trainer_amt,
      'couse_material_amt' => $this->course_material_amt,
      'other_amt' => $this->other_amt,
      'total_amt' => $this->total_amt,
      'status' => $status,
      'remember_token' => csrf_token(),
      'created_by' => auth()->user()->emp_citizen_id,
      'created_at' => now(),
    ]);
    $this->emit('popup');
  }

  protected $listeners = ['redirect-to' => 'redirect_to'];

  public function redirect_to()
  {
    return redirect()->to('/activity/ready_confirm');
  }

  public function changPanel($num)
  {
    $this->panel = $num;
  }

  // public function setArray()
  // {
  //     $this->date_list = [];
  //     $st_date = datePickerThaiToDB($this->stdate);
  //     $en_date = datePickerThaiToDB($this->endate);
  //     $this->date_list = array($st_date);
  //     while (end($this->date_list) < $en_date) {
  //         array_push($this->date_list, date('Y-m-d', strtotime(end($this->date_list) . ' +1 day')));
  //     }

  //     $this->plan_startdate = new DateTime(datePickerThaiToDB($this->stdate));
  //     $this->plan_enddate = new DateTime(datePickerThaiToDB($this->endate));
  //     $interval = $this->plan_startdate->diff($this->plan_enddate);
  //     $this->day_qty = $interval->d + 1 ?? 0;
  // }

  public function setArray()
  {
    // $this->date_list = [];
    $st_date = montYearsToDate($this->stdate);
    $en_date = montYearsToDate($this->endate);
    // $this->date_list = array($st_date);
    // while(end($this->date_list) < $en_date){
    //     // $this->date_list = date('Y-m-d', strtotime(end($this->date_list).' +1 day'));
    //     array_push($this->date_list, date('Y-m-d', strtotime(end($this->date_list).' +1 day')));
    // }

    $this->plan_startdate = new DateTime(montYearsToDate($this->stdate));
    $this->plan_enddate = new DateTime(montYearsToDate($this->endate));
    // $interval = $this->plan_startdate->diff($this->plan_enddate); //หาจำนวนวัน
    // dd($interval);
    // $this->day_qty = $interval->d+1 ?? 0;
  }

  public function setValue($name, $val)
  {
    dd($name, $val);
    $this->$name = $val;
  }

  public function changeCoursegroup($val)
  {
    $this->coursegroup_id = $val;
    $this->coursesubgroup_list = OoapMasCoursesubgroup::where('in_active', '=', false)
      ->where('coursegroup_id', '=', $val)->orderby('name', 'asc')->pluck('name', 'id');
    $this->course_list = OoapMasCourse::where('in_active', '=', false)
      ->where('coursegroup_id', '=', $this->coursegroup_id)
      ->where('coursesubgroup_id', '=', $val)
      ->orderby('name', 'asc')->pluck('name', 'id');
    $this->actname = OoapMasCourse::select('name')->where('in_active', '=', false)->where('coursegroup_id', '=', $val)->first();
    // dd($this->actname);
  }

  public function changeCoursesubgroup($val)
  {
    $this->coursesubgroup_id = $val;
    $this->course_list = OoapMasCourse::where('in_active', '=', false)
      ->where('coursegroup_id', '=', $this->coursegroup_id)
      ->where('coursesubgroup_id', '=', $val)
      ->orderby('name', 'asc')->pluck('name', 'id');
    $this->actname = OoapMasCourse::select('name')->where('in_active', '=', false)->where('coursesubgroup_id', '=', $val)->first();
  }

  public function changeCourse($val)
  {
    $this->course_id = $val;
    // $this->actname = OoapMasCourse::select('name')->where('in_active', false)->where('id', $val)->first()->name;
    $this->actname = OoapMasCourse::select('name')->where('in_active', '=', false)->where('id', '=', $this->course_id)->first()->name;
  }

  public function render()
  {
    $this->emit('emits');
    // $this->job_wage_amt = $this->job_wage_rate * $this->day_qty * $this->people_qty ?? 0;
    if ($this->course_lunch_rate && $this->people_qty && $this->day_qty) {
      $this->course_lunch_amt = $this->course_lunch_rate * $this->people_qty * $this->day_qty;
    } else {
      $this->course_lunch_amt = 0;
    }

    if ($this->course_trainer_rate && $this->day_qty && $this->trainer_qty) {
      $this->course_trainer_amt = $this->course_trainer_rate * 6 * $this->day_qty * $this->trainer_qty;
    } else {
      $this->course_trainer_amt = 0;
    }

    if ($this->course_material_rate && $this->people_qty) {
      $this->course_material_amt = $this->course_material_rate * $this->people_qty;
    } else {
      $this->course_material_amt = 0;
    }

    $this->total_amt = $this->course_lunch_amt + $this->course_trainer_amt + $this->course_material_amt + $this->other_amt;

    $this->amphur_list = OoapMasAmphur::where('province_id', '=', $this->province_id)->pluck('amphur_name', 'amphur_id');
    $this->tambon_list = OoapMasTambon::where('amphur_id', '=', $this->amphur_id)->pluck('tambon_name', 'tambon_id');


    $getId = OoapTblReqform::select('reqform_id')->where('fiscalyear_code', '=', $this->fiscalyear_code)->orderBy('reqform_id', 'DESC')->count() ?? 1;
    $this->reqform_no = "RF-" . substr($this->fiscalyear_code, 2) . "-" . sprintf('%04d', $getId + 1);

    return view('livewire.activity.ready-confirm.train-component');
  }
}
