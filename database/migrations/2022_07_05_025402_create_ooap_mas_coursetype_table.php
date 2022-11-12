<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasCoursetypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('ooap_mas_coursetype', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('code',20)->nullable()->unique();
            $table->string('name',1000)->unique();
            $table->string('shortname',200)->nullable();
            $table->integer('coursegroup_id')->nullable()->comment('รหัสกลุ่มหลักสูตร');    /*master รหัสกลุ่มหลักสูตร*/
            $table->integer('coursesubgroup_id')->nullable()->comment('รหัสกลุ่มสาขาอาชีพ');    /*master รหัสกลุ่มสาขาอาชีพ (กลุ่มสาขาอาชีพ)*/
            $table->char('status',1)->default('0')->comment('0=enable, 1=disable');
            $table->boolean('in_active')->default(false)->comment('0=ปกติ, 1=ลบ');
            $table->string('remember_token',255)->unique();
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
        Schema::dropIfExists('ooap_mas_coursetype');
    }
}
