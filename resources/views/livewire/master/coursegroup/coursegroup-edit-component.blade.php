<div>
    <div class="col-lg-12">
        <div class="panel-body">
            {!! Form::open(['wire:submit.prevent'=>
            'submit()', 'autocomplete'=>'off',
            'class'=>'form-horizontal fv-form fv-form-bootstrap4']) !!}
            <div class="form-group row">
                <label class="col-md-3 form-control-label">รหัสกลุ่มหลักสูตร  <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    {!! Form::text('code', null,
                    ['wire:model'=>'code','id'=>'code', 'class' => 'form-control','maxlength' => 20]) !!}
                    @error('code')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 form-control-label">ชื่อกลุ่มหลักสูตร  <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    {!! Form::text('name', null,
                    ['wire:model'=>'name','id'=>'name', 'class' => 'form-control','maxlength' => 1000]) !!}
                    @error('name')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 form-control-label">ชื่อย่อ  <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    {!! Form::text('shortname', null,
                    ['wire:model'=>'shortname','id'=>'shortname', 'class' => 'form-control','maxlength' => 200]) !!}
                    @error('shortname')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 form-control-label">ประเภทกิจกรรม  <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    {!! Form::select('acttype_id', $acttype_list, $acttype_id,
                    ['onchange' => 'setValue("acttype_id",event.target.value)', 'class' => 'form-control select2', 'id' => 'acttype_id','placeholder' => 'กรุณาเลือกประเภทกิจกรรม']) !!}
                    @error('acttype_id')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="button" onclick="submit_click()" class="btn btn-primary">บันทึกข้อมูล</button>
                <button type="button" wire:click='thisReset()' class="btn btn-default btn-outline">ยกเลิก</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@push('js')
    <script>
        $('.select2').select2();

        function setValue(name, val){
            @this.set(name, val);
        }

        Livewire.on('emits', () => {
            $('.select2').select2();
        });

        Livewire.on('popup', () => {
            swal({
                title: "แก้ไขข้อมูลเรียบร้อย",
                type: "success",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "OK",
                },
                function(isConfirm){
                    if (isConfirm) {
                        window.livewire.emit('redirect-to');
                }
            });
        });

        function submit_click() {
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
                @this.submit();
            }
        });
        }
    </script>
@endpush


