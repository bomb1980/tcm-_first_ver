<div>
    <div class="col-lg-12">
        <div class="panel-body">
            <div class="form-group row">
                <label class="col-md-2 form-control-label">จังหวัด <span class="text-danger">*</span></label>
                <div class="col-md-2">
                    {!! Form::select('province_id', $province_sel, $province_id, [
                        'wire:model' => 'province_id',
                        'class' => 'form-control',
                        'id' => 'province_id',
                    ]) !!}
                    @error('province_id')
                        <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label">ประเภท <span class="text-danger">*</span></label>
                <div class="col-md-2">
                    {!! Form::select('lecturer_types_id', $lecturer_types_sel, $lecturer_types_id, [
                        'wire:model' => 'lecturer_types_id',
                        'class' => 'form-control',
                        'id' => 'lecturer_types_id',
                    ]) !!}
                    @error('lecturer_types_id')
                        <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label">ชื่อ: <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    {{ Form::text('lecturer_fname', $lecturer_fname, [
                        'wire:model' => 'lecturer_fname',
                        'id' => 'lecturer_fname',
                        'class' => 'form-control',
                        'autocomplete' => 'off',
                        'maxlength' => 100,
                        'placeholder' => 'ชื่อหน่วยงาน',
                    ]) }}
                    @error('lecturer_fname')
                        <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label">นามสกุล:</label>
                <div class="col-md-7">
                    {{ Form::text('lecturer_lname', $lecturer_lname, [
                        'wire:model' => 'lecturer_lname',
                        'id' => 'lecturer_lname',
                        'class' => 'form-control',
                        'autocomplete' => 'off',
                        'placeholder' => 'ขื่อย่อ',
                    ]) }}
                    @error('lecturer_lname')
                        <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label">เบอร์โทรศัพท์:</label>
                <div class="col-md-7">
                    {{ Form::text('lecturer_phone', $lecturer_phone, [
                        'wire:model' => 'lecturer_phone',
                        'id' => 'lecturer_phone',
                        'class' => 'form-control',
                        'autocomplete' => 'off',
                        'placeholder' => 'กรุณากรอก เบอร์โทรศัพท์',
                    ]) }}
                    @error('lecturer_phone')
                        <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label">ที่อยู่:</label>
                <div class="col-md-7">
                    {{ Form::text('lecturer_address', $lecturer_address, [
                        'wire:model' => 'lecturer_address',
                        'id' => 'lecturer_address',
                        'class' => 'form-control',
                        'autocomplete' => 'off',
                        'placeholder' => 'กรุณากรอก ที่อยู่',
                    ]) }}
                    @error('lecturer_address')
                        <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="button" wire:click='submit()'class="btn btn-primary">บันทึกข้อมูล</button>
                <button type="button" wire:click='redirect_to()' class="btn btn-default btn-outline">ยกเลิก</button>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            Livewire.on('popup', () => {

                swal({
                        title: "บันทึกข้อมูลเรียบร้อย",
                        type: "success",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "OK",
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            @this.redirect_to();
                        }
                    });
            });
        }
    </script>
</div>
