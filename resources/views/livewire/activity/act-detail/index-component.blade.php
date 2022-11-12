<div>
    <div class="form-group row">
        <label class="form-control-label col-md-1 text-right pr-4">ปีงบประมาณ</label>
        {!! Form::select('fiscalyear_code', $fiscalyear_list, null, ['id' => 'fiscalyear_code', 'onchange' => 'setSearch', 'class' => 'form-control col-md-2', 'placeholder' => '--เลือกปีงบประมาณ--']) !!}
        @error('fiscalyear_code')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>

    <div class="row justify-content-end">
        <a href="{{ route('activity.act_detail.create') }}" class="btn btn-primary icon wb-plus btn-md col-md-2 mr-4">
            เพิ่มข้อมูลกิจกรรม</a>
    </div>

    <table class="table table-bordered table-hover table-striped w-full dataTable" id="Datatables">
        <thead>
            <tr>
                <th class="col-1 text-center">ครั้งที่</th>
                {{-- <th class="text-center">รายการ</th> --}}
                <th class="text-center">ชื่อกิจกรรม</th>
                <th class="text-center">ช่วงเวลา</th>
                <th class="text-center">สถานะ</th>
                {{-- <th class="text-center">ยืนยันความพร้อม</th>
                <th class="text-center">จัดการ</th>
                <th class="text-center">เบิกจ่าย</th>
                <th class="text-center">คงเหลือ</th> --}}
            </tr>
        </thead>
    </table>
</div>
