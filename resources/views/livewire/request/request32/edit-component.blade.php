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
            {{-- <button type="button" class="form-control form-group btn btn-primary"
                wire:click="submit_prototype(1)">บันทึกแบบร่าง</button>
            <button type="button" class="form-control form-group btn btn-success"
                wire:click="submit_prototype(2)">บันทึกส่งตรวจสอบ</button>
            <button type="button" class="form-control form-group btn btn-danger"
                wire:click="submit_prototype(9)">ลบโครงการ</button> --}}
            <div class="{{ $status == 2 ? '' : 'd-none' }}">
                <button type="button" class="form-control form-group btn btn-warning"
                    onclick="submit_prototype(1)">ส่งกลับ</button>
                <button type="button" class="form-control form-group btn btn-success"
                    onclick="submit_prototype(3)">ผ่าน</button>
                <button type="button" class="form-control form-group btn btn-danger"
                    onclick="submit_prototype(4)">ไม่ผ่าน</button>
            </div>
            <div class="{{ $status == 3 || $status == 4 ? '' : 'd-none' }}">
                <button type="button" class="form-control form-group btn btn-warning"
                    onclick="submit_prototype(2)">ส่งกลับพิจารณา</button>
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
                                'disabled',
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
                                'disabled',
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
                                'disabled',
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
                                'placeholder' => '--เลือกกลุ่มหลักสูตร--',
                                'disabled',
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
                                'disabled',
                            ]) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">ชื่อกิจกรรม</label>
                            <textarea rows="4" class="form-control" wire:model="actname" disabled></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">รายละเอียดกิจกรรม</label>
                            <textarea rows="6" class="form-control" wire:model="actdetail" disabled></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">หมายเหตุ</label>
                            <textarea rows="6" class="form-control" wire:model="actremark" disabled></textarea>
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
                            <input type="text" class="form-control" placeholder="ชื่อสถานที่" disabled
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
                    </div>
                    <div class="form-group">
                        <iframe width="100%" height="450"
                            src="https://maps.google.com/maps?q={{ $building_lat }}, {{ $building_long }}&hl=es;z=14&amp;output=embed"></iframe>
                    </div>
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
                                'disabled',
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
                                'disabled',
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
                                'disabled',
                            ]) !!}
                            @error('tambon_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">หมู่ที่</label>
                            <input type="text" class="form-control" placeholder="หมู่ที่" wire:model="moo"
                                disabled>
                            @error('moo')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-5 form-group">
                            <label for="">ชื่อชุมชน</label>
                            <input type="text" class="form-control" placeholder="ชื่อชุมชน" wire:model="cmname"
                                disabled>
                            @error('cmname')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">ชื่อผู้นำชุมชน</label>
                            <input type="text" class="form-control" placeholder="ข้อมูลผู้นำชุมชน" disabled
                                wire:model="cmleader_name">
                            @error('cmleader_name')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">ตำแหน่งผู้นำชุมชน</label>
                            <input type="text" class="form-control" placeholder="ตำแหน่งผู้นำชุมชน" disabled
                                wire:model="cmleader_position">
                            @error('cmleader_position')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-5">
                            <label for="">ข้อมูลผู้นำชุมชน</label>
                            <textarea rows="4" class="form-control" wire:model="cmleader_desp" placeholder="ข้อมูลผู้นำชุมชน" disabled></textarea>
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
                        <label class="col-md-1 form-control-label pl-4">วันที่เริ่ม</label>
                        <div class="input-group col-md-2">
                            <div class="input-group">
                                <input type="text" class="form-control" data-provide="datepicker" disabled
                                    wire:model="stdate" data-date-language="th-th"
                                    onchange="setDatePicker('stdate', event.target.value)" placeholder="วันที่เริ่ม">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="icon wb-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-md-1 form-control-label pl-4">ถึงวันที่</label>
                        <div class="input-group col-md-2">
                            <div class="input-group">
                                <input type="text" class="form-control" data-provide="datepicker" disabled
                                    wire:model="endate" data-date-language="th-th"
                                    onchange="setDatePicker('endate', event.target.value)" placeholder="ถึงวันที่">
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
                        <div class="col-md-1">
                            {!! Form::number('people_qty', null, [
                                'wire:model' => 'people_qty',
                                'id' => 'people_qty',
                                'class' => 'form-control',
                                'disabled',
                            ]) !!}
                        </div>
                        <label class="col-md-1 form-control-label pl-4">จำนวนวิทยากร</label>
                        <div class="col-md-1">
                            {!! Form::number('trainer_qty', null, [
                                'wire:model' => 'trainer_qty',
                                'id' => 'trainer_qty',
                                'class' => 'form-control',
                                'disabled',
                            ]) !!}
                        </div>
                        <label class="col-md-1 form-control-label pl-4">จำนวนวัน</label>
                        <div class="col-md-1">
                            {!! Form::number('day_qty', null, [
                                'wire:model' => 'day_qty',
                                'id' => 'day_qty',
                                'class' => 'form-control',
                                'disabled',
                            ]) !!}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-1 form-control-label pl-4">อัตราค่าอาหาร</label>
                        <div class="col-md-1">
                            {!! Form::number('course_lunch_rate', null, [
                                'wire:model' => 'course_lunch_rate',
                                'id' => 'course_lunch_rate',
                                'class' => 'form-control',
                                'disabled',
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
                        <label class="col-md-2 form-control-label pl-4">อัตราค่าแรงวิทยากร(ต่อชั่วโมง)</label>
                        <div class="col-md-2">
                            {!! Form::number('course_trainer_rate', null, [
                                'wire:model' => 'course_trainer_rate',
                                'id' => 'course_trainer_rate',
                                'class' => 'form-control',
                                'disabled',
                            ]) !!}
                        </div>
                        <label class="col-md-1 form-control-label pl-4">ค่าแรงวิทยากร</label>
                        <div class="col-md-1">
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
                                'disabled',
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
                                'disabled',
                            ]) !!}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row pt-4 pb-1 bg-info">
                        <div class="col-md-9">
                        </div>
                        <label class="col-md-1 form-control-label text-right">
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
                                <input type="file" wire:model="files" disabled
                                    accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                            </button>
                            <!-- </div> -->
                            <br>
                            @error('files')
                                <small class="text-danger col-md-12">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary" wire:click="submit_file_array"
                                {{ $files == null ? 'disabled' : '' }}>บันทึกไฟล์</button>
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
                                                    onclick="destroy_old_array({{ $key }})" disabled><i
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
    <script>

        document.addEventListener('livewire:load', function() {
            $('.select2').select2();
            Livewire.on('emits', () => {
                $('.select2').select2();
            });
        });

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

        function submit_prototype(num) {
            if (num == 1) {
                var title = 'ยืนยันการ ส่งกลับบันทึกแบบร่างโครงการ ?';
            } else if (num == 2) {
                var title = 'ยืนยันการ บันทึกส่งตรวจสอบโครงการ ?';
            } else if (num == 3) {
                var title = 'ยืนยัน คำขอโครงการผ่าน ?';
            } else if (num == 4) {
                var title = 'ยืนยัน คำขอโครงการไม่ผ่าน ?';
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
                    @this.submit_prototype(num);
                }
            });
        }
    </script>
@endpush
