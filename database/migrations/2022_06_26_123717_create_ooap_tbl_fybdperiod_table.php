<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapTblFybdperiodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_tbl_fybdperiod', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->char('fiscalyear_code', 4)->comment('ปีงบประมาณ');
            $table->integer('period_no')->comment('งวดที่ เช่น 1 2 3 4');
            $table->date('startdate')->comment('วันที่เริ่มงวด');
            $table->date('enddate')->comment('วันที่สิ้นสุดงวด');
            $table->integer('period_month')->comment('จำนวนเงินของงวด');
            $table->decimal('period_rate',10,2)->comment('สัดส่วนเงินประจำงวด');
            $table->decimal('period_amt',10,2)->nullable()->comment('รหัสกลุ่มหลักสูตร');    /*master รหัสกลุ่มหลักสูตร*/
            $table->char('status',1)->default('0')->comment('');
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
        Schema::dropIfExists('ooap_tbl_fybdperiod');
    }
}
