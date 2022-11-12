<div>
    <div class="col-lg-12">
        <div class="panel-body">
            {!! Form::open(['wire:submit.prevent'=>
            'submit()', 'autocomplete'=>'off',
            'class'=>'form-horizontal fv-form fv-form-bootstrap4']) !!}
            <div class="form-group row">
                <label class="col-md-3 form-control-label">ชื่อระดับความพึงพอใจ <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    {!! Form::text('formtopic', null,
                    ['wire:model'=>'formtopic','id'=>'formtopic', 'class' => 'form-control','maxlength' => 200,'placeholder'=>'ไม่เกิน 200 ตัวอักษร']) !!}
                    @error('formtopic')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 form-control-label">ระดับความพึงพอใจ <span class="text-danger">*</span></label>
                <div class="col-md-2">
                    {!! Form::text('level', null,
                    ['wire:model'=>'level','id'=>'level', 'class' => 'form-control','maxlength' => 1,'placeholder'=>'ไม่เกิน 1 ตัวอักษร']) !!}
                     @error('level')
                     <label class="text-danger">{{ $message }}</label>
                     @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                <button type="button" wire:click='thisReset()' class="btn btn-default btn-outline">ยกเลิก</button>
            </div>
            {!! Form::close() !!}
            <script>
                document.addEventListener('livewire:load', function () {
                    window.livewire.on('save_success', function() {
                        swal('Success', 'บันทึกข้อมูลเรียบร้อยแล้ว', 'success');
                    });

                    window.livewire.on('update_success', function() {
                        swal('Success', 'แก้ไขข้อมูลเรียบร้อยแล้ว', 'success');
                    });
                });
            </script>
        </div>
    </div>
</div>



