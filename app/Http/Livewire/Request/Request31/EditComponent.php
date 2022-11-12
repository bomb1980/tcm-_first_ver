<?php

namespace App\Http\Livewire\Request\Request31;

use App\Models\OoapMasActtype;
use App\Models\OoapMasAmphur;
use App\Models\OoapMasBuildingtype;
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
  public $lat, $lng, $moo, $tambon_id, $tambon_list, $amphur_id, $amphur_list, $province_id, $province_list;
  public $reqform_no, $panel = 1, $status;
  public $acttype_id = 1, $fiscalyear_code, $fiscalyear_list, $dept_id, $dept_list, $unit_list, $acttype_list, $buildingtype_list, $buildingtype_id;
  public $actname, $troubletype_id, $troubletype_list;
  public $patternarea_id, $actdetail, $actremark, $local_material, $people_benefit_qty;
  public $area_wide, $area_long, $area_high, $area_total;
  public $plan_startdate, $plan_enddate, $day_qty, $people_qty, $trainer_qty, $job_wage_rate, $other_rate, $job_wage_amt, $other_amt, $total_amt;
  public $created_at, $building_name, $building_lat, $building_long, $cmleader_desp;

  public $file_array = [], $files, $file_array_old;

  public function mount()
  {
    // $this->dept_list = DB::connection('oracle_umts')->table('um_mas_department')->get()->toarray();
    // dd(print_r($this->dept_list));
    $this->dept_list = UmMasDepartment::pluck('dept_name_th', 'dept_id');
    $this->fiscalyear_list = OoapTblFiscalyear::pluck('fiscalyear_code', 'fiscalyear_code as new');
    $this->acttype_list = OoapMasActtype::pluck('name', 'id');
    $this->troubletype_list = OoapMasTroubletype::pluck('name', 'id');
    $this->unit_list = OoapMasUnit::pluck('name', 'id');
    $this->province_list = OoapMasProvince::pluck('province_name', 'province_id');
    $this->buildingtype_list = OoapMasBuildingtype::pluck('name', 'buildingtype_id');
    $this->patternarea_list = OoapMasPatternarea::pluck('name', 'patternarea_id');

    $this->job_wage_rate = OoapMasActtype::select('job_wage_maxrate', 'other_maxrate')->limit(1)->first()->job_wage_maxrate ?? 0;

    $this->file_array_old = OoapTblReqformFiles::where('reqform_id', '=', $this->reqform_id)->where('in_active', '=', false)->get()->toArray() ?? [];

    $data = OoapTblReqform::where('reqform_id', '=', $this->reqform_id)->where('in_active', '=', false)->first();
    $this->reqform_no = $data->reqform_no;
    $this->created_at = $data->created_at;
    $this->fiscalyear_code = $data->fiscalyear_code;
    $this->dept_id = $data->dept_id;
    $this->actname = $data->actname;
    $this->actdetail = $data->actdetail;
    $this->troubletype_id = $data->troubletype_id;
    $this->people_benefit_qty = $data->people_benefit_qty;
    $this->buildingtype_id = $data->buildingtype_id;
    $this->building_name = $data->building_name;
    $this->building_lat = $data->building_lat;
    $this->building_long = $data->building_long;
    $this->patternarea_id = $data->patternarea_id;
    $this->unit_id = $data->unit_id;
    $this->area_wide = $data->area_wide;
    $this->area_long = $data->area_long;
    $this->area_high = $data->area_high;
    // $this->area_total = $data->area_total;
    $this->province_id = $data->province_id;
    $this->amphur_id = $data->amphur_id;
    $this->tambon_id = $data->tambon_id;
    $this->moo = $data->moo;
    $this->cmleader_desp = $data->cmleader_desp;

    $this->stdate = dateToMontYears($data->plan_startdate);
    $this->endate = dateToMontYears($data->plan_enddate);
    $this->day_qty = $data->day_qty;
    $this->plan_startdate = $data->plan_startdate;
    $this->plan_enddate = $data->plan_enddate;
    $this->people_qty = $data->people_qty;
    // $this->job_wage_rate = $data->job_wage_rate;
    $this->other_rate = $data->other_rate;
    $this->status = $data->status;

    // dd($data);
  }

  public function submit_prototype($sta)
  {
    OoapTblReqform::where('reqform_id', '=', $this->reqform_id)->update([
      'status' => $sta,
      'updated_at' => now(),
      'updated_by' => auth()->user()->emp_citizen_id,
    ]);
    // dd($this);
    $this->emit('popup');
  }

  protected $listeners = ['redirect-to' => 'redirect_to'];

  public function redirect_to()
  {
    return redirect()->to('/request/request3_3');
  }
  public function changPanel($num)
  {
    // dd($num);
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
    $this->$name = $val;
  }

  public function render()
  {
    $this->emit('emits');
    $this->area_total = $this->area_wide * $this->area_long ?? 0;
    $this->job_wage_amt = $this->job_wage_rate * $this->day_qty * $this->people_qty ?? 0;
    $this->other_amt = $this->other_rate;
    $this->total_amt = $this->other_amt + $this->job_wage_amt;

    $this->amphur_list = OoapMasAmphur::where('province_id', '=', $this->province_id)->pluck('amphur_name', 'amphur_id');
    $this->tambon_list = OoapMasTambon::where('amphur_id', '=', $this->amphur_id)->pluck('tambon_name', 'tambon_id');


    // $getId = OoapTblReqform::select('reqform_id')->where('fiscalyear_code', $this->fiscalyear_code)->orderBy('reqform_id', 'DESC')->count() ?? 1;
    // $this->reqform_no = "RF-".substr($this->fiscalyear_code, 2)."-".sprintf('%04d', $getId+1);

    return view('livewire.request.request31.edit-component');
  }
}
