<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapTblReqformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_tbl_reqform', function (Blueprint $table) {
            $table->integer('reqform_id')->autoIncrement();
            $table->char('reqform_no',20)->nullable()->comment('เลขที่ใบคำขอ');    /*RF-65-0001 RF-YY-NNNN   YY=ปี พศ  NNNN=Running เริ่มใหม่เมื่อเปลี่ยนปี')*/
            $table->char('fiscalyear_code',4)->nullable()->comment('ปีงบประมาณ');  /*master ปีงบประมาณ*/
            $table->integer('dept_id')->nullable()->comment('รหัสหน่วยงาน');  /*master หน่วยงาน um_mas_department.dept_id*/
            $table->integer('acttype_id')->nullable()->comment('รหัสประเภทกิจกรรม'); /*master ประเภทกิจกรรม  1=กิจกรรมจ้างงานเร่งด่วน  2=กิจกรรมทักษะฝีมือแรงงาน*/

            $table->integer('coursegroup_id')->nullable()->comment('รหัสกลุ่มหลักสูตร'); /*master รหัสกลุ่มหลักสูตร*/
            $table->integer('coursesubgroup_id')->nullable()->comment('รหัสกลุ่มสาขาอาชีพ');    /*master รหัสกลุ่มสาขาอาชีพ (กลุ่มสาขาอาชีพ)*/
            $table->integer('course_id')->nullable()->comment('รหัสหลักสูตรอบรม');    /*master กลุ่มย่อยกิจกรรม*/
            $table->string('actname',2000)->nullable()->comment('ชื่อกิจกรรม');
            $table->string('actdetail',2000)->nullable()->default('')->comment('วัตถุประสงค์ รายละเอียด');
            $table->string('actremark',2000)->nullable()->default('')->comment('หมายเหตุ');
            $table->integer('troubletype_id')->nullable()->comment('รหัสประเภทความเดือดร้อน');  /*master ประเภทความเดือดร้อน ooap_mas_troubletype*/
            $table->integer('people_benefit_qty')->nullable()->comment('จำนวนประชาชนในพื้นที่ ที่ได้รับประโยชน์');
            $table->string('local_material',2000)->nullable()->default('')->comment('การใช้วัสดุในชุมชน');

            /*ข้อมูลพื้นที่ดำเนินโครงการ*/
            $table->string('moo',100)->nullable()->comment('หมู่ที่');  /*master หมู่บ้าน  เอาจากระบบไหน ???*/
            $table->integer('province_id')->nullable()->comment('จังหวัด');  /*master จังหวัด  เอาจากระบบไหน ???*/
            $table->integer('amphur_id')->nullable()->comment('ตำบล'); /*master ตำบล เอาจากระบบไหน ???*/
            $table->integer('tambon_id')->nullable()->comment('อำเภอ'); /*master อำเภอ เอาจากระบบไหน ???*/
            $table->string('cmname',2000)->nullable()->comment('ชื่อชุมชน');
            $table->string('cmleader_name',200)->nullable()->comment('ชื่อผู้นำชุมชน');
            $table->string('cmleader_desp',2000)->nullable()->comment('ข้อมูลผู้นำชุมชน');  /*Master ข้อมูลผู้นำชุมชน ooap_mas_communityleader*/
            $table->string('cmleader_position',200)->nullable()->comment('ตำแหน่งผู้นำชุมชน');

            /*ข้อมูลสถานที่ ที่ดำเนินโครงการ เช่น วัด สะพาน ฝายชะลอน้ำ*/
            $table->integer('buildingtype_id')->nullable()->comment('ประเภทสถานที่'); /*Master buildingtype 1.ฝายชะลอน้ำ 2.แนวกันไฟป่า  3.วัด  4.โรงเรียน  5.อื่นๆ*/
            $table->string('building_name',1000)->nullable()->comment('ชื่อสถานที่ เช่น วัด abc');
            $table->string('building_lat',100)->nullable()->comment('พิกัดละติจูด');
            $table->string('building_long',100)->nullable()->comment('พิกัดลองติจูด');

            /*ข้อมูล ระยะทางหรือขนาดพื้นที่ที่ต้องดำเนินการ*/
            $table->integer('patternarea_id')->nullable()->comment('ประเภทพื้นที่่'); /*Master patternarea 0.ไม่ระบุ 1.ปริมาณสำหรับฝายชะลอน้ำ (กxย, ส) 2.ระยะทาง สำหรับแนวกันไฟป่า (กxย)*/
            $table->decimal('area_wide',10,2)->nullable()->comment('กว้าง');
            $table->decimal('area_long',10,2)->nullable()->comment('ยาว');
            $table->decimal('area_high',10,2)->nullable()->comment('ลึก');
            $table->decimal('area_total',10,2)->nullable()->comment('ยอดรวมพื้นที่ตาราง (กว้างxยาว)');
            $table->integer('unit_id')->nullable()->comment('หน่วยวัด'); /*master หน่วยวัด*/

            /*ข้อมูลค่าใช้จ่าย*/
            $table->date('plan_startdate')->nullable()->comment('วันที่เริ่มดำเนินการ');
            $table->date('plan_enddate')->nullable()->comment('วันที่สินสุดดำเนินการ');
            $table->integer('day_qty')->nullable()->default(0)->comment('จำนวนวันที่ดำเนินการ');
            $table->integer('people_qty')->nullable()->default(0)->comment('จำนวนผู้เข้าร่วม');
            $table->integer('trainer_qty')->nullable()->default(0)->comment('จำนวนวิทยากร (6 ชม./วัน)');
            $table->decimal('job_wage_rate',10,2)->nullable()->default(0)->comment('อัตราค่าแรง ต่อคนต่อวัน'); /* กิจกรรมจ้างงาน */
            $table->decimal('couse_lunch_rate',10,2)->nullable()->default(0)->comment('อัตราค่าอาหาร ต่อคนต่อวัน');  /* กิจกรรมอบรม */
            $table->decimal('couse_trainer_rate',10,2)->nullable()->default(0)->comment('อัตราค่าวิทยากร ต่อชม.ต่อวัน');   /* กิจกรรมอบรม */
            $table->decimal('couse_material_rate',10,2)->nullable()->default(0)->comment('อัตราค่าวัสดุฝึกอบรม  ต่อคน');   /* กิจกรรมอบรม */
            $table->decimal('other_rate',10,2)->nullable()->default(0)->comment('อัตราค่าบริหารโครงการ ต่อกิจกรรม');   /* ทั้งกิจกรรมจ้างงาน และ กิจกรรมอบรม */
            $table->decimal('job_wage_amt',10,2)->nullable()->default(0)->comment('ค่าแรง');  /*job_wage_rate  x day_qty x  people_qty*/
            $table->decimal('couse_lunch_amt',10,2)->nullable()->default(0)->comment('ค่าอาหาร');  /*couse_lunch_rate x day_qty x  people_qty*/
            $table->decimal('couse_trainer_amt',10,2)->nullable()->default(0)->comment('ค่าวิทยากร');  /*couse_trainer_rate x day_qty x 6 x trainer_qty*/
            $table->decimal('couse_material_amt',10,2)->nullable()->default(0)->comment( 'ค่าวัสดุฝึกอบรม');   /*couse_material_rate x people_qty*/
            $table->decimal('other_amt',10,2)->nullable()->default(0)->comment('ค่าบริหารโครงการ');   /*other_rate*/
            $table->decimal('total_amt',10,2)->nullable()->default(0)->comment('รวมค่าใช้จ่ายในโครงการ');  /*job_wage_amt + couse_lunch_amt + couse_trainer_amt + couse_material_amt + other_amt*/

            $table->char('status',1)->nullable()->default('0')->comment('1=บันทึกร่าง, 2=รอพิจารณา, 3=ผ่าน, 4=ไม่ผ่าน, 9=ยกเลิก');
            $table->boolean('in_active')->default(false)->comment('0=ปกติ, 1=ลบ');
            $table->string('remember_token',255)->nullable();
            $table->string('created_by', 13)->nullable();
            $table->string('updated_by', 13)->nullable();
            $table->string('deleted_by', 13)->nullable();
            $table->timestamps(); // Dev Insert
            $table->dateTime('deleted_at')->nullable(); // Dev Insert

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ooap_tbl_reqform');
    }
}
