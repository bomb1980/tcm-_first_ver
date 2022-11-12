<div>
    <div class="row">
        <div class="col-md-2">
            <select class="form-control form-group select2">
                <option value="">--เลือกปีงบประมาณ--</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control form-group select2">
                <option value="">--ประเภทโครงการ--</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control form-group select2">
                <option value="">--ชื่อกลุ่มสาขาอาชีพ--</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control form-group select2">
                <option value="">--ประเภทความเดือดร้อน--</option>
            </select>
        </div>
        <div class="col-md-2 input-group form-group">
            <input type="search" id="form1" class="form-control" />
            <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ปีงบประมาณ</th>
                    <th>ประเภทโครงการ</th>
                    <th>ชื่อกลุ่มหลักสูตร</th>
                    <th>ชื่อกลุ่มสาขาอาชีพ</th>
                    <th>ชื่อโครงการ</th>
                    <th>ประเภทความเดือดร้อน</th>
                    <th>วันที่เริ่มต้น</th>
                    <th>วันที่สิ้นสุด</th>
                    <th>สถานะโครงการ</th>
                    <th>แก้ไข</th>
                    {{-- <th>ลบ</th> --}}
                </tr>
            </thead>
        </table>
    </div>
</div>
@push('js')
    <script>
        Livewire.on('emits', () => {
            $('.select2').select2();
        });
        // $('.select2').select2();
    </script>
@endpush
