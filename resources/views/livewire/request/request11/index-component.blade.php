<div>
    {{-- <div class="row row-lg">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="form-control-label col-md-1 text-right">ปีงบประมาณ </label>
                <div class="col-md-2">
                    {!! Form::select('budgetyear', $budgetyearSelect, null ,['class' => 'form-control', 'id' => 'budgetyear','placeholder' => 'แสดงทั้งหมด','onchange' => 'callAjax(this.value)']) !!}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row row-lg">
        <div class="col-md-12">
            <table class="table table-bordered table-hover table-striped w-full dataTable" id="Datatables">
                <thead>
                    <tr>
                        {{-- <th class="col-1 text-center">ลำดับ</th> --}}
                        <th class="text-center">ปีงบประมาณ</th>
                        {{-- <th class="text-center">วันที่เริ่มต้น</th>
                        <th class="text-center">วันที่สิ้นสุด</th> --}}
                        <th class="text-center">คำขอ (1)</th>
                        <th class="text-center">เสนองบ (2)</th>
                        <th class="text-center">งบจัดสรร (3)</th>
                        <th class="text-center">รับโอน (4)</th>
                        <th class="text-center">ผูกพัน (5)</th>
                        <th class="text-center">เบิกจ่าย (6)</th>
                        <th class="text-center">คงเหลือ (7)</th>
                        <th class="col-1 text-center">แก้ไข</th>
                        <th class="col-1 text-center">ลบ</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
