<div>
    {{-- <div class="row row-lg">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="form-control-label col-md-1 text-right">ปีงบประมาณ </label>
                <div class="col-md-2">
                    {!! Form::select('budgetyear', $budgetyearSelect, null ,['class' => 'form-control', 'id' =>
                    'budgetyear','placeholder' => 'แสดงทั้งหมด','onchange' => 'callAjax(this.value)']) !!}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row row-lg">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover w-full table-striped dataTable" id="Datatables">
                    <thead>
                        <tr>
                            <th class="text-center" rowspan="2">ปีงบประมาณ</th>
                            <th class="text-center" rowspan="2">คำขอ</th>
                            <th class="text-center" rowspan="2">เสนองบ</th>
                            <th class="text-center" rowspan="2">งบ</th>
                            <th class="text-center" rowspan="2">รับโอน</th>
                            <th class="text-center bg-pink-100" colspan="3">ส่วนกลาง</th>
                            <th class="text-center bg-purple-100" colspan="4">สรจ</th>
                            <th class="text-center" rowspan="2">แก้ไข</th>
                            <th class="text-center" rowspan="2">ลบ</th>
                        </tr>
                        <tr>
                            <th class="text-center bg-pink-100">จัดสรร</th>
                            <th class="text-center bg-pink-100">เบิกจ่าย</th>
                            <th class="text-center bg-pink-100">เงินคงเหลือ</th>
                            <th class="text-center bg-purple-100">จัดสรร</th>
                            <th class="text-center bg-purple-100">โอน</th>
                            <th class="text-center bg-purple-100">เบิกจ่าย</th>
                            <th class="text-center bg-purple-100">เงินคงเหลือ</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
