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
use App\Models\UmMasDepartment;
use DateTime;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IndexComponent extends Component
{
  public $stdate, $endate, $date_list = [], $perioddays, $wages, $target_peoples;
  public $lat, $lng, $moo, $tambon_id, $tambon_list, $amphur_id, $amphur_list, $province_id, $province_list;
  public $reqform_no, $panel = 1, $status = 1;
  public $acttype_id = 1, $fiscalyear_code, $fiscalyear_list, $dept_id, $dept_list, $unit_id = 1, $unit_list, $acttype_list, $buildingtype_list, $buildingtype_id;
  public $actname, $troubletype_id, $troubletype_list;
  public $patternarea_id = 0, $actdetail, $actremark, $local_material, $people_benefit_qty;
  public $area_wide, $area_long, $area_high, $area_total;
  public $plan_startdate, $plan_enddate, $day_qty, $people_qty, $trainer_qty, $job_wage_rate, $other_rate, $job_wage_amt, $other_amt, $total_amt;
  public $created_at, $building_name, $building_lat, $building_long, $cmleader_desp;

  public function mount()
  {
    // $this->dept_list = DB::connection('oracle_umts')->table('um_mas_department')->pluck("dept_name_th", "dept_id");
    $this->dept_list = UmMasDepartment::pluck('dept_name_th', 'dept_id');
    $this->fiscalyear_list = OoapTblFiscalyear::pluck('fiscalyear_code', 'fiscalyear_code AS fiscalyear_code2');
    $this->acttype_list = OoapMasActtype::pluck('name', 'id');
    $this->troubletype_list = OoapMasTroubletype::pluck('name', 'id');
    $this->unit_list = OoapMasUnit::pluck('name', 'id');
    $this->province_list = OoapMasProvince::pluck('province_name', 'province_id');
    $this->created_at = date("Y-m-d");
    $this->buildingtype_list = OoapMasBuildingtype::pluck('name', 'buildingtype_id');
    $this->patternarea_list = OoapMasPatternarea::pluck('name', 'patternarea_id');

    // dd($this->fiscalyear_list);
  }

  public function submit_prototype()
  {
    // dd($this);
    $this->validate([
      'fiscalyear_code' => 'required',
    ], [
      'fiscalyear_code.required' => 'กรุณากรอก ปีงบประมาณ',
    ]);
    OoapTblReqform::insert([
      'reqform_no' => $this->reqform_no,
      'acttype_id' => $this->acttype_id,
      'fiscalyear_code' => $this->fiscalyear_code,
      'dept_id' => $this->dept_id,
      'actname' => $this->actname,
      'troubletype_id' => $this->troubletype_id,
      'actdetail' => $this->actdetail,
      // 'actremark' => $this->actremark,
      // 'local_material' => $this->local_material,
      'people_benefit_qty' => $this->people_benefit_qty,
      'patternarea_id' => $this->patternarea_id,
      'unit_id' => $this->unit_id,
      'area_wide' => $this->area_wide,
      'area_long' => $this->area_long,
      'area_high' => $this->area_high,
      'area_total' => $this->area_total,
      'plan_startdate' => $this->plan_startdate,
      'plan_enddate' => $this->plan_enddate,
      'day_qty' => $this->day_qty,
      'cmleader_desp' => $this->cmleader_desp,
      'buildingtype_id' => $this->buildingtype_id,
      'building_name' => $this->building_name,
      'moo' => $this->moo,
      'tambon_id' => $this->tambon_id,
      'amphur_id' => $this->amphur_id,
      'province_id' => $this->province_id,
      'building_lat' => $this->building_lat,
      'building_long' => $this->building_long,
      'people_qty' => $this->people_qty,
      'job_wage_rate' => $this->job_wage_rate,
      'job_wage_amt' => $this->job_wage_amt,
      'other_amt' => $this->other_amt,
      'total_amt' => $this->total_amt,
      'status' => 1,
      'created_at' => now(),
      'created_by' => auth()->user()->emp_citizen_id,
    ]);
    // dd($this);
    $this->emit('popup');
  }

  public function submit_toconfirm()
  {
    // dd($this);
    $this->validate([
      'fiscalyear_code' => 'required',
      'dept_id' => 'required',
      'actname' => 'required',
      'troubletype_id' => 'required',
      'people_benefit_qty' => 'required',
      'buildingtype_id' => 'required',
      'building_name' => 'required',
      'building_lat' => 'required',
      'building_long' => 'required',
      'patternarea_id' => 'required',
      // 'unit_id' => 'required',
      'area_wide' => 'required',
      'province_id' => 'required',
      'amphur_id' => 'required',
      'tambon_id' => 'required',
      'moo' => 'required',
      'cmleader_desp' => 'required',
      'stdate' => 'required',
      'endate' => 'required',
      'people_qty' => 'required',
      'job_wage_rate' => 'required',
    ], [
      'fiscalyear_code.required' => 'กรุณากรอก ปีงบประมาณ',
      'dept_id.required' => 'กรุณากรอก หน่วยงาน',
      'actname.required' => 'กรุณากรอก ชื่อกิจกรรม',
      'troubletype_id.required' => 'กรุณากรอก ประเภทความเดือดร้อน',
      'people_benefit_qty.required' => 'กรุณากรอก จำนวนประชาชนในพื้นที่ ที่ได้รับประโยชน์',
      'buildingtype_id.required' => 'กรุณากรอก ประเภทสถานที่',
      'building_name.required' => 'กรุณากรอก ชื่อสถานที่',
      'building_lat.required' => 'กรุณากรอก LAT',
      'building_long.required' => 'กรุณากรอก LONG',
      'patternarea_id.required' => 'กรุณากรอก รูปแบบการวัดพื้นที่',
      // 'unit_id.required' => 'กรุณากรอก หน่วยระยะทาง',
      'area_wide.required' => 'กรุณากรอก ความกว้าง',
      'province_id.required' => 'กรุณากรอก จังหวัด',
      'amphur_id.required' => 'กรุณากรอก อำเภอ',
      'tambon_id.required' => 'กรุณากรอก ตำบล',
      'moo.required' => 'กรุณากรอก หมู่ที่',
      'cmleader_desp.required' => 'กรุณากรอก ผู้นำชุมชน',
      'stdate.required' => 'กรุณากรอก วันที่เริ่ม',
      'endate.required' => 'กรุณากรอก ถึงวันที่',
      'people_qty.required' => 'กรุณากรอก จำนวน (คน)',
      'job_wage_rate.required' => 'กรุณากรอก อัตราค่าแรง ต่อคนต่อวัน',
    ]);
    OoapTblReqform::insert([
      'reqform_no' => $this->reqform_no,
      'acttype_id' => $this->acttype_id,
      'fiscalyear_code' => $this->fiscalyear_code,
      'dept_id' => $this->dept_id,
      'actname' => $this->actname,
      'troubletype_id' => $this->troubletype_id,
      'actdetail' => $this->actdetail,
      // 'actremark' => $this->actremark,
      // 'local_material' => $this->local_material,
      'people_benefit_qty' => $this->people_benefit_qty,
      'patternarea_id' => $this->patternarea_id,
      'unit_id' => $this->unit_id,
      'area_wide' => $this->area_wide,
      'area_long' => $this->area_long,
      'area_high' => $this->area_high,
      'area_total' => $this->area_total,
      'plan_startdate' => $this->plan_startdate,
      'plan_enddate' => $this->plan_enddate,
      'day_qty' => $this->day_qty,
      'cmleader_desp' => $this->cmleader_desp,
      'buildingtype_id' => $this->buildingtype_id,
      'building_name' => $this->building_name,
      'moo' => $this->moo,
      'tambon_id' => $this->tambon_id,
      'amphur_id' => $this->amphur_id,
      'province_id' => $this->province_id,
      'building_lat' => $this->building_lat,
      'building_long' => $this->building_long,
      'people_qty' => $this->people_qty,
      'job_wage_rate' => $this->job_wage_rate,
      'job_wage_amt' => $this->job_wage_amt,
      'other_amt' => $this->other_amt,
      'total_amt' => $this->total_amt,
      'status' => 2,
      'created_at' => now(),
      'created_by' => auth()->user()->emp_citizen_id,
    ]);
    // dd($this);
    $this->emit('popup');
  }

  protected $listeners = ['redirect-to' => 'redirect_to'];

  public function redirect_to()
  {
    return redirect()->to('/request/request2_3');
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


    $getId = OoapTblReqform::select('reqform_id')->where('fiscalyear_code', '=', $this->fiscalyear_code)->orderBy('reqform_id', 'DESC')->count() ?? 1;
    $this->reqform_no = "RF-" . substr($this->fiscalyear_code, 2) . "-" . sprintf('%04d', $getId + 1);

    return view('livewire.request.request31.index-component');
  }
}
