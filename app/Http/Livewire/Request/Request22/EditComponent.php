<?php

namespace App\Http\Livewire\Request\Request22;

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
use App\Models\OoapTblReqformFiles;
use App\Models\UmMasDepartment;
use DateTime;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditComponent extends Component
{
  use WithFileUploads;
  public $reqform_id;
  public $stdate, $endate, $date_list = [], $perioddays, $wages, $target_peoples;
  public $lat, $lng, $moo, $tambon_id, $tambon_list, $amphur_id, $amphur_list, $province_id, $province_list, $cmleader_desp, $cmname, $cmleader_name, $cmleader_position;
  public $reqform_no, $panel = 1, $status = 1;
  public $acttype_id, $fiscalyear_code, $fiscalyear_list, $dept_id, $dept_list, $unit_id = 1, $unit_list, $acttye_list, $acttye_id, $buildingtype_list, $buildingtype_id;
  public $actname, $troubletype_id, $troubletype_list;
  public $patternarea_id = 0, $actdetail, $actremark, $local_material, $people_benefit_qty;
  public $area_wide, $area_long, $area_high, $area_total;
  public $plan_startdate, $plan_enddate, $day_qty, $people_qty, $trainer_qty, $job_wage_rate, $other_rate, $job_wage_amt, $other_amt, $total_amt;
  public $created_at, $building_name, $building_lat, $building_long;

  public $coursegroup_id, $coursegroup_list, $coursesubgroup_id, $coursesubgroup_list, $course_id, $course_list;
  public $course_lunch_rate, $course_lunch_amt, $course_trainer_rate, $course_trainer_amt, $course_material_rate, $course_material_amt;

  public $file_array = [], $files, $file_array_old;

  public function latLng($latlng)
  {
    // dd($latlng);
    $this->building_lat = $latlng['lat'];
    $this->building_long = $latlng['lng'];
  }

  public function submit_file_array()
  {
    // dd($this->files);
    $this->validate([
      'files' => 'required',
    ], [
      'files.required' => 'กรุณาเลือกไฟล์',
    ]);
    array_push($this->file_array, $this->files);
    $this->files = null;
    // dd($this->file_array);
  }

  public function destroy_array($key)
  {
    unset($this->file_array[$key]);
    $this->file_array = array_values($this->file_array);
  }

  public function destroy_old_array($key)
  {
    unset($this->file_array_old[$key]);
    $this->file_array_old = array_values($this->file_array_old);
  }

  public function mount($pullreqform)
  {
    $this->reqform_id = $pullreqform->reqform_id;
    // $this->pullreqform = $pullreqform->reqform_no;
    $this->reqform_no = $pullreqform->reqform_no;
    $this->dept_id = $pullreqform->dept_id;
    // $this->dept_list = DB::connection('oracle_umts')->table('um_mas_department')->pluck("dept_name_th", "dept_id");
    $this->dept_list = UmMasDepartment::pluck('dept_name_th', 'dept_id');
    $this->created_at = date($pullreqform->created_at);
    $this->fiscalyear_code = $pullreqform->fiscalyear_code;
    $this->fiscalyear_list = OoapTblFiscalyear::pluck('fiscalyear_code', 'fiscalyear_code as new');
    $this->acttye_list = OoapMasActtype::pluck('name', 'id');
    $this->troubletype_list = OoapMasTroubletype::pluck('name', 'id');
    $this->unit_list = OoapMasUnit::pluck('name', 'id');
    $this->province_list = OoapMasProvince::pluck('province_name', 'province_id');
    $this->acttye_id = $pullreqform->acttype_id;
    $this->buildingtype_list = OoapMasBuildingtype::pluck('name', 'buildingtype_id');
    $this->patternarea_list = OoapMasPatternarea::pluck('name', 'patternarea_id');

    $this->coursegroup_id = $pullreqform->coursegroup_id;
    $this->coursegroup_list = OoapMasCoursegroup::where('in_active', '=', false)
      ->where('acttype_id', '=', 2)
      ->orderby('name', 'asc')->pluck('name', 'id');

    $this->coursesubgroup_id =  $pullreqform->coursesubgroup_id;
    $this->coursesubgroup_list = OoapMasCoursesubgroup::where('in_active', '=', false)
      ->where('coursegroup_id', '=', $this->coursegroup_id)
      ->orderby('name', 'asc')->pluck('name', 'id');

    $this->course_id =  $pullreqform->course_id;
    $this->course_list = OoapMasCourse::where('in_active', '=', false)
      ->where('coursegroup_id', '=', $this->coursegroup_id)->where('coursesubgroup_id', '=', $this->coursesubgroup_id)
      ->orderby('name', 'asc')->pluck('name', 'id');

    $this->actname = $pullreqform->actname;
    $this->actdetail = $pullreqform->actdetail;
    $this->actremark = $pullreqform->actremark;
    $this->building_name = $pullreqform->building_name;
    $this->building_lat = $pullreqform->building_lat;
    $this->building_long = $pullreqform->building_long;
    $this->province_id = $pullreqform->province_id;
    $this->amphur_id = $pullreqform->amphur_id;
    $this->tambon_id = $pullreqform->tambon_id;
    $this->moo = $pullreqform->moo;
    $this->cmleader_desp = $pullreqform->cmleader_desp;
    $this->cmname = $pullreqform->cmname;
    $this->cmleader_name = $pullreqform->cmleader_name;
    $this->cmleader_position = $pullreqform->cmleader_position;

    $this->stdate = dateToMontYears($pullreqform->plan_startdate);
    $this->endate = dateToMontYears($pullreqform->plan_enddate);
    $this->plan_startdate = $pullreqform->plan_startdate;
    $this->plan_enddate = $pullreqform->plan_enddate;

    $this->day_qty = $pullreqform->day_qty;
    $this->plan_startdate = $pullreqform->plan_startdate;
    $this->plan_enddate = $pullreqform->plan_enddate;
    $this->people_qty = $pullreqform->people_qty;
    $this->trainer_qty = $pullreqform->trainer_qty;
    $this->day_qty = $pullreqform->day_qty;
    $this->course_lunch_rate = $pullreqform->couse_lunch_rate;
    $this->course_trainer_rate = $pullreqform->couse_trainer_rate;
    $this->course_material_rate = $pullreqform->couse_material_rate;
    $this->other_amt = $pullreqform->other_amt;
    $this->status = $pullreqform->status;

    $this->file_array_old = OoapTblReqformFiles::where('reqform_id', '=', $this->reqform_id)->where('in_active', '=', false)->get()->toArray() ?? [];
  }

  public function submit_cancle()
  {
    OoapTblReqform::where('reqform_id', '=', $this->reqform_id)->update([
      'status' => 9,
      'updated_at' => now(),
      'updated_by' => auth()->user()->emp_citizen_id,
    ]);
    // dd($this);
    $this->emit('popup');
  }

  public function submit_prototype($status)
  {
    // dd($this->moo);
    OoapTblReqform::where('reqform_id', '=', $this->reqform_id)->update([
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
      // 'remember_token' => csrf_token(),
      'updated_by' => auth()->user()->emp_citizen_id,
      'updated_at' => now(),
    ]);

    $array_left = array_column($this->file_array_old, 'files_id') ?? []; // ที่เหลือจากลบแล้ว

    OoapTblReqformFiles::where('reqform_id', '=', $this->reqform_id)->whereNotIn('files_id', $array_left)->update([ // ลบไฟล์ที่ไม่มีออก
      'in_active' => 1,
      'deleted_by' => auth()->user()->name,
      'deleted_at' => now()
    ]);

    if (!empty($this->file_array)) {
      $path_file = '/reqform';
      foreach ($this->file_array as $file) {
        $file->store('/public' . $path_file);
        OoapTblReqformFiles::create([
          'files_ori' => $file->getClientOriginalName(),
          'files_gen' => $file->hashName(),
          'files_path' => $path_file,
          'files_type' => $file->getMimeType(),
          'files_size' => $file->getSize(),
          'reqform_id' => $this->reqform_id,

          'created_by' => auth()->user()->emp_citizen_id,
          'created_at' => now(),
        ]);
      }
    }
    $this->emit('popup');
  }

  protected $listeners = ['redirect-to' => 'redirect_to'];

  public function redirect_to()
  {
    return redirect()->to('/request/request2_3');
  }

  public function changPanel($num)
  {
    $this->panel = $num;
  }

  public function setArray()
  {
    $this->date_list = [];
    $st_date = datePickerThaiToDB($this->stdate);
    $en_date = datePickerThaiToDB($this->endate);
    $this->date_list = array($st_date);
    while (end($this->date_list) < $en_date) {
      // $this->date_list = date('Y-m-d', strtotime(end($this->date_list).' +1 day'));
      array_push($this->date_list, date('Y-m-d', strtotime(end($this->date_list) . ' +1 day')));
    }

    $this->plan_startdate = new DateTime(datePickerThaiToDB($this->stdate));
    $this->plan_enddate = new DateTime(datePickerThaiToDB($this->endate));
    $interval = $this->plan_startdate->diff($this->plan_enddate);
    // dd($interval);
    $this->day_qty = $interval->d + 1 ?? 0;
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

    if ($this->other_amt) {
      $this->total_amt = $this->course_lunch_amt + $this->course_trainer_amt + $this->course_material_amt + $this->other_amt;
    } else {
      $this->total_amt = $this->course_lunch_amt + $this->course_trainer_amt + $this->course_material_amt;
    }

    $this->amphur_list = OoapMasAmphur::where('province_id', '=', $this->province_id)->pluck('amphur_name', 'amphur_id');
    $this->tambon_list = OoapMasTambon::where('amphur_id', '=', $this->amphur_id)->pluck('tambon_name', 'tambon_id');


    $getId = OoapTblReqform::select('reqform_id')->where('fiscalyear_code', '=', $this->fiscalyear_code)->orderBy('reqform_id', 'DESC')->count() ?? 1;
    // $this->reqform_no = "RF-" . substr($this->fiscalyear_code, 2) . "-" . sprintf('%04d', $getId + 1);

    return view('livewire.request.request22.edit-component');
  }
}
