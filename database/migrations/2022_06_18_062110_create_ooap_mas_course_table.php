<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_course', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('code',20)->unique();
            $table->string('name',1000)->unique();
            $table->string('shortname',200);
            $table->string('descp',200)->comment('รายละเอียด');
            $table->integer('dept_id')->comment('รหัสหน่วยงาน เจ้าของหลักสูตร กยผ สรจ');  /*master หน่วยงาน um_mas_department.dept_id*/
            $table->integer('ownertype_id')->comment('แหล่งที่มาหลักสูตร');
            $table->string('ownerdescp',200)->comment('รายละเอียดแหล่งที่มาหลักสูตร');
            $table->integer('acttype_id')->comment('รหัสประเภทกิจกรรม');    /*master ประเภทกิจกรรม  1=กิจกรรมจ้างงานเร่งด่วน  2=กิจกรรมทักษะฝีมือแรงงาน*/
            $table->integer('coursegroup_id')->comment('รหัสกลุ่มหลักสูตร');    /*master รหัสกลุ่มหลักสูตร*/
            $table->integer('coursesubgroup_id')->nullable()->comment('รหัสกลุ่มสาขาอาชีพ');    /*master รหัสกลุ่มสาขาอาชีพ (กลุ่มสาขาอาชีพ)*/
            $table->integer('coursetype_id')->nullable()->comment('รหัสประเภทหลักสูตร');
            $table->string('hour_descp',200)->default(0)->comment('รายละเอียดเกี่ยวกับจำนวนชั่วโมง');
            $table->string('day_descp',200)->default(0)->comment('รายละเอียดเกี่ยวกับจำนวนวันที่ดำเนินการ');
            $table->string('people_descp',200)->default(0)->comment('รายละเอียดเกี่ยวกับจำนวนผู้เข้าร่วม');
            $table->string('trainer_descp',200)->default(0)->comment('รายละเอียดเกี่ยวกับจำนวนวิทยากร');
            $table->char('status',1)->default('0')->nullable()->comment('0=enable, 1=disable');
            $table->boolean('in_active')->default(false)->nullable()->comment('0=ปกติ, 1=ลบ');
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
        Schema::dropIfExists('ooap_mas_course');
    }
}
