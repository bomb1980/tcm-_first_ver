<div class="panel border border-primary form-group">
    <div class="panel-heading border-bottom border-primary bg-blue-100">
        <div class="row py-md-5  pl-md-20">
            <div class="vertical-align h-60">
                <div class="vertical-align-middle">
                    <span class="h3 blue-800">
                        <i class="icon wb-search pl-20"></i>ค้นหา</span>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {{-- {!! Form::open(['wire:submit.prevent' => 'search()', 'autocomplete' => 'off', 'class' => 'form-horizontal fv-form fv-form-bootstrap4', 'id' => 'exampleStandardForm']) !!} --}}
        <br>
        <div class="row">
            <label class="form-control-label col-sm-1">ปีงบประมาณ</label>
            <div class="col-sm-2 form-group">
                {{-- {!! Form::select('years', $years_list, null, ['wire:model'=> 'years', 'wire:change' =>
                'changeVal("years",$event.target.value)', 'class' => 'form-control', 'id' =>
                'peostatusname', 'placeholder' => 'เลือกปีงบประมาณ']) !!} --}}
            </div>
            <label class="form-control-label col-sm-1">ตั้งแต่วันที่</label>
            <div class="col-sm-2 form-group">
                {{-- <label class="form-control rounded text-left">{{ $st_date }}</label> --}}
            </div>
            <label class="form-control-label">ถึง</label>
            <div class="col-sm-2 form-group">
                {{-- <label class="form-control rounded text-left">{{ $en_date }}</label> --}}
            </div>
            <label class="form-control-label col-sm-1">รวมงบคำขอ</label>
            <div class="col-sm-2 form-group">
                {{-- <label class="form-control rounded text-left">{{ number_format($sumbudgetreq, 2) }}</label> --}}
            </div>
            <label class="form-control-label col-sm-1">สรจ.</label>
            <div class="col-sm-2 form-group">
                {{-- {!! Form::select('department_id', $department_list, null, ['wire:model'=> 'department_id', 'wire:change' =>
                'changeVal("department_id",$event.target.value)', 'class' => 'form-control', 'id' =>
                'peostatusname', 'placeholder' => 'เลือกสรจ.']) !!} --}}
            </div>
            <div class="col-sm-12 text-center">
                <button class="btn btn-primary"><i class="icon wb-search" aria-hidden="true"></i>ค้นหา</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="panel border-primary">
    <div class="panel-heading border-primary bg-blue-100">
        <div class="panel-actions"></div>
        <h3 class="panel-title">กิจกรรมจ้างงานเร่งด่วน</h3>
    </div>
    <div class="panel-body">
        <div class="example table-responsive">
            <table class="table table-bordered">
                <thead class="text-center bg-blue-100">
                    <tr>
                        <th rowspan="2">ลำดับ</th>
                        <th rowspan="2">ชื่อกิจกรรม</th>
                        <th colspan="3">พื้นที่ดำเนินโครงการ</th>
                        <th rowspan="2">วันที่</th>
                        <th rowspan="2">เวลาดำเนินการ</th>
                        <th rowspan="2">จน. วันดำเนินการ</th>
                        <th rowspan="2">เป้าหมาย(คน)</th>
                        <th rowspan="2">งบขอ(เบิก)</th>
                        <th rowspan="2">อนุมัติงบ</th>
                        <th rowspan="2">สถานะโครงการ</th>
                        <th rowspan="2" colspan="3">ตรวจสอบโครงการ</th>
                        <th rowspan="2">แก้ไข</th>
                    </tr>
                    <tr>
                        <th>อำเภอ</th>
                        <th>ตำบล</th>
                        <th>หมู่ที่</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    {{-- <tr>
                        <td>1</td>
                        <td>สร้างซ่อมแซมฝ่ายชะลอน้ำ</td>
                        <td>เพลินจิตร</td>
                        <td>ปทุมวัน</td>
                        <td>12-4</td>
                        <td>01/10/64-15/10/64</td>
                        <td>08.00-16.00 น.</td>
                        <td>15 วัน</td>
                        <td>8 คน</td>
                        <td>44,000</td>
                        <td>0</td>
                        <td class="bg-yellow-100 yellow-800">แบบคำขอ</td>
                        <td>ผ่าน</td>
                        <td>ไม่ผ่าน</td>
                        <td>ส่งแก้ไข</td>
                        <td><a href="http://eoffice.tcmtapp.com/save_request_3_2"><i class="icon wb-pencil yellow-800"></i></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>สร้างแนวกันไฟป่า</td>
                        <td>แจ้งวัฒนะ</td>
                        <td>แจ้งวัฒนะ</td>
                        <td>30</td>
                        <td>01/10/64-15/10/64</td>
                        <td>08.00-16.00 น.</td>
                        <td>15 วัน</td>
                        <td>14 คน</td>
                        <td>70,000</td>
                        <td>0</td>
                        <td class="bg-yellow-100 yellow-800">แบบคำขอ</td>
                        <td>ผ่าน</td>
                        <td>ไม่ผ่าน</td>
                        <td>ส่งแก้ไข</td>
                        <td><a href="http://eoffice.tcmtapp.com/save_request_3_2"><i class="icon wb-pencil yellow-800"></i></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>ซ่อมแซมสิ่งสาธารณะประโยชน์</td>
                        <td>คลองกุ่ม</td>
                        <td>บึงกุ่ม</td>
                        <td>31</td>
                        <td>01/10/64-31/10/64</td>
                        <td>08.00-16.00 น.</td>
                        <td>21 วัน</td>
                        <td>21 คน</td>
                        <td>140,000</td>
                        <td>0</td>
                        <td class="bg-yellow-100 yellow-800">แบบคำขอ</td>
                        <td>ผ่าน</td>
                        <td>ไม่ผ่าน</td>
                        <td>ส่งแก้ไข</td>
                        <td><a href="http://eoffice.tcmtapp.com/save_request_3_2"><i class="icon wb-pencil yellow-800"></i></a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>ซ่อมถนน</td>
                        <td>ทุ่งพญาไทย</td>
                        <td>เขตราชเทวี</td>
                        <td>43</td>
                        <td>01/10/64-31/10/64</td>
                        <td>08.00-16.00 น.</td>
                        <td>24 วัน</td>
                        <td>14 คน</td>
                        <td>110,000</td>
                        <td>0</td>
                        <td class="bg-yellow-100 yellow-800">แบบคำขอ</td>
                        <td>ผ่าน</td>
                        <td>ไม่ผ่าน</td>
                        <td>ส่งแก้ไข</td>
                        <td><a href="http://eoffice.tcmtapp.com/save_request_3_2"><i class="icon wb-pencil yellow-800"></i></a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>ขุดคลองผักตบชวา</td>
                        <td>พญาไท</td>
                        <td>ราชเทวี</td>
                        <td>10</td>
                        <td>01/10/64-11/10/64</td>
                        <td>08.00-16.00 น.</td>
                        <td>10 วัน</td>
                        <td>11 คน</td>
                        <td>43,000</td>
                        <td>0</td>
                        <td class="bg-yellow-100 yellow-800">แบบคำขอ</td>
                        <td>ผ่าน</td>
                        <td>ไม่ผ่าน</td>
                        <td>ส่งแก้ไข</td>
                        <td><a href="http://eoffice.tcmtapp.com/save_request_3_2"><i class="icon wb-pencil yellow-800"></i></a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>สร้างซ่อมแซมฝายชะลอน้ำ</td>
                        <td>แยกคลองเตย</td>
                        <td>คลองเตย</td>
                        <td>30</td>
                        <td>01/10/64-12/10/64</td>
                        <td>08.00-16.00 น.</td>
                        <td>12 วัน</td>
                        <td>14 คน</td>
                        <td>55,000</td>
                        <td>0</td>
                        <td class="bg-yellow-100 yellow-800">แบบคำขอ</td>
                        <td>ผ่าน</td>
                        <td>ไม่ผ่าน</td>
                        <td>ส่งแก้ไข</td>
                        <td><a href="http://eoffice.tcmtapp.com/save_request_3_2"><i class="icon wb-pencil yellow-800"></i></a></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>สร้างแนวกันไฟป่า</td>
                        <td>คลองกุ่ม</td>
                        <td>บึงกุ่ม</td>
                        <td>31</td>
                        <td>01/10/64-19/10/64</td>
                        <td>08.00-16.00 น.</td>
                        <td>18 วัน</td>
                        <td>18 คน</td>
                        <td>110,000</td>
                        <td>0</td>
                        <td class="bg-yellow-100 yellow-800">แบบคำขอ</td>
                        <td>ผ่าน</td>
                        <td>ไม่ผ่าน</td>
                        <td>ส่งแก้ไข</td>
                        <td><a href="http://eoffice.tcmtapp.com/save_request_3_2"><i class="icon wb-pencil yellow-800"></i></a></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>ซ่อมแซมสิ่งสาธารณะประโยชน์</td>
                        <td>สีลม</td>
                        <td>บางรัก</td>
                        <td>10/12</td>
                        <td>01/10/64-11/10/64</td>
                        <td>08.00-16.00 น.</td>
                        <td>8 วัน</td>
                        <td>6 คน</td>
                        <td>24,000</td>
                        <td>0</td>
                        <td class="bg-yellow-100 yellow-800">แบบคำขอ</td>
                        <td>ผ่าน</td>
                        <td>ไม่ผ่าน</td>
                        <td>ส่งแก้ไข</td>
                        <td><a href="http://eoffice.tcmtapp.com/save_request_3_2"><i class="icon wb-pencil yellow-800"></i></a></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>ซ่อมถนน</td>
                        <td>บางนา</td>
                        <td>สุขุมวิท</td>
                        <td>1-11</td>
                        <td>01/10/64-21/10/64</td>
                        <td>08.00-16.00 น.</td>
                        <td>20 วัน</td>
                        <td>20 คน</td>
                        <td>130,000</td>
                        <td>0</td>
                        <td class="bg-yellow-100 yellow-800">แบบคำขอ</td>
                        <td>ผ่าน</td>
                        <td>ไม่ผ่าน</td>
                        <td>ส่งแก้ไข</td>
                        <td><a href="http://eoffice.tcmtapp.com/save_request_3_2"><i class="icon wb-pencil yellow-800"></i></a></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>ขุดคลองผักตบชวา</td>
                        <td>แยกเกษตร</td>
                        <td>บางเขน</td>
                        <td>9-21</td>
                        <td>01/10/64-23/10/64</td>
                        <td>08.00-16.00 น.</td>
                        <td>22 วัน</td>
                        <td>21 คน</td>
                        <td>142,000</td>
                        <td>0</td>
                        <td class="bg-yellow-100 yellow-800">แบบคำขอ</td>
                        <td>ผ่าน</td>
                        <td>ไม่ผ่าน</td>
                        <td>ส่งแก้ไข</td>
                        <td><a href="http://eoffice.tcmtapp.com/save_request_3_2"><i class="icon wb-pencil yellow-800"></i></a></td>
                    </tr> --}}
                </tbody>
                <tfoot class="text-center">
                    <tr>
                        <th colspan="2" class="bg-green-100">ยอดรวม</th>
                        <th colspan="5"></th>
                        <th class="bg-green-100">165 วัน</th>
                        <th class="bg-green-100">147 คน</th>
                        <th class="bg-green-100">868,000</th>
                        <th class="bg-green-100">0</th>
                        <th colspan="6"></th>
                    </tr>
                </tfoot>
            </table>
            {{-- <table class="table table-bordered">
                <thead class="bg-blue-100 text-center">
                    <tr>
                        <th rowspan="3">ลำดับ</th>
                        <th rowspan="3">ชื่อ สรจ.</th>
                        <th rowspan="3">ประภทกิจกรรม</th>
                        <th colspan="2">แบบคำขอ</th>
                        <th colspan="4">รอตรวจสอบ</th>
                        <th colspan="2">เตรียมเสนองบ</th>
                        <th colspan="2">เสนองบ</th>
                        <th rowspan="2" class="red-500 bg-red-100">โครงการไม่ผ่าน</th>
                        <th colspan="2">รวมโครงการ</th>
                    </tr>
                    <tr>
                        <th>จำนวน</th>
                        <th>งบโครงการ</th>
                        <th>สรจ. ส่งตรวจสอบ</th>
                        <th>กยผ. สั่งแก้ไข</th>
                        <th>แก้ไขโดย สรจ.</th>
                        <th>งบโครงการ</th>
                        <th>จำนวน</th>
                        <th>งบโครงการ</th>
                        <th>จำนวน</th>
                        <th>งบโครงการ</th>
                        <th>จำนวน</th>
                        <th>งบโครงการ</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($select_list as $key => $val)
                    <tr class="bg-green-100">
                        <td>{{ $i++ }}</td>
                        <td>{{ $val->dept_short_name }}</td>
                        <td>{{ $activitytype_arr[$val->activitytype] }}</td>

                        <td>{{ number_format($val->sumprojectreq) }}</td>
                        <td>{{ number_format($val->sumbudgetreq) }}</td>

                        <td>{{ number_format($val->sumprojectrew) }}</td>
                        <td>{{ number_format($val->sumprojectnotify) }}</td>
                        <td>{{ number_format($val->sumprojecteditrew) }}</td>
                        <td>{{ number_format($val->sumbudgetrew) }}</td>

                        <td>{{ number_format($val->sumprojectprepare) }}</td>
                        <td>{{ number_format($val->sumbudgetprepare) }}</td>

                        <td>{{ number_format($val->sumprojectpropose) }}</td>
                        <td>{{ number_format($val->sumbudgetpropose) }}</td>

                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="text-center">
                    <tr>
                        <th colspan="2" rowspan="3" class="bg-green-100">ส่งสรุปโครงการ<br>ยอดรวมทั้งหมด</th>
                        <td>จ้างงานเร่งด่วน</td>
                        <td class="add2">40</td>
                        <td class="add24">3,118,500</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td class="add38">-</td>
                        <td class="add3094">-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>40</td>
                        <td>3,118,500</td>
                    </tr>
                    <tr>
                        <td>ทักษะฝีมือแรงงาน</td>
                        <td class="add2">40</td>
                        <td class="add15">696,500</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td class="add38">-</td>
                        <td class="add681">-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>40</td>
                        <td>696,500</td>
                    </tr>
                    <tr>
                        <td>ยอดรวม</td>
                        <td class="add4">80</td>
                        <td class="add39">3,815,000</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td class="add76">-</td>
                        <td class="add3776">-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>80</td>
                        <td>3,815,000</td>
                    </tr>
                </tfoot>
            </table> --}}
        </div>
    </div>
</div>

