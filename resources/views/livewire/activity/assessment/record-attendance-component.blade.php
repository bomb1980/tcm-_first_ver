<div>
    <div class="form-group row">
        <label class="form-control-label col-md-1 text-right pr-4">ปีงบประมาณ</label>
        {!! Form::select('fiscalyear_code', $fiscalyear_list, $fiscalyear_code, [
            'wire:model' => 'fiscalyear_code',
            'id' => 'fiscalyear_code',
            'class' => 'form-control col-md-2',
            'placeholder' => '--เลือกปีงบประมาณ--',
        ]) !!}
        @error('fiscalyear_code')
            <label class="text-danger">{{ $message }}</label>
        @enderror

        <label class="form-control-label col-md-1 text-right pr-4">หน่วยงาน</label>
        {!! Form::select('dept_id', $dept_list, $dept_id, [
            'wire:model' => 'dept_id',
            'id' => 'dept_id',
            'class' => 'form-control select2 col-md-2',
            'placeholder' => '--เลือกหน่วยงาน--',
        ]) !!}
        @error('dept_id')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group row">
        <label class="form-control-label col-md-1 text-right pr-4">ประเภทกิจกรรม</label>
        {!! Form::select('acttype_id', $acttype_list, $acttype_id, [
            'wire:model' => 'acttype_id',
            'id' => 'acttype_id',
            'class' => 'form-control col-md-2',
            'placeholder' => '--เลือกประเภทกิจกรรม--',
        ]) !!}
        @error('fiscalyear_code')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group row">
        <label class="form-control-label col-md-1 text-right pr-4">เลขที่คำขอ</label>
        {!! Form::select('reqform_id', $reqform_no_list, $reqform_id, [
            'wire:model' => 'reqform_id',
            'id' => 'reqform_id',
            'class' => 'form-control col-md-2',
            'placeholder' => '--เลือกประเภทกิจกรรม--',
        ]) !!}
        @error('fiscalyear_code')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <hr>
    @if ($reqform_id > 0)
        <div class="form-group row">
            <div class="col-md-1 offset-md-10">
                <a href="{{ route('activity.recordattendance.create', ['reqform_id' => $reqform_id]) }}"
                    class="btn btn-primary mx-1 w-full">เพิ่ม</a>
            </div>
        </div>
    @endif
    <hr>
    <table class="table table-bordered table-hover table-striped dataTable text-center" id="Datatables">
        <thead>
            <tr>
                <td>วันที่</td>
                <td>จำนวน</td>
                <td>มา</td>
                <td>ทดแทน</td>
                <td>ขาด</td>
            </tr>
        </thead>
    </table>
</div>

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lrsjng.jquery-qrcode/0.17.0/jquery-qrcode.js"></script>
    <script>
        function button_function() {
            swal({
                    title: "บันทึกข้อมูลเรียบร้อย",
                    type: "success",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                },
                function(isConfirm) {
                    if (isConfirm) {
                        // window.livewire.emit('redirect-to');
                    }
                });
        }

        $('.generate-qr-code').click(function() {
            $('#qrcode').empty();
            $('#qrcode').qrcode({
                text: "testQr"
            });
            $('.modal').show();
        });

        $('.close').click(function() {
            $('.modal').hide();
        })
    </script>
@endpush
