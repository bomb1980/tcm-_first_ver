<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapTblEmployeesTable extends Migration
{

    public function up()
    {
        Schema::create('ooap_tbl_employees', function (Blueprint $table) {

            $table->integer('emp_id')->autoIncrement()->comment('รหัสพนักงาน');
            $table->integer('role_id')->nullable()->comment('fk');
            $table->string('emp_citizen_id')->nullable()->comment('เลขบัตรปชช.');

            $table->integer('from_type')->default(0)->comment('0=ส่วนกลาง  1=ส่วนภูมิภาค');
            $table->string('title_th')->nullable()->comment('คำนำหน้า - ไทย');
            $table->string('fname_th')->nullable()->comment('ชื่อ - ไทย');
            $table->string('lname_th')->nullable()->comment('นามสกุล - ไทย');
            $table->integer('posit_id')->nullable();
            $table->string('posit_name_th')->nullable();
            $table->integer('positlevel_id')->nullable();
            $table->string('level_no')->nullable();
            $table->string('positlevel_name')->nullable();
            $table->integer('direc_id')->nullable();
            $table->string('direc_name')->nullable();
            $table->integer('department_id')->nullable()->comment('กลุ่มงาน');
            $table->string('dept_name_th')->nullable();
            $table->integer('division_id')->nullable();
            $table->string('division_name')->nullable()->comment('สำนัก/ศูนย์/กอง');
            $table->integer('personal_type_id')->nullable();
            $table->string('personal_type_name')->nullable();
            $table->integer('orgname_id')->nullable();
            $table->string('orgname_type')->nullable();
            $table->integer('prefix_id')->nullable();
            $table->string('prefix_name_th')->nullable();
            $table->integer('dep_div_id')->nullable();

            $table->dateTime('start_work')->nullable()->comment('วันที่เริ่มปฏิบัติราชการ');
            $table->dateTime('birthday')->nullable()->comment('วันเกิด');
            $table->string('address')->nullable()->comment('ที่อยู่ที่ติดต่อได้');
            $table->string('phone')->nullable()->comment('เบอร์ที่ติดต่อได้');
            $table->text('email')->nullable()->comment('อีเมลล์');
            $table->string('remark')->nullable()->comment('หมายเหตุ');
            $table->string('myooapsys')->nullable();

            $table->boolean('status')->default(true);
            $table->boolean('in_active')->default(false);
            $table->string('remember_token')->nullable();
            $table->string('created_by')->nullable()->comment('สร้างโดยใคร');
            $table->string('updated_by')->nullable()->comment('อัพเดทโดยใคร');
            $table->string('deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ooap_tbl_employees');
    }
}
