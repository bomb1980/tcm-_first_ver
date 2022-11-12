<div>
    <div class="col-lg-12">
        <div class="panel-body">
            {!! Form::open(['wire:submit.prevent'=>
            'submit()', 'autocomplete'=>'off',
            'class'=>'form-horizontal fv-form fv-form-bootstrap4']) !!}
            <div class="form-group row">
                <label class="col-md-2 form-control-label">ปีงบประมาณ <span class="text-danger">*</span></label>
                <div class="col-md-2">
                    {!! Form::text('fiscalyear_code', null,
                    ['wire:model'=>'fiscalyear_code','id'=>'fiscalyear_code', 'class' => 'form-control','maxlength' => 4,'placeholder'=>'ปี พ.ศ.']) !!}
                    @error('fiscalyear_code')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label">เปิดรวบรวมคำขอ </label>
                <div class="col-md-2" wire:ignore>
                    <label class="form-control-label"> ปิด
                      <input type="checkbox" id="req_status" name="req_status" data-plugin="switchery" >
                      <span class="lever"></span> เปิด
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label">ตั้งแต่ </label>
                <div class="col-md-2">
                    <div class="input-group">
                        {!! Form::text('req_startdate', $req_startdate, ['wire:model' => 'req_startdate','id' => 'req_startdate', 'class' => 'form-control', 'data-provide' => 'datepicker','data-date-language' => 'th-th','readonly' => 'true']) !!}
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="icon wb-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    @error('req_startdate')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label">ถึง </label>
                <div class="col-md-2">
                    <div class="input-group">
                        {!! Form::text('req_enddate', $req_startdate, ['wire:model' => 'req_enddate','id' => 'req_enddate', 'class' => 'form-control', 'data-provide' => 'datepicker','data-date-language' => 'th-th','readonly' => 'true']) !!}
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="icon wb-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    @error('req_enddate')
                    <label class="text-danger">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                <button class="btn btn-default btn-outline"><a href="{{ route('request.request1.request1_1.index') }}">ยกเลิก</a></button>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>
@push('js')
<script>
    $('#req_startdate').datepicker({
        orientation: "top"
    }).keydown(function(event) {
        return false;
    });
    $('#req_startdate').change(function(){
        @this.set('req_startdate', $(this).val());
    });
    $('#req_enddate').datepicker({
        orientation: "top"
    }).keydown(function(event) {
        return false;
     });
     $('#req_enddate').change(function(){
        @this.set('req_enddate', $(this).val());
    });
    $('#req_status').change(function(){
        if ($(this).is(':checked')){
            @this.set('req_status', '1');
        }else{
            @this.set('req_status', '0');
        }
    })
</script>
@endpush
