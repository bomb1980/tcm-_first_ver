<div>
    <div class="row">
        <div class="col-md-2 form-group">
            <div>
                <button type="button" class="btn btn-primary w-full form-group {{ $panel == 1 ? '' : 'btn-outline' }}"
                    wire:click="changPanel(1)">ข้อมูลใบคำขอ</button>
                <button type="button" class="btn btn-primary w-full form-group {{ $panel == 2 ? '' : 'btn-outline' }}"
                    wire:click="changPanel(2)">ข้อมูลกิจกรรม</button>
                <button type="button" class="btn btn-primary w-full form-group {{ $panel == 3 ? '' : 'btn-outline' }}"
                    wire:click="changPanel(3)">พื้นที่ดำเนินการ</button>
                <button type="button" class="btn btn-primary w-full form-group {{ $panel == 4 ? '' : 'btn-outline' }}"
                    wire:click="changPanel(4)">ค่าใช้จ่าย</button>
                <button type="button" class="btn btn-primary w-full form-group {{ $panel == 5 ? '' : 'btn-outline' }}"
                    wire:click="changPanel(5)">แนบไฟล์</button>
            </div>
            <br>
            <hr>
            <br>
            <div class="{{ $status == 1 ? '' : 'd-none' }}">
                <button type="button" class="w-full form-group btn btn-secondary"
                    onclick="submit_prototype(1)">บันทึกแบบร่าง</button>
                <button type="button" class="w-full form-group btn btn-success"
                    onclick="submit_prototype(2)">บันทึกส่งตรวจสอบ</button>
                <button type="button" class="w-full form-group btn btn-danger"
                    onclick="submit_prototype(9)">ยกเลิก</button>
            </div>
            <div class="{{ $status != 1 ? '' : 'd-none' }}">
                <button type="button" class="w-full form-group btn btn-default" disabled>
                    @if ($status == 2)
                        รอพิจารณา
                    @elseif ($status == 3)
                        ผ่าน
                    @elseif ($status == 4)
                        ไม่ผ่าน
                    @elseif ($status == 5)
                        เสนองบ
                    @elseif ($status == 9)
                        ยกเลิก
                    @endif
                </button>
            </div>
        </div>
        <div class="form-group col-md-10 panel">
            <div class="panel-body container-fluid">
                <div class="pearls row form-group">
                    <div class="pearl col-3 current {{ $status >= 1 ? 'active' : 'disabled' }}" aria-expanded="true">
                        <div class="pearl-icon"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
                        <span class="pearl-title">บันทึกคำขอ</span>
                    </div>
                    <div class="pearl col-2 current {{ $status >= 2 ? 'active' : 'disabled' }}" aria-expanded="false">
                        <div class="pearl-icon"><i class="icon wb-payment" aria-hidden="true"></i></div>
                        <span class="pearl-title">พิจารณาคำขอ</span>
                    </div>
                    {{-- <div class="pearl col-3 current {{ $status >= 3 ? 'active' : 'disabled' }}" aria-expanded="false">
                        <div class="pearl-icon"><i class="icon wb-check" aria-hidden="true"></i></div>
                        <span class="pearl-title">ผ่าน</span>
                    </div> --}}
                    <div class="pearl col-3 current {{ $status >= 3 ? 'active' : 'disabled' }}" aria-expanded="false">
                        <div class="pearl-icon">
                            @if ($status == 3)
                                <i class="icon wb-check" aria-hidden="true"></i>
                            @elseif($status == 4)
                                <i class="icon wb-close" aria-hidden="true"></i>
                            @else
                                <i class="icon wb-help" aria-hidden="true"></i>
                            @endif
                        </div>
                        <span class="pearl-title">
                            @if ($status == 3)
                                ผ่าน
                            @elseif($status == 4)
                                ไม่ผ่าน
                            @else
                                ผลพิจารณาคำขอ
                            @endif
                        </span>
                    </div>
                    <div class="pearl col-2 current {{ $status >= 5 ? 'active' : 'disabled' }}" aria-expanded="false">
                        <div class="pearl-icon"><i class="icon fa-send" aria-hidden="true"></i></div>
                        <span class="pearl-title">เสนองบ</span>
                    </div>
                </div>
                <br>

                <div class="{{ $panel == 1 ? '' : 'd-none' }}">
                    <div class="row form-group">
                        <div class="col-md-2">
                            <h4><b><u>ข้อมูลใบคำขอ</u></b></h4>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">ปีงบประมาณ</label>
                            {!! Form::select('fiscalyear_code', $fiscalyear_list, $fiscalyear_code, [
                                'onchange' => 'setValue("fiscalyear_code",event.target.value)',
                                'class' => 'form-control select2',
                                'placeholder' => '--เลือกปีงบประมาณ--',
                            ]) !!}
                            @error('fiscalyear_code')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">หน่วยงาน</label>
                            {!! Form::select('dept_id', $dept_list, $dept_id, [
                                'onchange' => 'setValue("dept_id",event.target.value)',
                                'class' => 'form-control select2',
                                'placeholder' => '--เลือกประเภทหน่วยงาน--',
                            ]) !!}
                            @error('dept_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">เลขที่ใบคำขอ</label>
                            <input type="text" class="form-control" wire:model="reqform_no" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="">วันที่ใบคำขอ</label>
                            <input type="text" class="form-control" value="{{ datetoview($created_at) }}" disabled>
                        </div>
                    </div>
                </div>

                <div class="{{ $panel == 2 ? '' : 'd-none' }}">
                    <div class="row form-group">
                        <div class="col-md-2">
                            <h4><b><u>ข้อมูลกิจกรรม</u></b></h4>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">ประเภทกิจกรรม</label>
                            {!! Form::select('acttye_id', $acttye_list, $acttye_id, [
                                'onchange' => 'setValue("acttye_id",event.target.value)',
                                'class' => 'form-control select2',
                                'disabled',
                            ]) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">กลุ่มหลักสูตร</label>
                            {!! Form::select('coursegroup_id', $coursegroup_list, $coursegroup_id, [
                                'wire:change' => 'changeCoursegroup($event.target.value)',
                                'class' => 'form-control',
                                'placeholder' => '--เลือกกลุ่มหลักสูตร--',
                            ]) !!}
                        </div>
                        @error('coursegroup_id')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">กลุ่มสาขาอาชีพ</label>
                            {!! Form::select('coursesubgroup_id', $coursesubgroup_list, $coursesubgroup_id, [
                                'wire:change' => 'changeCoursesubgroup($event.target.value)',
                                'class' => 'form-control',
                                'placeholder' => '--เลือกกลุ่มสาขาอาชีพ--',
                            ]) !!}
                        </div>
                        @error('coursesubgroup_id')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">หลักสูตร</label>
                            {!! Form::select('course_id', $course_list, $course_id, [
                                'wire:change' => 'changeCourse($event.target.value)',
                                'class' => 'form-control',
                                'placeholder' => '--เลือกหลักสูตร--',
                            ]) !!}
                        </div>
                        {{-- <div class="col-md-1">
                            <label for=""></label>
                            <div class="btn-group btn-group-sm">
                                {{ link_to(route('master.course.create'), ' เพิ่มหลักสูตรใหม่', [
                                    'class' => 'btn btn-primary btn-md mt-2 float-right icon wb-plus',
                                ]) }}
                            </div>
                        </div> --}}
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">ชื่อกิจกรรม</label>
                            <textarea rows="4" class="form-control" wire:model="actname"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">รายละเอียดกิจกรรม</label>
                            <textarea rows="6" class="form-control" wire:model="actdetail"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">หมายเหตุ</label>
                            <textarea rows="6" class="form-control" wire:model="actremark"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group mt-4">
                        <div class="col-md-2">
                            <h4><b><u>สถานที่จัดการอบรม</u></b></h4>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">ชื่อสถานที่</label>
                            <input type="text" class="form-control" placeholder="ชื่อสถานที่"
                                wire:model="building_name">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 form-group">
                            <label for="">พิกัดแผนที่ละติจูด</label>
                            <input type="text" class="form-control" placeholder="พิกัดแผนที่ละติจูด"
                                wire:model="building_lat">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">พิกัดแผนที่ลองติจูด</label>
                            <input type="text" class="form-control" placeholder="พิกัดแผนที่ลองติจูด"
                                wire:model="building_long">
                        </div>
                        <div class="col-md-1">
                            <label for="">&nbsp;</label>
                            <button type="button" class="btn btn-success" onclick="initGeolocation()">ตำแหน่งปัจจุบัน</button>
                        </div>
                    </div>
                    <div id="map" class="form-group" style="height: 400px;" wire:ignore></div>
                </div>

                <div class="{{ $panel == 3 ? '' : 'd-none' }}">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <h4><b><u>พื้นที่ดำเนินการโครงการ</u></b></h4>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 form-group">
                            <label for="">จังหวัด</label>
                            {!! Form::select('province_id', $province_list, $province_id, [
                                'onchange' => 'setValue("province_id",event.target.value)',
                                'class' => 'form-control select2',
                                'placeholder' => '--เลือกจังหวัด--',
                            ]) !!}
                            @error('province_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        {{-- </div>
                    <div class="row form-group"> --}}
                        <div class="col-md-3 form-group">
                            <label for="">อำเภอ</label>
                            {!! Form::select('amphur_id', $amphur_list, $amphur_id, [
                                'onchange' => 'setValue("amphur_id",event.target.value)',
                                'class' => 'form-control select2',
                                'placeholder' => '--เลือกอำเภอ--',
                            ]) !!}
                            @error('amphur_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">ตำบล</label>
                            {!! Form::select('tambon_id', $tambon_list, $tambon_id, [
                                'onchange' => 'setValue("tambon_id",event.target.value)',
                                'class' => 'form-control select2',
                                'placeholder' => '--เลือกตำบล--',
                            ]) !!}
                            @error('tambon_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">หมู่ที่</label>
                            <input type="text" class="form-control" placeholder="หมู่ที่" wire:model="moo">
                            @error('moo')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-5 form-group">
                            <label for="">ชื่อชุมชน</label>
                            <input type="text" class="form-control" placeholder="ชื่อชุมชน" wire:model="cmname">
                            @error('cmname')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">ชื่อผู้นำชุมชน</label>
                            <input type="text" class="form-control" placeholder="ข้อมูลผู้นำชุมชน"
                                wire:model="cmleader_name">
                            @error('cmleader_name')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">ตำแหน่งผู้นำชุมชน</label>
                            <input type="text" class="form-control" placeholder="ตำแหน่งผู้นำชุมชน"
                                wire:model="cmleader_position">
                            @error('cmleader_position')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-5">
                            <label for="">ข้อมูลผู้นำชุมชน</label>
                            <textarea rows="4" class="form-control" wire:model="cmleader_desp" placeholder="ข้อมูลผู้นำชุมชน"></textarea>
                            {{-- <input type="text" class="form-control" placeholder="ข้อมูลผู้นำชุมชน"
                                wire:model="cmleader_desp">
                                @error('cmleader_desp')
                                <label class="text-danger">{{ $message }}</label>
                                @enderror --}}
                        </div>
                    </div>
                </div>

                <div class="{{ $panel == 4 ? '' : 'd-none' }}">
                    <br>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <u><b>ค่าใช้จ่าย</b></u>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-1 form-control-label pl-4">เดือนที่เริ่ม</label>
                        <div class="input-group col-md-2">
                            <input type="text" class="form-control datepicker" wire:model="stdate"
                                data-date-language="th-th" onchange="setDatePicker('stdate', event.target.value)"
                                placeholder="วันที่เริ่ม">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <label class="col-md-1 form-control-label pl-4">เดือนที่สิ้นสุด</label>
                        <div class="input-group col-md-2">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" wire:model="endate"
                                    data-date-language="th-th" onchange="setDatePicker('endate', event.target.value)"
                                    placeholder="ถึงวันที่">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="icon wb-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1 form-control-label pl-4">จำนวนคน</label>
                        <div class="col-md-2">
                            {!! Form::number('people_qty', null, [
                                'wire:model' => 'people_qty',
                                'id' => 'people_qty',
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <label class="col-md-1 form-control-label pl-4">จำนวนวิทยากร</label>
                        <div class="col-md-2">
                            {!! Form::number('trainer_qty', null, [
                                'wire:model' => 'trainer_qty',
                                'id' => 'trainer_qty',
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <label class="col-md-1 form-control-label pl-4">จำนวนวัน</label>
                        <div class="col-md-2">
                            {!! Form::number('day_qty', null, ['wire:model' => 'day_qty', 'id' => 'day_qty', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-1 form-control-label pl-4">อัตราค่าอาหาร</label>
                        <div class="col-md-2">
                            {!! Form::number('course_lunch_rate', null, [
                                'wire:model' => 'course_lunch_rate',
                                'id' => 'course_lunch_rate',
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <label class="col-md-1 form-control-label pl-4">ค่าอาหาร</label>
                        <div class="col-md-2">
                            {!! Form::number('course_lunch_amt', null, [
                                'wire:model' => 'course_lunch_amt',
                                'id' => 'course_lunch_amt',
                                'class' => 'form-control',
                                'disabled',
                            ]) !!}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label pl-4">อัตราค่าตอบแทนวิทยากร(ต่อชั่วโมง)</label>
                        <div class="col-md-2">
                            {!! Form::number('course_trainer_rate', null, [
                                'wire:model' => 'course_trainer_rate',
                                'id' => 'course_trainer_rate',
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <label class="col-md-2 form-control-label pl-4">ค่าตอบแทนวิทยากร</label>
                        <div class="col-md-2">
                            {!! Form::number('course_trainer_amt', null, [
                                'wire:model' => 'course_trainer_amt',
                                'id' => 'course_trainer_amt',
                                'class' => 'form-control',
                                'disabled',
                            ]) !!}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-1 form-control-label pl-4">อัตราค่าวัสดุ</label>
                        <div class="col-md-2">
                            {!! Form::number('course_material_rate', null, [
                                'wire:model' => 'course_material_rate',
                                'id' => 'course_material_rate',
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <label class="col-md-1 form-control-label pl-4">ค่าวัสดุ</label>
                        <div class="col-md-2">
                            {!! Form::number('course_material_amt', null, [
                                'wire:model' => 'course_material_amt',
                                'id' => 'course_material_amt',
                                'class' => 'form-control',
                                'disabled',
                            ]) !!}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-1 form-control-label pl-4">ค่าใช้จ่ายอื่นๆ</label>
                        <div class="col-md-2">
                            {!! Form::number('other_amt', null, [
                                'wire:model' => 'other_amt',
                                'id' => 'other_amt',
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row pt-4 pb-1 bg-info">
                        <div class="col-md-9">
                        </div>
                        <label class="col-md-1 form-control-label text-left">
                            <h4><b>ค่าใช้จ่ายรวม</b></h4>
                        </label>
                        <div class="col-md-2">
                            {!! Form::number('total_amt', null, [
                                'wire:model' => 'total_amt',
                                'id' => 'total_amt',
                                'class' => 'form-control',
                                'disabled',
                            ]) !!}
                        </div>
                    </div>
                </div>

                <div class="{{ $panel == 5 ? '' : 'd-none' }}">
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label><b><u>แนบไฟล์</u></b></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="input-group col-md-5 input-group-file" data-plugin="inputGroupFile">
                            <input type="text" class="form-control" readonly="">
                            <!-- <div class="input-group-append"> -->
                            <button class="btn bg-blue-grey-300 btn-file">
                                <i class="icon wb-file" aria-hidden="true"></i>
                                เลือกไฟล์
                                <input type="file" wire:model="files"
                                    accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                            </button>
                            <!-- </div> -->
                            <br>
                            @error('files')
                                <small class="text-danger col-md-12">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success offset-md-1" wire:click="submit_file_array"
                                {{ $files == null ? 'disabled' : '' }}>
                                <i class="icon wb-upload" aria-hidden="true"></i> อัพโหลดไฟล์
                            </button>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-9">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อไฟล์</th>
                                        <th>ประเภทไฟล์</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($file_array_old as $key => $val)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td class="text-left"><a
                                                    href="{{ url('/storage' . $val['files_path'] . '/' . $val['files_gen']) }}"
                                                    title="คลิกเพื่อดาวน์โหลด" download>{{ $val['files_ori'] }}</a>
                                            </td>
                                            <td>{!! showMimeIcon($val['files_type']) !!}</td>
                                            <td><button type="button" class="btn btn-danger"
                                                    onclick="destroy_old_array({{ $key }})"><i
                                                        class="icon wb-trash"></i></button></td>
                                        </tr>
                                    @endforeach
                                    @foreach ($file_array as $key => $val)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td class="text-left">{{ $val->getClientOriginalName() }}</td>
                                            <td>{!! showMimeIcon($val->getMimeType()) !!}</td>
                                            <td><button type="button" class="btn btn-danger"
                                                    onclick="destroy_array({{ $key }})"><i
                                                        class="icon wb-trash"></i></button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script>
        document.addEventListener('livewire:load', function() {
            $('.select2').select2();
            initMap();
            Livewire.on('emits', () => {
                $('.select2').select2();
            });
        });

        var markers = [];

        function initGeolocation() {
            if (navigator.geolocation) {
                // Call getCurrentPosition with success and failure callbacks
                navigator.geolocation.getCurrentPosition(success, fail);
            } else {
                alert("Sorry, your browser does not support geolocation services.");
            }
        }

        function success(position) {
            // @this.set('app_address_latitude', position.coords.latitude);
            // @this.set('app_address_longitude', position.coords.longitude);

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            const arr = {
                "lat": position.coords.latitude,
                "lng": position.coords.longitude
            };
            placeMarkerAndPanTo(arr, map);
            map.addListener("click", (e) => {
                placeMarkerAndPanTo(e.latLng, map);
                // alert(e.latLng);
            });
        }

        function fail() {
            alert("Sorry, your browser does not support geolocation services.");
        }

        function initMap() {
            if ('{{ $building_lat }}' || '{{ $building_long }}') {
                var lat = '{{ $building_lat }}';
                var lng = '{{ $building_long }}';
                var zoomView = 15;
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: zoomView,
                    center: new google.maps.LatLng(lat, lng),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                new google.maps.Marker({
                    position: new google.maps.LatLng(lat, lng),
                    map: map,
                    // title: 'ถนน ลาดปลาเค้า'
                });
                map.addListener("click", (e) => {
                    placeMarkerAndPanTo(e.latLng, map);
                    // alert(e.latLng);
                });
            } else {
                var lat = '13.8';
                var lng = '100.5';
                var zoomView = 5;
                const markers = map = new google.maps.Map(document.getElementById("map"), {
                    zoom: zoomView,
                    center: new google.maps.LatLng(lat, lng),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                map.addListener("click", (e) => {
                    placeMarkerAndPanTo(e.latLng, map);
                    // alert(e.latLng);
                });
            }
        }

        function placeMarkerAndPanTo(latLng, map) {
            deleteMarkers();
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                title: 'latLng ' + latLng
            });
            markers.push(marker);
            @this.latLng(latLng);
            // map.panTo(latLng);
        }

        function clearMarkers() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
        }

        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }

        function setDatePicker(name, val) {
            @this.set(name, val);
            @this.setArray();
            // if(name == 'stdate' || name = "endate"){
            //     @this.setArray();
            // }
        }

        function setValue(name, val) {
            @this.set(name, val);
        }

        $(".datepicker").datepicker({
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months"
        });

        Livewire.on('popup', () => {
            swal({
                    title: "บันทึกข้อมูลเรียบร้อย",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                },
                function(isConfirm) {
                    if (isConfirm) {
                        window.livewire.emit('redirect-to');
                    }
                });
        });

        function button_function() {
            swal({
                title: 'ยืนยันการ ยกเลิกโครงการ ?',
                icon: 'close',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#00BCD4',
                cancelButtonColor: '#DD6B55'
            }, function(isConfirm) {
                if (isConfirm) {
                    @this.redirect_to();
                }
            });
        }

        function submit_prototype(number) {
            if (number == 1) {
                var title = "ยืนยันการ บันทึกแบบร่างโครงการ ?";
            } else if (number == 2) {
                var title = "ยืนยันการ บันทึกส่งตรวจสอบโครงการ ?";
            } else if (number == 9) {
                var title = "ยืนยันการ ยกเลิกโครงการ ?";
            }
            swal({
                title: title,
                icon: 'close',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#00BCD4',
                cancelButtonColor: '#DD6B55'
            }, function(isConfirm) {
                if (isConfirm) {
                    @this.submit_prototype(number);
                }
            });
        }

        function destroy_array(key) {
            swal({
                title: 'ยืนยันการ  ลบไฟล์ ?',
                icon: 'close',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#00BCD4',
                cancelButtonColor: '#DD6B55'
            }, function(isConfirm) {
                if (isConfirm) {
                    @this.destroy_array(key);
                }
            });
        }

        function destroy_old_array(key) {
            swal({
                title: 'ยืนยันการ  ลบไฟล์ ?',
                icon: 'close',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#00BCD4',
                cancelButtonColor: '#DD6B55'
            }, function(isConfirm) {
                if (isConfirm) {
                    @this.destroy_old_array(key);
                }
            });
        }
    </script>
@endpush
