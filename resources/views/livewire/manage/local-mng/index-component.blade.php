<div>
    {!! Form::open(['wire:submit.prevent' => 'submit()', 'autocomplete' => 'off', 'class' => 'form-horizontal fv-form fv-form-bootstrap4']) !!}
    <div class="form-group row">
        <label class="form-control-label col-md-1 text-right pr-4">ปีงบประมาณ</label>
        {{-- {{ Form::select('fiscalyear_code', $fiscalyear_list, $fiscalyear_code, [
            'wire:change' => 'setValue("fiscalyear_code",event.target.value)',
            'class' => 'form-control select2',
            'placeholder' => '--เลือกปีงบประมาณ--',
        ]) }} --}}
        {!! Form::select('fiscalyear_code', $fiscalyear_list, $fiscalyear_code, ['onchange' => 'setValue("fiscalyear_code",event.target.value)', 'class' => 'form-control select2 col-md-2', 'placeholder' => '--เลือกปีงบประมาณ--']) !!}
        @error('fiscalyear_code')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <hr>

    <div class="form-group row d-flex justify-content-center">
        <div class="col-md-6">
            <table class="table table-bordered table-hover w-full dataTable" id="Datatables">
                <thead class="bg_thead">
                    <tr class="text-center" role="row">
                        <th class="font-weight-bold text-dark col-1">คำขอ</th>
                        <th class="font-weight-bold text-dark col-1">เสนองบ</th>
                        <th class="font-weight-bold text-dark col-1">ได้รับงบ</th>
                        <th class="font-weight-bold text-dark col-1">รับโอนจากสำนักงาน</th>
                        <th class="font-weight-bold text-dark col-1">รอโอน</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center" role="row">
                        <td>{{ number_format($total_sum, 2) }}</td>
                        <td>{{ number_format($req_amt, 2) }}</td>
                        <td>{{ number_format($budget_amt, 2) }}</td>
                        <td>{{ number_format($receive_tran, 2) }}</td>
                        <td>{{ number_format($tran_hold, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <label class="form-control-label col-md-2 ml-4">
            <h4><b>การจัดสรรปัจจุบัน</b></h4>
        </label>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover w-full dataTable" id="Datatables">
                <thead class="bg_thead">
                    <tr class="text-center" role="row">
                        <th class="font-weight-bold text-dark col-1" rowspan="2">รอจัดสรร</th>
                        <th class="font-weight-bold text-dark" colspan="3">การจัดสรรส่วนกลาง</th>
                        <th class="font-weight-bold text-dark" colspan="5">การจัดสรรส่วนภูมิภาค</th>
                        {{-- <th class="font-weight-bold text-dark col-1" rowspan="2">โอนคืน</th> --}}
                        {{-- <th class="font-weight-bold text-dark col-1" rowspan="2">คงเหลือรวม</th> --}}
                    </tr>
                    <tr class="text-center" role="row">
                        <th class="font-weight-bold text-dark col-1">จัดสรร</th>
                        <th class="font-weight-bold text-dark col-1">เบิกจ่าย</th>
                        <th class="font-weight-bold text-dark col-1">คงเหลือ</th>
                        <th class="font-weight-bold text-dark col-1">จัดสรร</th>
                        <th class="font-weight-bold text-dark col-1">ผูกพันเบิกจ่ายค่าบริหาร</th>
                        <th class="font-weight-bold text-dark col-1">ผูกพันเบิกจ่ายค่าดำเนินโครงการ</th>
                        <th class="font-weight-bold text-dark col-1">โอนคืน</th>
                        <th class="font-weight-bold text-dark col-1">คงเหลือ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center" role="row">
                        <td>
                            {{ number_format($mng_hold, 2) }}
                            {{-- {!! Form::number('mng_hold', $mng_hold, ['wire:model' => 'mng_hold', 'class' => 'form-control col-md-12 text-center', 'disabled']) !!} --}}
                        </td>
                        <td style="background-color: #569fff">
                            {{ number_format($centerbudget_amt, 2) }}
                            {{-- {!! Form::number('centerbudget_amt', $centerbudget_amt, ['wire:model' => 'centerbudget_amt', 'class' => 'form-control col-md-12 text-center', 'disabled']) !!} --}}
                        </td>
                        <td>
                            {{ number_format($disburse, 2) }}
                            {{-- {!! Form::number('disburse', $disburse, ['wire:model' => 'disburse', 'class' => 'form-control col-md-12 text-center', 'disabled']) !!} --}}
                        </td>
                        <td>
                            {{ number_format($balance_center, 2) }}
                            {{-- {!! Form::number('balance_center', $balance_center, ['wire:model' => 'balance_center', 'class' => 'form-control col-md-12 text-center', 'disabled']) !!} --}}
                        </td>
                        <td style="background-color: #569fff">
                            {{ number_format($regionbudget_amt, 2) }}
                            {{-- {!! Form::number('regionbudget_amt', $regionbudget_amt, ['wire:model' => 'regionbudget_amt', 'class' => 'form-control col-md-12 text-center', 'disabled']) !!} --}}
                        </td>
                        <td>
                            {{ number_format($mng_bond, 2) }}
                            {{-- {!! Form::number('mng_bond', $mng_bond, ['wire:model' => 'mng_bond', 'class' => 'form-control col-md-12 text-center', 'disabled']) !!} --}}
                        </td>
                        <td>
                            {{ number_format($pro_bond, 2) }}
                            {{-- {!! Form::number('pro_bond', $pro_bond, ['wire:model' => 'pro_bond', 'class' => 'form-control col-md-12 text-center', 'disabled']) !!} --}}
                        </td>
                        <td>
                            {{ number_format($tran_back, 2) }}
                            {{-- {!! Form::number('tran_back', $tran_back, ['wire:model' => 'tran_back', 'class' => 'form-control col-md-12 text-center', 'disabled']) !!} --}}
                        </td>
                        <td>
                            {{ number_format($balance_region, 2) }}
                            {{-- {!! Form::number('balance_region', $balance_region, ['wire:model' => 'balance_region', 'class' => 'form-control col-md-12 text-center', 'disabled']) !!} --}}
                        </td>
                        {{-- <td>
                            {{ number_format($balance_sum,2) }}
                        </td> --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>

    <div class="row">
        <label class="form-control-label col-md-2 ml-4">
            <h4><b>การจัดสรรใหม่</b></h4>
        </label>
    </div>
    <div class="form-group row justify-content-center">
        <div class="col-md-6">
            <table class="table table-bordered table-hover w-full dataTable" id="Datatables">
                <thead class="bg_thead">
                    <tr class="text-center" role="row">
                        <th class="font-weight-bold text-dark col-1" rowspan="2">ยอดที่สามารถจัดสรร</th>
                        <th class="font-weight-bold text-dark col-2" colspan="2">จัดสรรส่วนกลาง</th>
                        <th class="font-weight-bold text-dark col-2" colspan="2">จัดสรรส่วนภูมิภาค</th>
                        <th class="font-weight-bold text-dark col-1" rowspan="2">คงเหลือ</th>
                    </tr>
                    <tr class="text-center" role="row">
                        <th class="font-weight-bold text-dark">ยอดเดิม</th>
                        <th class="font-weight-bold text-dark">ยอดที่ต้องการปรับปรุงใหม่</th>
                        <th class="font-weight-bold text-dark">ยอดเดิม</th>
                        <th class="font-weight-bold text-dark">ยอดที่ต้องการปรับปรุงใหม่</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center" role="row">
                        <td class="align-middle">
                            {{ number_format($able_mng_bud, 2) }}
                            {{-- {!! Form::number('able_mng_bud', $able_mng_bud, ['wire:model' => 'able_mng_bud', 'class' => 'form-control col-md-12 text-center', 'disabled']) !!} --}}
                        </td>
                        <td class="col-1 align-middle" style="background-color: #569fff">
                            {{ number_format($centerbudget_amt, 2) }}
                        </td>
                        <td class="col-1">
                            {!! Form::number('mng_center', $mng_center, ['wire:model' => 'mng_center', 'class' => 'form-control col-md-12 text-center']) !!}
                        </td>
                        <td class="col-1 align-middle" style="background-color: #569fff">
                            {{ number_format($regionbudget_amt, 2) }}
                        </td>
                        <td class="col-1">
                            {!! Form::number('mng_region', $mng_region, ['wire:model' => 'mng_region', 'class' => 'form-control col-md-12 text-center']) !!}
                        </td>
                        <td class="align-middle">
                            {{ number_format($balance_end, 2) }}
                            {{-- {!! Form::number('balance_end', $balance_end, ['wire:model' => 'balance_end', 'class' => 'form-control col-md-12 text-center', 'disabled']) !!} --}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="form-group row d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">บันทึก</button>
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
            @this.setValue(name, val);
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
