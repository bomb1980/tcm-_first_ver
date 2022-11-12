<div>
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

        <label class="form-control-label col-md-1 text-right pr-4">กิจกรรมครั้งที่</label>
        {!! Form::select('act_count', [1, 2, 3, 4, 5, 6, 7, 8, 9], 0, [
            'onchange' => 'setValue("dept_id",event.target.value)',
            'class' => 'form-control col-md-1',
        ]) !!}
        @error('act_count')
            <label class="text-danger">{{ $message }}</label>
        @enderror

        <button type="button" class="btn btn-primary col-md-1 offset-md-6" onclick="todo()">ส่งต่อปรับแผน</button>
    </div>
    <hr>
    <div class="form-group row">
        <label class="form-control-label col-md-1 text-right pr-4">งบส่วนภูมิภาค</label>
        {!! Form::number('local_budget', null, [
            'id' => 'local_budget',
            'class' => 'form-control col-md-2',
            'placeholder' => 'งบส่วนภูมิภาค',
        ]) !!}
        @error('local_budget')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group row">
        <label class="form-control-label col-md-1 text-right pr-4">ยอดโครงการ</label>
        {!! Form::number('local_budget', null, [
            'id' => 'local_budget',
            'class' => 'form-control col-md-2',
            'placeholder' => 'งบส่วนภูมิภาค',
        ]) !!}
        @error('local_budget')
            <label class="text-danger">{{ $message }}</label>
        @enderror

        <label class="form-control-label col-md-1 text-right pr-4">ยอดจัดสรร</label>
        {!! Form::number('local_budget', null, [
            'id' => 'local_budget',
            'class' => 'form-control col-md-2',
            'placeholder' => 'ยอดจัดสรร',
        ]) !!}
        @error('local_budget')
            <label class="text-danger">{{ $message }}</label>
        @enderror

        <label class="form-control-label col-md-1 text-right pr-4">ยอดโอน</label>
        {!! Form::number('local_budget', null, [
            'id' => 'local_budget',
            'class' => 'form-control col-md-2',
            'placeholder' => 'ยอดโอน',
        ]) !!}
        @error('local_budget')
            <label class="text-danger">{{ $message }}</label>
        @enderror

        <label class="form-control-label col-md-1 text-right pr-4">รอโอน</label>
        {!! Form::number('local_budget', null, [
            'id' => 'local_budget',
            'class' => 'form-control col-md-2',
            'placeholder' => 'รอโอน',
        ]) !!}
        @error('local_budget')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped w-full dataTable" id="Datatables">
            <thead>
                <tr>
                    <th class="text-center" rowspan="2">หน่วยงาน</th>
                    <th class="text-center" colspan="2">จ้างงานเร่งด่วน</th>
                    <th class="text-center" colspan="2">ฝึกทักษะฝีมือแรงงาน</th>
                    <th class="text-center" colspan="2">รวมโครงการ</th>
                    <th class="text-center border" rowspan="2">ค่ากิจกรรมจ้างงาน</th>
                    <th class="text-center" rowspan="2">ค่ากิจกรรมอบรม</th>
                    <th class="text-center" rowspan="2">บริหารกิจกรรม</th>
                    <th class="text-center border" rowspan="2">รวม</th>
                    <th class="text-center" rowspan="2">แก้ไข</th>
                </tr>
                <tr>
                    <th class="text-center">โครงการ</th>
                    <th class="text-center">ค่าใช้จ่าย</th>
                    <th class="text-center">โครงการ</th>
                    <th class="text-center">ค่าใช้จ่าย</th>
                    <th class="text-center">โครงการ</th>
                    <th class="text-center">ค่าใช้จ่าย</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dept_mockup as $key => $val)
                    <tr>
                        <td>{{ $val }}</td>
                        <td class="text-center">3</td>
                        <td class="text-center">300,000</td>
                        <td class="text-center">10</td>
                        <td class="text-center">700,000</td>
                        <td class="text-center">13</td>
                        <td class="text-center">1,000,000</td>
                        <td class="text-center" style="background-color: #cce2fe">0</td>
                        <td class="text-center" style="background-color: #cce2fe">0</td>
                        <td class="text-center" style="background-color: #cce2fe">0</td>
                        <td class="text-center" style="background-color: #fff7ae">0</td>
                        {{-- <td class="text-center">1,000,000</td> --}}
                        <td class="col-1">
                            <div class="col-md-12 d-flex justify-content-center">
                                {{-- <a href="{{ route('activity.tran_mng.manage') }}" class="btn btn-primary btn-md">
                            จัดสรร</a>

                        <a href="{{ route('activity.tran_mng.transfer') }}" class="btn btn-primary btn-md ml-4">
                            โอนเงิน</a> --}}

                                <a href="{{ route('activity.tran_mng.allocate') }}" class="btn btn-primary btn-md ml-4">
                                    จัดสรร</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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

        function todo() {
            swal({
                title: 'ยืนยันการ ส่งต่อปรับแผน ?',
                icon: 'close',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#00BCD4',
                cancelButtonColor: '#DD6B55'
            }, function(isConfirm) {
                if (isConfirm) {
                    @this.todo();
                }
            });
        }
    </script>
@endpush
