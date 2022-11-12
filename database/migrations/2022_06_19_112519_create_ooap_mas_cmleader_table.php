<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasCmleaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_cmleader', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('cmleader_prefix',20)->comment('คำนำหน้าชื่อ');
            $table->string('cmleader_name',100);
            $table->string('cmleader_surname',100)->nullable();
            $table->integer('cmleaderjob_id')->default(0)->comment('อาชีพผู้นำชุมชน');
            $table->string('moo',100)->nullable();
            $table->integer('province_id')->nullable()->comment('จังหวัด');
            $table->integer('amphur_id')->nullable()->comment('ตำบล');
            $table->integer('tambon_id')->nullable()->comment('อำเภอ');
            $table->date('cmleader_birthdate')->nullable();
            $table->string('cmleader_tel',100)->nullable();
            $table->string('cmleader_fax',100)->nullable();
            $table->string('cmleader_mobile',100)->nullable();
            $table->string('cmleader_email',320)->nullable();
            $table->char('status',1)->default('0')->comment('0=enable, 1=disable');
            $table->boolean('in_active')->default(false)->comment('0=ปกติ, 1=ลบ');
            $table->string('remember_token',255);
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
        Schema::dropIfExists('ooap_mas_cmleader');
    }
}
