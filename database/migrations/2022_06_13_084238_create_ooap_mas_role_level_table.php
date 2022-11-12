<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasRoleLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_role_level', function (Blueprint $table) {
            $table->integer('role_level_id')->autoIncrement();
            $table->string('role_level_name', 100)->comment('ขื่อระดับการเข้าถึง (ผู้ดูแลระบบ, ผู้ใช้งานทั่วไป, ผู้อนุมัติลำดับ 1, ผู้อนุมัติลำดับ 2)');
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
        Schema::dropIfExists('ooap_mas_role_level');
    }
}
