<div>
    <div class="col-lg-12">
        <div class="panel-body">
            {!! Form::open([
                'wire:submit.prevent' => 'submit()',
                'autocomplete' => 'off',
                'class' => 'form-horizontal fv-form fv-form-bootstrap4',
            ]) !!}





            <div class="form-group row">
                <label class="col-md-2 form-control-label">ปีงบประมาณ <span class="text-danger">*</span></label>
                <div class="col-md-3">
                    {!! Form::number('fiscalyear_code', $fiscalyear_code, [
                        'wire:model' => 'fiscalyear_code',
                        'id' => 'fiscalyear_code',
                        'class' => 'form-control',
                        'maxlength' => 4,
                        'placeholder' => 'ปี พ.ศ.',
                    ]) !!}
                    @error('fiscalyear_code')
                        <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>



            <div class="form-group row">
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label">วันที่เริ่มงบฯ </label>
                <div class="col-md-3">
                    @if (!empty($fiscalyear_code))
                        <text class="form-control" id="startdate">01/10/{{ $fiscalyear_code }}</text>
                    @else
                        <text class="form-control" id="startdate"></text>
                    @endif
                </div>
                <label class="col-md-2 form-control-label">วันที่สิ้นสุดงบฯ </label>
                <div class="col-md-3">
                    @if (!empty($fiscalyear_code))
                        <text class="form-control" id="enddate">30/09/{{ $fiscalyear_code + 1 }}</text>
                    @else
                        <text class="form-control" id="enddate"></text>
                    @endif
                </div>
            </div>
            {{-- <div class="form-group row">
                <label class="col-md-2 form-control-label">วันที่เริ่มงบฯ </label>
                <div class="col-md-2">
                    <div class="input-group">
                        {!! Form::text('startdate', $startdate, ['wire:model' => 'startdate','id' => 'startdate', 'class' => 'form-control', 'data-provide' => 'datepicker','data-date-language' => 'th-th','readonly' => 'true']) !!}
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="icon wb-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    @error('startdate')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label">วันที่สิ้นสุดงบฯ </label>
                <div class="col-md-2">
                    <div class="input-group">
                        {!! Form::text('enddate', $enddate, ['wire:model' => 'enddate','id' => 'enddate', 'class' => 'form-control', 'data-provide' => 'datepicker','data-date-language' => 'th-th','readonly' => 'true']) !!}
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="icon wb-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    @error('enddate')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div> --}}
            {{-- <div class="form-group row">
                <label class="col-md-2 form-control-label">เปิดรวบรวมคำขอ </label>
                <div class="col-md-2" wire:ignore>
                    <label class="form-control-label"> ปิด
                        <input type="checkbox" id="req_status" name="req_status" data-plugin="switchery" {{
                            $req_status==1 ? 'checked' : '' }}>
                        <span class="lever"></span> เปิด
                    </label>
                </div>
            </div> --}}





            <div class="form-group row">
                <label class="col-md-2 form-control-label">วันที่เริ่มรวบรวมคำขอ </label>
                <div class="col-md-3">
                    <div class="input-group">
                        {!! Form::text('req_startdate', $req_startdate, [
                            'wire:model' => 'req_startdate',
                            'class' => 'form-control datepicker',
                            'onchange' => 'setValue("req_startdate", event.target.value)',
                        ]) !!}
                        <div class="input-group-append">
                            <span wire:click='req_startdate_clear()' class="bg-light input-group-text"
                                style="cursor: pointer;">
                                <i class="text-danger icon wb-close" aria-hidden="true"></i>
                            </span>
                            <span class="bg-light input-group-text">
                                <i class="text-primary icon wb-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    @error('req_startdate')
                        <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>

                <label class="col-md-2 form-control-label">วันที่สิ้นสุดรวบรวมคำขอ </label>
                <div class="col-md-3">
                    <div class="input-group">
                        {!! Form::text('req_enddate', $req_enddate, [
                            'wire:model' => 'req_enddate',
                            'class' => 'form-control datepicker',
                            'onchange' => 'setValue("req_enddate", event.target.value)',
                        ]) !!}
                        <span wire:click='req_enddate_clear()' class="bg-light input-group-text"
                            style="cursor: pointer;">
                            <i class="text-danger icon wb-close" aria-hidden="true"></i>
                        </span>
                        <span class="bg-light input-group-text">
                            <i class="text-primary icon wb-calendar" aria-hidden="true"></i>
                        </span>
                    </div>
                    @error('req_enddate')
                        <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>


            </div>

            <div class="text-center">
                <button type="button" onclick="edit_button()" class="btn btn-primary">บันทึกข้อมูล</button>
                <button type="button" wire:click='thisReset()' class="btn btn-default btn-outline">ยกเลิก</button>
            </div>
            {!! Form::close() !!}
            {{-- <script>
                document.addEventListener('livewire:load', function () {
                    window.livewire.on('save_success', function() {
                        swal('Success', 'บันทึกข้อมูลเรียบร้อยแล้ว', 'success');
                    });

                    window.livewire.on('update_success', function() {
                        swal('Success', 'แก้ไขข้อมูลเรียบร้อยแล้ว', 'success');
                    });
                });
            </script> --}}
        </div>
    </div>
</div>
@push('js')
    <script>


        document.addEventListener('livewire:load', function() {
            //alert('dfadad');


            //$('.datepicker').datepicker();

            $(".datepicker").datepicker({
                language: 'th-th',
                format: 'dd/mm/yyyy',
                // endDate: '+20y',
                autoclose: true
            });
        });

        Livewire.on('popup', () => {
            swal({
                    title: "แก้ไขข้อมูลเรียบร้อย",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                },
                function(isConfirm) {
                    if (isConfirm) {
                       // location.reload();
                         window.livewire.emit('redirect-to');
                    }
                });
        });


        function setValue(name, value) {
            $('.modal').modal('show');
            setTimeout(function() {
                $('.modal').modal('hide');
            }, 3000);

            @this.set(name, value);
        }




        function edit_button() {
            swal({
                title: 'ยืนยันการ แก้ไข ข้อมูล ?',
                icon: 'close',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#00BCD4',
                cancelButtonColor: '#DD6B55'
            }, function(isConfirm) {
                if (isConfirm) {
                    @this.submit()
                }
            });
        }
    </script>
@endpush
