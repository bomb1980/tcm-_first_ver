<div>
    <div class="row">
        <div class="col-md-2 form-group">
            <div>
                <button type="button" class="btn btn-primary form-control form-group" {{ $panel == 1 ? 'disabled' : '' }}
                    wire:click="changPanel(1)">ข้อมูลใบคำขอ</button>
                <button type="button" class="btn btn-primary form-control form-group" {{ $panel == 2 ? 'disabled' : '' }}
                    wire:click="changPanel(2)">ข้อมูลกิจกรรม</button>
                <button type="button" class="btn btn-primary form-control form-group" {{ $panel == 3 ? 'disabled' : '' }}
                    wire:click="changPanel(3)">พื้นที่ดำเนินการ</button>
                <button type="button" class="btn btn-primary form-control form-group"
                    {{ $panel == 4 ? 'disabled' : '' }} wire:click="changPanel(4)">ค่าใช้จ่าย</button>
            </div>
            <br>
            <hr>
            <br>
            <div class="{{ $status == 1 ? '' : 'd-none' }}">
                <button type="button" class="form-control form-group btn btn-primary"
                    onclick="submit_prototype()">บันทึกแบบร่าง</button>
                <button type="button" class="form-control form-group btn btn-success"
                    onclick="submit_toconfirm()">บันทึกส่งตรวจสอบ</button>
                <button type="button" class="form-control form-group btn btn-danger"
                    onclick="button_function()">ยกเลิก</button>
            </div>
            <div class="{{ $status != 1 ? '' : 'd-none' }}">
                <button type="button" class="form-control form-group btn btn-default" disabled>
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

                <div class="{{ $panel == 1 ? '' : 'd-none' }}">
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label><b><u>ข้อมูลใบคำขอ</u></b></label>
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
                            <label><b><u>ข้อมูลกิจกรรม</u></b></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">ประเภทกิจกรรม</label>
                            {!! Form::select('acttype_id', $acttype_list, $acttype_id, [
                                'onchange' => 'setValue("acttype_id",event.target.value)',
                                'class' => 'form-control select2',
                                'disabled',
                            ]) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">ชื่อกิจกรรม</label>
                            <input type="text" class="form-control" placeholder="ชื่อกิจกรรม" wire:model="actname">
                            @error('actname')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">หมายเหตุ</label>
                            <textarea rows="4" class="form-control" placeholder="หมายเหตุ" wire:model="actremark"></textarea>
                        </div>
                    </div> --}}
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">รายละเอียดกิจกรรม</label>
                            <textarea rows="4" class="form-control" placeholder="วัตถุประสงค์/เป้าหมาย" wire:model="actdetail"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">หมายเหตุ</label>
                            <textarea rows="4" class="form-control" placeholder="หมายเหตุ" wire:model="actremark"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">ประเภทความเดือดร้อน</label>
                            {!! Form::select('troubletype_id', $troubletype_list, $troubletype_id, [
                                'onchange' => 'setValue("troubletype_id",event.target.value)',
                                'class' => 'form-control select2',
                                'placeholder' => '--เลือกประเภทความเดือดร้อน--',
                            ]) !!}
                            @error('troubletype_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-12">จำนวนประชาชนในพื้นที่ ที่ได้รับประโยชน์</label>
                        <div class="col-md-2 form-group">
                            <input type="number" class="form-control text-right" placeholder="ตัวเลขจำนวน"
                                wire:model="people_benefit_qty">
                        </div>
                        @error('people_benefit_qty')
                            <label class="col-md-12 text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label><b><u>สถานที่ดำเนินการ</u></b></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">ประเภทสถานที่</label>
                            {!! Form::select('buildingtype_id', $buildingtype_list, $buildingtype_id, [
                                'onchange' => 'setValue("buildingtype_id",event.target.value)',
                                'class' => 'form-control select2',
                                'placeholder' => '--เลือกประเภทสถานที่--',
                            ]) !!}
                            @error('buildingtype_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="">ชื่อสถานที่</label>
                            <input type="text" class="form-control" placeholder="ชื่อสถานที่"
                                wire:model="building_name">
                            @error('building_name')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 form-group">
                            <label for="">พิกัดแผนที่ ละติจูด</label>
                            <input type="text" class="form-control" placeholder="พิกัดแผนที่ ละติจูด"
                                wire:model="building_lat">
                            @error('building_lat')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">พิกัดแผนที่ ลองติจูด</label>
                            <input type="text" class="form-control" placeholder="พิกัดแผนที่ ลองติจูด"
                                wire:model="building_long">
                            @error('building_long')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-1">
                            <label for="">&nbsp;</label>
                            <button type="button" class="btn btn-success" onclick="initGeolocation()">ตำแหน่งปัจจุบัน</button>
                        </div>
                    </div>
                    <div id="map" class="form-group" style="height: 400px;" wire:ignore></div>
                    <hr>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label><b><u>ขนาดพื้นที่ดำเนินการ</u></b></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">รูปแบบการวัดพื้นที่</label>
                            {!! Form::select('patternarea_id', $patternarea_list, $patternarea_id, [
                                'onchange' => 'setValue("patternarea_id",event.target.value)',
                                'class' => 'form-control select2',
                                'placeholder' => '--เลือกรูปแบบการวัดพื้นที่--',
                            ]) !!}
                            @error('patternarea_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="radio-custom radio-primary">
                        {!! Form::radio('patternarea_id', '1', false, [
                            'wire:model' => 'patternarea_id',
                            'class' => 'form-control form-control-success',
                        ]) !!}
                        {!! Form::label('patternarea_id', 'ไม่ระบุ') !!}
                    </div>
                    <div class="radio-custom radio-primary">
                        {!! Form::radio('patternarea_id', '2', false, [
                            'wire:model' => 'patternarea_id',
                            'class' => 'form-control form-control-success',
                        ]) !!}
                        {!! Form::label('patternarea_id', 'ปริมาณสำหรับฝายชะลอน้ำ') !!}
                    </div>
                    <div class="radio-custom radio-primary">
                        {!! Form::radio('patternarea_id', '3', false, [
                            'wire:model' => 'patternarea_id',
                            'class' => 'form-control form-control-success',
                        ]) !!}
                        {!! Form::label('patternarea_id', 'ระยะทาง สำหรับแนวกันไฟป่า') !!}
                    </div> --}}
                    <div class="row form-group {{ $patternarea_id != 2 ? 'd-none' : '' }}">
                        <div class="col-md-2">
                            <label for="">หน่วยระยะทาง</label>
                            {!! Form::select('unit_id', $unit_list, $unit_id, [
                                'onclick' => 'setValue("unit_id",event.target.value)',
                                'class' => 'form-control select2',
                                'placeholder' => '--หน่วยระยะทาง--',
                            ]) !!}
                            @error('unit_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="">กว้าง</label>
                            <input type="number" class="form-control text-right" placeholder="กว้าง"
                                wire:model="area_wide">
                            @error('area_wide')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="">ยาว</label>
                            <input type="number" class="form-control text-right" placeholder="ยาว"
                                wire:model="area_long">
                            @error('area_long')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="">สูง</label>
                            <input type="number" class="form-control text-right" placeholder="สูง"
                                wire:model="area_high">
                        </div>
                        <div class="col-md-3">
                            <label for="">ปริมาณพื้นที่ (ตารางเมตร/ตารางกิโลเมตร)</label>
                            <input type="number" class="form-control text-right"
                                placeholder="ปริมาณพื้นที่ (ตารางเมตร/ตารางกิโลเมตร)" disabled
                                wire:model="area_total">
                            {{-- @error('area_total')
                                <label class="text-danger">{{ $message }}</label>
                                @enderror --}}
                        </div>
                    </div>
                    <div class="row form-group {{ $patternarea_id != 3 ? 'd-none' : '' }}">
                        <div class="col-md-2">
                            <label for="">หน่วยระยะทาง</label>
                            {!! Form::select('unit_id', $unit_list, $unit_id, [
                                'onclick' => 'setValue("unit_id",event.target.value)',
                                'class' => 'form-control select2',
                                'placeholder' => '--หน่วยระยะทาง--',
                            ]) !!}
                            @error('unit_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="">กว้าง</label>
                            <input type="number" class="form-control text-right" placeholder="กว้าง"
                                wire:model="area_wide">
                            @error('area_wide')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="">ยาว</label>
                            <input type="number" class="form-control text-right" placeholder="ยาว"
                                wire:model="area_long">
                            @error('area_long')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="">ตารางเมตร/ตารางกิโลเมตร</label>
                            <input type="number" class="form-control text-right"
                                placeholder="ตารางเมตร/ตารางกิโลเมตร" disabled wire:model="area_total">
                            {{-- @error('area_total')
                                <label class="text-danger">{{ $message }}</label>
                                @enderror --}}
                        </div>
                    </div>
                </div>

                <div class="{{ $panel == 3 ? '' : 'd-none' }}">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label><b><u>พื้นที่ดำเนินการโครงการ</u></b></label>
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
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label><b><u>ค่าใช้จ่าย</u></b></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="">เดือนที่เริ่ม</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" data-date-language="th-th"
                                    onchange="setDatePicker('stdate', event.target.value)"
                                    placeholder="เดือนที่เริ่ม">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="icon wb-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            @error('stdate')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="">เดือนที่สิ้นสุด</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" data-date-language="th-th"
                                    onchange="setDatePicker('endate', event.target.value)"
                                    placeholder="เดือนที่สิ้นสุด">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="icon wb-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            @error('endate')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 form-group">
                            <label for="">จำนวนวันดำเนินการ</label>
                            <input type="number" class="form-control text-right" min="0"
                                placeholder="จำนวนวันดำเนินการ" wire:model="day_qty">
                            @error('day_qty')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">จำนวน (คน)</label>
                            <input type="number" class="form-control text-right" min="0"
                                placeholder="จำนวน (คน)" wire:model="people_qty">
                            @error('people_qty')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row form-group">
                        <div class="col-md-9">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>วันที่</th>
                                        <th>วัน</th>
                                        <th>เลือก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($date_list as $key => $val)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ datetoview($val) }}</td>
                                            <td>{{ dayThaiName($val) }}</td>
                                            <td>
                                                <div class="checkbox-custom checkbox-primary">
                                                    <input type="checkbox" class="ads_Checkbox" checked="">
                                                    <label></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                    <div class="row form-group">
                        <div class="col-md-2 form-group">
                            <label for="">อัตราค่าตอบแทน ต่อคนต่อวัน</label>
                            <input type="number" class="form-control text-right" min="0"
                                placeholder="อัตราค่าตอบแทน ต่อคนต่อวัน" wire:model="job_wage_rate" disabled>
                            @error('job_wage_rate')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row form-group">
                        <div class="col-md-2 form-group">
                            <label for="">ค่าตอบแทน ต่อกิจกรรม</label>
                            <input type="number" class="form-control text-right" min="0"
                                placeholder="ค่าตอบแทน ต่อกิจกรรม" disabled wire:model="other_rate">
                        </div>
                    </div> --}}
                    {{-- <div class="row form-group">
                        <div class="col-md-2 form-group">
                            <label for="">ค่าใช้จ่ายอื่น</label>
                            <input type="number" class="form-control text-right" min="0"
                                placeholder="ค่าใช้จ่ายอื่น" wire:model="other_amt">
                        </div>
                    </div> --}}
                    {{-- <div class="row form-group">
                        <div class="col-md-2 form-group">
                            <label for="">รวมค่าใช้จ่าย</label>
                            <input type="number" class="form-control text-right" min="0"
                                placeholder="รวมค่าใช้จ่าย" disabled wire:model="total_amt">
                        </div>
                    </div> --}}
                    <hr>
                    <div class="form-group row pt-4 pb-1 bg-info">
                        <div class="col-md-9">
                        </div>
                        <label class="col-md-1 form-control-label text-right">
                            <label><b>ค่าใช้จ่ายรวม</b></label>
                        </label>
                        <div class="col-md-2">
                            {!! Form::number('total_amt', $total_amt, [
                                'wire:model' => 'total_amt',
                                'id' => 'total_amt',
                                'class' => 'form-control text-right',
                                'disabled',
                            ]) !!}
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

        function submit_prototype() {
            swal({
                title: 'ยืนยันการ บันทึกแบบร่างโครงการ ?',
                icon: 'close',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#00BCD4',
                cancelButtonColor: '#DD6B55'
            }, function(isConfirm) {
                if (isConfirm) {
                    @this.submit_prototype();
                }
            });
        }

        function submit_toconfirm() {
            swal({
                title: 'ยืนยันการ บันทึกส่งตรวจสอบโครงการ ?',
                icon: 'close',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#00BCD4',
                cancelButtonColor: '#DD6B55'
            }, function(isConfirm) {
                if (isConfirm) {
                    @this.submit_toconfirm();
                }
            });
        }
    </script>
@endpush
