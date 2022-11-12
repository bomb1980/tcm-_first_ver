<?php

namespace App\Http\Livewire\Master\Course;

use App\Models\OoapMasCoursesubgroup;
use App\Models\OoapMasCoursegroup;
use App\Models\OoapMasCoursetype;
use App\Models\OoapMasCourse;
use App\Models\OoapMasCoursefiles;
use App\Models\OoapMasCourseOwnertype;
use App\Models\OoapMasActtype;
use App\Models\UmMasDepartment;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class CourseEditComponent extends Component
{
  use WithFileUploads;
  public $course_id;
  public $dept_list, $dept_id;
  public $ownertype_list, $ownertype_id;
  public $acttype_list, $acttype_id;
  public $coursetype_list, $coursetype_id;
  public $coursegroup_list, $coursegroup_id;
  public $coursesubgroup_list, $coursesubgroup_id;
  public $code, $name, $shortname, $descp, $ownerdescp, $hour_descp, $day_descp, $people_descp, $trainer_descp, $status, $in_active, $remember_token, $created_by, $created_at;
  public $file_array = [], $files, $file_array_old;
  public $duplicate = 0; // section select plan
  public $fileuploadpreviewing = [], $course_files = [], $edit_files = [], $delete_files = [], $file_key = 1; // section upload files
  public $support = []; // section support budget
  public $data_flow;

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

  public function mount()
  {
    // $this->dept_list = DB::connection('oracle_umts')->table('um_mas_department')->pluck('dept_name_th', 'dept_id');
    $this->dept_list = UmMasDepartment::pluck('dept_name_th', 'dept_id');

    $this->ownertype_id = OoapMasCourseOwnertype::where('in_active', '=', false)->orderby('id', 'asc')->first()->id;
    $this->ownertype_list = OoapMasCourseOwnertype::where('in_active', '=', false)->pluck('name', 'id');

    $this->acttype_id = OoapMasActtype::where('inactive', '=', 0)->orderby('id', 'asc')->first()->id;
    $this->acttype_list = OoapMasActtype::where('inactive', '=', 0)->pluck('name', 'id');

    $this->coursegroup_id = OoapMasCoursegroup::where('in_active', '=', false)->orderby('id', 'asc')->first()->id;
    $this->coursegroup_list = OoapMasCoursegroup::where('in_active', '=', false)->pluck('name', 'id');

    // $this->coursesubgroup_id = OoapMasCoursesubgroup::where('in_active', false)->orderby('id','asc')->first()->id;
    // $this->coursesubgroup_list = OoapMasCoursesubgroup::where('in_active', false)->pluck('name', 'id');

    // $this->coursetype_id = OoapMasCoursetype::where('in_active', false)->orderby('id','asc')->first()->id;
    // $this->coursetype_list = OoapMasCoursetype::where('in_active', false)->pluck('name', 'id');

    $this->file_array_old = OoapMasCoursefiles::where('course_id', '=', $this->course_id)->where('in_active', '=', false)->get()->toArray() ?? [];

    $data = OoapMasCourse::where('id', '=', $this->course_id)->where('in_active', '=', false)->first();
    $this->course_id = $data->id;
    // $this->code = $data->code;
    $this->name = $data->name;
    $this->shortname = $data->shortname;
    $this->descp = $data->descp;
    $this->dept_id = $data->dept_id;
    $this->ownertype_id = $data->ownertype_id;
    $this->ownerdescp = $data->ownerdescp;
    $this->acttype_id = $data->acttype_id;
    $this->coursegroup_id = $data->coursegroup_id;
    $this->coursesubgroup_id = $data->coursesubgroup_id;
    $this->coursetype_id = $data->coursetype_id;
    $this->hour_descp = $data->hour_descp;
    $this->day_descp = $data->day_descp;
    $this->people_descp = $data->people_descp;
    $this->trainer_descp = $data->trainer_descp;
  }

  public function submit()
  {
    $this->validate([
      'code' => 'required|max:20',
      'name' => 'required',
      'shortname' => 'required',
      'descp' => 'required',
      'dept_id' => 'required',
      'ownertype_id' => 'required',
      'ownerdescp' => 'required',
      'acttype_id' => 'required',
      'coursegroup_id' => 'required',
      'hour_descp' => 'required',
      'day_descp' => 'required',
      'people_descp' => 'required',
      'trainer_descp' => 'required'
    ], [
      'code.required' => 'กรุณาใส่รหัสกลุ่มหลักสูตร',
      'code.max' => 'รหัสหลักสูตรอบรมไม่เกิน 20 ตัวอักษร',
      'name.required' => 'กรุณากรอกชื่อกลุ่มหลักสูตร',
      'shortname.required' => 'กรุณากรอกชื่อย่อ',
      'descp.required' => 'กรุณากรอกรายละเอียด',
      'dept_id.required' => 'กรุณาเลือกหน่วยงานเจ้าของหลักสูตร',
      'ownertype_id.required' => 'กรุณาเลือกแหล่งที่มาของหลักสูตร',
      'ownerdescp.required' => 'กรุณากรอกรายละเอียดแหล่งที่มาหลักสูตร',
      'acttype_id.required' => 'กรุณาเลือกประเภทกิจกรรม',
      'hour_descp.required' => 'กรุณากรอกระยะเวลาการฝึก',
      'coursegroup_id.required' => 'กรุณาเลือกกลุ่มหลักสูตร',
      'day_descp.required' => 'กรุณากรอกจำนวนวันที่ดำเนินการ',
      'people_descp.required' => 'กรุณากรอกจำนวนกลุ่มเป้าหมาย',
      'trainer_descp.required' => 'กรุณากรอจำนวนวิทยากร',
    ]);
    OoapMasCourse::where('id', '=', $this->course_id)->update([
      'code' => $this->code,
      'name' => $this->name,
      'shortname' => $this->shortname,
      'descp' => $this->descp,
      'dept_id' => $this->dept_id,
      'ownertype_id' => $this->ownertype_id,
      'ownerdescp' => $this->ownerdescp,
      'acttype_id' => $this->acttype_id,
      'coursegroup_id' => $this->coursegroup_id,
      'coursesubgroup_id' => $this->coursesubgroup_id,
      'coursetype_id' => $this->coursetype_id,
      'hour_descp' => $this->hour_descp,
      'day_descp' => $this->day_descp,
      'people_descp' => $this->people_descp,
      'trainer_descp' => $this->trainer_descp,
      'updated_by' => auth()->user()->emp_citizen_id
    ]);

    $array_left = array_column($this->file_array_old, 'files_id') ?? []; // ที่เหลือจากลบแล้ว

    OoapMasCoursefiles::where('course_id', '=', $this->course_id)->whereNotIn('files_id', $array_left)->update([ // ลบไฟล์ที่ไม่มีออก
      'in_active' => 1,
      'deleted_by' => auth()->user()->name,
      'deleted_at' => now()
    ]);

    if (!empty($this->file_array)) {
      $path_file = '/course';
      foreach ($this->file_array as $file) {
        $file->store('/public' . $path_file);
        OoapMasCoursefiles::create([
          'files_ori' => $file->getClientOriginalName(),
          'files_gen' => $file->hashName(),
          'files_path' => $path_file,
          'files_type' => $file->getMimeType(),
          'files_size' => $file->getSize(),
          'course_id' => $this->course_id,
          'remember_token' => csrf_token(),
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
    return redirect()->to('/master/course');
  }

  public function thisReset()
  {
    return redirect()->to('/master/course');
  }

  // public function changeDept($value)
  // {
  //     $this->dept_id = $value;
  // }

  // public function changeOwnertype($value)
  // {
  //     $this->ownertype_id = $value;
  // }

  // public function changeActtype($value)
  // {
  //     $this->acttype_id = $value;
  // }

  // public function changeCoursegroup($value)
  // {
  //     $this->coursegroup_id = $value;
  // }

  // public function changeCoursesubgroup($value)
  // {
  //     $this->coursesubgroup_id = $value;
  // }

  public function render()
  {
    $this->emit('emits');
    $this->coursesubgroup_list = OoapMasCoursesubgroup::where([['in_active', '=', false], ['coursegroup_id', '=', $this->coursegroup_id]])->pluck('name', 'id');
    $this->coursetype_list = OoapMasCoursetype::where([['in_active', '=', false], ['coursesubgroup_id', '=', $this->coursesubgroup_id]])->pluck('name', 'id');
    $cgCd = OoapMasCoursegroup::where([['id', '=', $this->coursegroup_id]])->pluck('code')->first() ?? null;
    $csgCd = OoapMasCoursesubgroup::where([['id', '=', $this->coursesubgroup_id]])->pluck('code')->first() ?? null;
    $ctCd = OoapMasCoursetype::where([['id', '=', $this->coursetype_id]])->pluck('code')->first() ?? null;
    $runNo = substr(OoapMasCourse::where([['id', '=', $this->course_id]])->pluck('code')->first(), -6);
    // $subfixCd = OoapMasCourse::where([['id','=',$this->course_id]])->pluck('code')->first();
    // $subfixCd =substr($subfixCd,-6);
    // $subfixCd =substr($subfixCd,(strlen($subfixCd)-6),6);
    $this->code = (($cgCd) ? (($csgCd) ? (($ctCd) ? ($cgCd . "-" . $csgCd . "-" . $ctCd . "-" . $runNo) : ($cgCd . "-" . $csgCd . "-000-" . $runNo)) : ($cgCd . "-00-000-" . $runNo)) : null);
    return view('livewire.master.course.course-edit-component');
  }

  public function upload_file()
  {
    $duplicate = check_duplicate_files($this->fileuploadpreviewing, $this->course_files, $this->edit_files);

    if ($duplicate) {
      $this->emit('duplicate_file');
      return;
    }

    foreach ($this->fileuploadpreviewing as $file_upload) {
      array_push($this->course_files, $file_upload);
    }
  }

  public function destroyArr($key)
  {
    unset($this->course_files[$key]);
    $this->course_files = array_values($this->course_files);
    $this->resetValidation('course_files.*');
    $this->resetErrorBag('course_files.*');
  }

  public function delete_edit_file($file_id, $key)
  {
    array_push($this->delete_files, $file_id);
    unset($this->edit_files[$key]);
    $this->edit_files = array_values($this->edit_files);
  }
}
