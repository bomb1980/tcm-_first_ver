<div>
    <div class="form-group row">
        เลขที่คำขอ หน่วยงาน ชื่อประเภทกิจกรรม
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
            <div class="col-md-1 offset-md-11">
                <a href="{{ route('activity.participant.create', ['reqform_id' => $reqform_id]) }}"
                    class="btn btn-primary mx-1 w-full">เพิ่ม</a>
            </div>
        </div>
    @endif
    <table class="table table-bordered table-hover table-striped dataTable text-center" id="Datatables">
        <thead>
            <tr>
                <td>ชื่อ-นามสกุล</td>
                <td>อายุ</td>
                <td>ตำบล</td>
                <td>อำเภอ</td>
                <td>จังหวัด</td>
                <td>อาชีพ</td>
            </tr>
        </thead>
        {{-- @if ($resultReq > 0) --}}
        <tbody>
            @foreach ($resultReq as $value)
                <tr>
                    <td>{{ $value->customer_fname }} {{ $value->customer_lname }}</td>
                    <td>{{ \Carbon\Carbon::parse($value->dateofbirth)->age }}</td>
                    <td>{{ $value->address_tumbol }}</td>
                    <td>{{ $value->address_amphur }}</td>
                    <td>{{ $value->address_province }}</td>
                    <td>{{ $value->occupation_text }}</td>
                </tr>
            @endforeach
        </tbody>
        {{-- @endif --}}
    </table>
</div>

@push('js')
    <script>
        $(function() {
            @if (session()->get('message_create'))
                swal('', 'บันทึกข้อมูลเรียบร้อยแล้ว', 'success');
            @endif

            @if (session()->get('message_edit'))
                swal('', 'แก้ไขข้อมูลเรียบร้อยแล้ว', 'success');
            @endif

            @if (session()->get('message_delete'))
                swal('', 'ลบข้อมูล เรียบร้อยแล้ว', 'success');
            @endif
        });
    </script>
@endpush
