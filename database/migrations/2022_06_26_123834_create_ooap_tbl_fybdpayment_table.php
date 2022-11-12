<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapTblFybdpaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_tbl_fybdpayment', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->char('fiscalyear_code', 4)->comment('ปีงบประมาณ');
            $table->date('pay_date')->comment('วันที่รับโอน');
            $table->decimal('pay_amt',10,2)->comment('จำนวนเงินที่ได้รับโอนจากสำนักงบ');
            $table->string('pay_name',2000)->default('')->comment('ข้อมูลรายการเบิกจ่าย');
            $table->string('pay_desp',2000)->default('')->comment('หมายเหตุ');
            $table->char('status',1)->default('0')->comment('');
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
        Schema::dropIfExists('ooap_tbl_fybdpayment');
    }
}
