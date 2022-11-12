<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_role_user', function (Blueprint $table) {
            $table->integer('role_user_id')->autoIncrement();
            $table->integer('role_id');
            $table->integer('role_level_id');
            $table->string('username', 20)->comment('รหัสบัตรประชาชน');
            $table->string('fname', 100);
            $table->string('lname', 100);
            $table->integer('dept_id');
            $table->integer('costcenter')->comment('รหัสศูนย์ต้นทุน (กลุ่มงาน)');
            $table->integer('status')->comment('สถานะ (0 = ใช้งาน 1 = ไม่ใช้งาน)');
            $table->string('create_by', 20)->comment('สร้างโดยใคร');
            $table->dateTime('create_date')->comment('วันเวลาที่สร้าง');
            $table->string('update_by', 20)->nullable()->comment('อัพเดทโดยใคร');
            $table->dateTime('update_date')->nullable()->comment('วันเวลาที่อัพเดท');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ooap_mas_role_user');
    }
}
