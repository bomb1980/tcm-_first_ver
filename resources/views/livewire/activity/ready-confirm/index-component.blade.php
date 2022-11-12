<div>
    {{-- <div class="form-group text-right">
        <a href="{{ route('activity.ready_confirm.hire') }}" class="btn btn-primary icon wb-plus">
            เพิ่มกิจกรรมจ้างงานเร่งด่วน</a>
        <a href="{{ route('activity.ready_confirm.train') }}" class="btn btn-primary icon wb-plus">
            เพิ่มกิจกรรมทักษะฝีมือแรงงาน</a>
    </div>
    <br> --}}
    <div class="form-group row">
        <label class="form-control-label col-md-1 text-right pr-4">ปีงบประมาณ</label>
        {!! Form::select('fiscalyear_code', $fiscalyear_list, null, [
            'id' => 'fiscalyear_code',
            'onchange' => 'setSearch',
            'class' => 'form-control col-md-2',
            'placeholder' => '--เลือกปีงบประมาณ--',
        ]) !!}
        @error('fiscalyear_code')
            <label class="text-danger">{{ $message }}</label>
        @enderror

        {{-- <label class="form-control-label col-md-1 text-right pr-4">กิจกรรมครั้งที่</label>
        {!! Form::select('act_count', [1, 2, 3, 4, 5, 6, 7, 8, 9], 0, [
            'onchange' => 'setValue("dept_id",event.target.value)',
            'class' => 'form-control col-md-1',
        ]) !!}
        @error('act_count')
            <label class="text-danger">{{ $message }}</label>
        @enderror --}}

        {{-- <label class="form-control-label col-md-1 text-right pr-4">หน่วยงาน</label>
        {!! Form::select('dept_id', $dept_list, null, ['id' => 'dept_id', 'onchange' => 'setSearch()', 'class' => 'form-control select2 col-md-2', 'placeholder' => '--เลือกหน่วยงาน--']) !!}
        @error('dept_id')
            <label class="text-danger">{{ $message }}</label>
        @enderror --}}

        {{-- <label class="form-control-label col-md-1 text-right pr-4">ประเภทกิจกรรม</label>
        {!! Form::select('acttype', $acttype_list, null, [
            'onchange' => 'setValue("acttype",event.target.value)',
            'class' => 'form-control col-md-2',
            'placeholder' => '--เลือกประเภทกิจกรรม--',
        ]) !!}
        @error('acttype')
            <label class="text-danger">{{ $message }}</label>
        @enderror --}}

        <label class="form-control-label col-md-1 text-right pr-4">งวดที่</label>
        {!! Form::select('installment', [1, 2, 3, 4], null, [
            'wire:model' => 'installment',
            'class' => 'form-control col-md-1',
            'placeholder' => '--เลือกงวด--',
        ]) !!}
        @error('installment')
            <label class="text-danger">{{ $message }}</label>
        @enderror

        <label class="form-control-label col-md-1 text-right pr-4">จังหวัด</label>
        {!! Form::select('acttype', $acttype_list, null, [
            'onchange' => 'setValue("acttype",event.target.value)',
            'class' => 'form-control col-md-2',
            'placeholder' => '--เลือกจังหวัด--',
            'disabled',
        ]) !!}
        @error('acttype')
            <label class="text-danger">{{ $message }}</label>
        @enderror

        <button class="btn btn-primary form-control col-md-1 ml-4">ค้นหา</button>

        {{-- <div class="col-md-2 input-group form-group ml-4 pl-4">
            <input type="search" id="form1" class="form-control" oninput="setSearch()"
                placeholder="คำค้น keyword" />
            <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div> --}}
    </div>

    <hr>

    <div class="form-group row">
        <label class="form-control-label col-md-1 text-right pr-4">ประเภทกิจกรรม</label>
        {!! Form::select('acttype', $acttype_list, null, [
            'onchange' => 'setValue("acttype",event.target.value)',
            'class' => 'form-control col-md-2',
            'placeholder' => '--เลือกประเภทกิจกรรม--',
        ]) !!}
        @error('acttype')
            <label class="text-danger">{{ $message }}</label>
        @enderror
        <div class="col-md-2 input-group form-group ml-4 pl-4">
            <input type="search" id="form1" class="form-control" oninput="setSearch()"
                placeholder="คำค้น keyword" />
            <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <a href="{{ route('activity.ready_confirm.hire') }}" class="btn btn-primary form-control col-md-2 offset-md-2 icon wb-plus">
            เพิ่มกิจกรรมจ้างงานเร่งด่วน</a>
        <a href="{{ route('activity.ready_confirm.train') }}" class="btn btn-primary form-control col-md-2 icon wb-plus ml-4">
            เพิ่มกิจกรรมทักษะฝีมือแรงงาน</a>
    </div>

    <div class="form-group">
        <table class="table table-bordered table-hover table-striped dataTable" id="Datatables">
            <thead>
                <tr>
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">เลขที่คำขอ</th>
                    <th class="text-center">หน่วยงาน</th>
                    <th class="text-center">ชื่อประเภทกิจกรรม</th>
                    <th class="text-center">อำเภอ</th>
                    <th class="text-center">ตำบล</th>
                    <th class="text-center">หมู่บ้าน</th>
                    <th class="text-center">จำนวนวัน</th>
                    <th class="text-center">จำนวนคน</th>
                    <th class="text-center">รวม</th>
                    <th class="text-center">สถานะใบคำขอ</th>
                    <th class="text-center">แก้ไข</th>
                    <th class="text-center">ลบ</th>
                </tr>
            </thead>
        </table>
    </div>

    {{-- <div class="form-group row pt-4 pb-1 bg-info">
        <div class="col-md-9">
        </div>
        <label class="col-md-1 form-control-label text-left">
            <h4><b>ค่าใช้จ่ายรวม</b></h4>
        </label>
        <div class="col-md-2">
            {!! Form::number('total_amt', $total_amt, [
                'id' => 'total_amt',
                'class' => 'form-control text-right',
                'disabled',
            ]) !!}
        </div>
    </div> --}}

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

        function copyReqList() {
            swal({
                title: 'ยืนยันการ ดึงข้อมูลทั้งหมดจากแบบคำของบประมาณ ?',
                icon: 'close',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#00BCD4',
                cancelButtonColor: '#DD6B55'
            }, function(isConfirm) {
                if (isConfirm) {
                    // @this.redirect_to();
                }
            });
        }
    </script>
@endpush
