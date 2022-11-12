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
            {{-- <label class="form-control-label col-md-1 text-right pr-4">QR Code</label> --}}
            {{-- <button type="button" class="btn btn-primary mx-1 col-md-1 generate-qr-code">ผู้เข้าร่วมโครงการ</button>
            <button type="button" class="btn btn-primary mx-1 col-md-1 generate-qr-code">วิทยากร</button>
            <button type="button" class="btn btn-primary mx-1 col-md-1 generate-qr-code">ผู้นำชุมชน</button> --}}
            <div class="col-md-1">ผู้เข้าร่วมโครงการ</div>
            <div class="col-md-2">{!! QrCode::size(60)->generate('https://ooap.mol.go.th/survey/' . $reqform_id) !!}</div>
            <div class="col-md-1">วิทยากร</div>
            <div class="col-md-2">{!! QrCode::size(60)->generate('https://ooap.mol.go.th/survey/' . $reqform_id) !!}</div>
            <div class="col-md-1">ผู้นำชุมชน</div>
            <div class="col-md-2">{!! QrCode::size(60)->generate('https://ooap.mol.go.th/survey/' . $reqform_id) !!}</div>
            <div class="col-md-1">
                <a href="{{ route('activity.assessment.create') }}" class="btn btn-primary mx-1 w-full">เพิ่ม</a>
            </div>
        </div>
    @endif
    <hr>

    <table class="table table-bordered table-hover table-striped dataTable text-center" id="Datatables">
        <thead>
            <tr>
                <td>เพศ</td>
                <td>อายุ</td>
                <td>สถานะ</td>
                <td>คะแนนรวม</td>
            </tr>
        </thead>
    </table>

    <div class="modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">QR code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div id="qrcode"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
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
