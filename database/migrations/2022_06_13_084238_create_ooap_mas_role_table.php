<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasRoleTable extends Migration
{
    public function up()
    {
        Schema::create('ooap_mas_role', function (Blueprint $table) {
            $table->integer('role_id')->autoIncrement();
            $table->integer('role_level_id');
            $table->string('role_name')->comment('ชื่อกลุ่มการเข้าใช้งาน');
            $table->string('role_name_th')->comment('ชื่อกลุ่มการเข้าใช้งาน');
            $table->boolean('status')->default(true); // Dev Insert
            $table->boolean('in_active')->default(false); // Dev Insert
            $table->string('create_by')->nullable()->comment('สร้างโดยใคร');
            $table->dateTime('create_date')->nullable()->comment('วันเวลาที่สร้าง');
            $table->string('update_by')->nullable()->comment('อัพเดทโดยใคร');
            $table->dateTime('update_date')->nullable()->comment('วันเวลาที่อัพเดท');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ooap_mas_role');
    }
}
