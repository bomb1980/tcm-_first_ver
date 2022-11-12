<div>
    {!! Form::open(['wire:submit.prevent' => 'submit()', 'autocomplete' => 'off', 'class' => 'form-horizontal fv-form fv-form-bootstrap4']) !!}
    <div class="form-group row">
        <label class="col-md-3 form-control-label">ปีงบประมาณ</label>
        <div class="col-md-2">
        {!! Form::select('fiscalyear_code', $fiscalyear_list, null, ['id' => 'fiscalyear_code', 'onchange' => 'setSearch', 'class' => 'form-control', 'placeholder' => '--เลือกปีงบประมาณ--']) !!}
        @error('fiscalyear_code')
            <label class="text-danger">{{ $message }}</label>
        @enderror
        </div>
    </div>
    {{-- <hr>
    <div class="form-group row">
        <label class="form-control-label col-md-3 text-right">งบจัดสรรส่วนภูมิภาคคงเหลือ</label>
        {!! Form::number('budget', null, ['id' => 'budget', 'onchange' => 'setSearch', 'class' => 'form-control col-md-2', 'placeholder' => 'งบจัดสรรส่วนภูมิภาคคงเหลือ']) !!}
    </div>
    <hr> --}}
    <div class="form-group row">
        <label class="col-md-3 form-control-label">ครั้งที่</label>
        <div class="col-md-1">
        {!! Form::number('period_no', null, ['id' => 'period_no', 'class' => 'form-control text-right']) !!}
        </div>
        {{-- <label class="form-control-label col-md-1 text-right pr-4">สถานะกิจกรรม</label>
        {!! Form::select('act_status', ['ยืนยันความพร้อม', 'จัดสรร', 'ปิดกิจกรรม'], null, ['id' => 'act_status', 'onchange' => 'setSearch', 'class' => 'form-control col-md-2', 'placeholder' => 'เลือกสถานะกิจกรรม']) !!} --}}
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label">ชื่อกิจกรรม</label>
        <div class="col-md-5">
        {!! Form::text('actname', null, ['id' => 'actname','class' => 'form-control']) !!}
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-md-3 form-control-label">ช่วงเวลา</label>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" data-provide="datepicker" data-date-language="th-th"
                onchange="setDatePicker('stdate', event.target.value)">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <label class="col-md-1 form-control-label text-center">ถึง</label>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" data-provide="datepicker" data-date-language="th-th"
                onchange="setDatePicker('stdate', event.target.value)">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-md-3 form-control-label">ช่วงรวบรวม</label>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" data-provide="datepicker" data-date-language="th-th"
                onchange="setDatePicker('stdate', event.target.value)">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <label class="col-md-1 form-control-label text-center">ถึง</label>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" data-provide="datepicker" data-date-language="th-th"
                onchange="setDatePicker('stdate', event.target.value)">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label">ช่วงจัดสรร</label>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" data-provide="datepicker" data-date-language="th-th"
                onchange="setDatePicker('stdate', event.target.value)">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <label class="col-md-1 form-control-label text-center">ถึง</label>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" data-provide="datepicker" data-date-language="th-th"
                onchange="setDatePicker('stdate', event.target.value)">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label">ช่วงปรับแผน</label>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" data-provide="datepicker" data-date-language="th-th"
                onchange="setDatePicker('stdate', event.target.value)">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <label class="col-md-1 form-control-label text-center">ถึง</label>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" data-provide="datepicker" data-date-language="th-th"
                onchange="setDatePicker('stdate', event.target.value)">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label">ช่วงเริ่มกิจกรรม</label>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" data-provide="datepicker" data-date-language="th-th"
                onchange="setDatePicker('stdate', event.target.value)">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <label class="col-md-1 form-control-label text-center">ถึง</label>
        <div class="input-group col-md-2">
            <input type="text" class="form-control" data-provide="datepicker" data-date-language="th-th"
                onchange="setDatePicker('stdate', event.target.value)">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
    </div>

    {{-- <div class="form-group row d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </div> --}}
    <div class="text-center">
        <button class="btn btn-primary">บันทึกข้อมูล</button>
        {{-- <button class="btn btn-default btn-outline">ยกเลิก</button> --}}
        <button class="btn btn-default btn-outline"><a href="{{ route('activity.act_detail.index') }}">ยกเลิก</a></button>
        {{-- <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
        <button type="reset" wire:click='thisReset()' class="btn btn-default btn-outline">ยกเลิก</button> --}}
    </div>
    {!! Form::close() !!}
</div>

@push('js')
    <script>
        $('.select2').select2();

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

        Livewire.on('emits', () => {
            $('.select2').select2();
            $(".ads_Checkbox").change(function() {
                var searchIDs = $(".ads_Checkbox").map(function(_, el) {
                    if ($(this).is(':checked')) {
                        return 'on';
                    } else {
                        return 'off';
                    }
                }).get();
                // console.log(searchIDs);
            });

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
    </script>
@endpush
