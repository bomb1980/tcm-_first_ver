<div>
    {{-- <div class="form-group text-right">
        <a href="{{ route('activity.plan_adjust.hire') }}" class="btn btn-primary icon wb-plus">
            เพิ่มกิจกรรมจ้างงานเร่งด่วน</a>
        <a href="{{ route('activity.plan_adjust.train') }}" class="btn btn-primary icon wb-plus">
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

        <label class="form-control-label col-md-1 text-right pr-4">งวดที่</label>
        {!! Form::select('act_count', [1, 2, 3, 4, 5, 6, 7, 8, 9], 0, [
            'onchange' => 'setValue("dept_id",event.target.value)',
            'class' => 'form-control col-md-1',
        ]) !!}
        @error('act_count')
            <label class="text-danger">{{ $message }}</label>
        @enderror

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

        {{-- <div class="col-md-2 input-group form-group ml-4 pl-4">
            <input type="search" id="form1" class="form-control" oninput="setSearch()"
                placeholder="คำค้น keyword" />
            <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div> --}}

        <button class="btn btn-primary form-control col-md-1 ml-4">ค้นหา</button>
    </div>

    <hr>

    <div class="form-group row pt-4 pb-1 col-md-8 bg-info">
        <label class="col-md-2 form-control-label ml-4 text-left">
            <h6><b>จำนวนเงินที่ได้รับจัดสรร</b></h6>
        </label>
        <div class="col-md-2">
            {!! Form::text('total_amt1', number_format($total_amt1), [
                'id' => 'total_amt',
                'class' => 'form-control text-right',
                'disabled',
            ]) !!}
        </div>
        <label class="col-md-2 form-control-label text-left ml-4">
            <h6><b>จำนวนเงินที่เบิกจ่าย</b></h6>
        </label>
        <div class="col-md-2">
            {!! Form::text('total_amt2', number_format($total_amt2), [
                'id' => 'total_amt',
                'class' => 'form-control text-right',
                'disabled',
            ]) !!}
        </div>
    </div>

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
    </div>

    <div class="form-group">
        <table class="table table-bordered table-hover table-striped dataTable" id="Datatables">
            <thead>
                <tr>
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">เลขที่คำขอ</th>
                    <th class="text-center">หน่วยงาน</th>
                    <th class="text-center">ชื่อประเภทกิจกรรม</th>
                    <th class="text-center">ชื่อกิจกรรม</th>
                    <th class="text-center">จำนวนวัน</th>
                    <th class="text-center">จำนวนคน</th>
                    <th class="text-center">สถานะ</th>
                    <th class="text-center">เข้าร่วม</th>
                    <th class="text-center">รูปภาพ</th>
                    {{-- <th class="text-center">ปิดกิจกรรม</th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">01</td>
                    <td class="text-center">สำนักงานแรงงานจังหวัดชลบุรี</td>
                    <td class="text-center">จ้างงานเร่งด่วน</td>
                    <td class="text-center">ปลูกป่าชายเลน</td>
                    <td class="text-center">2</td>
                    <td class="text-center">10</td>
                    <td class="text-center">กำลังดำเนินการ</td>
                    <td class="text-center">
                        <a href="/activity/recordattendance/create/1" class="btn btn-default">เข้าร่วม</a>
                    </td>
                    <td class="text-center">
                        <a href="/activity/activity_image/images" class="btn btn-default">เพิ่ม</a>
                    </td>
                    {{-- <td class="text-center"><button class="btn-danger">ปิด</button></td> --}}
                </tr>
            </tbody>
        </table>
    </div>

    {{-- <div class="form-group row pt-4 pb-1 bg-info">
        <div class="col-md-6">
        </div>
         <label class="col-md-1 form-control-label text-left">
            <h6><b>จำนวนเงินที่ได้รับจัดสรร</b></h6>
        </label>
        <div class="col-md-2">
            {!! Form::text('total_amt1', number_format($total_amt1), [
                'id' => 'total_amt',
                'class' => 'form-control text-right',
                'disabled',
            ]) !!}
        </div>
        <label class="col-md-1 form-control-label text-left">
            <h6><b>จำนวนเงินที่เบิกจ่าย</b></h6>
        </label>
        <div class="col-md-2">
            {!! Form::text('total_amt2', number_format($total_amt2), [
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
