<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapTblFiscalyearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_tbl_fiscalyear', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->char('fiscalyear_code', 4)->unique()->comment('ปีงบประมาณ');
            $table->date('startdate')->nullable()->comment('วันที่เริ่มงบฯ');
            $table->date('enddate')->nullable()->comment('วันที่สิ้นสุดงบ');
            $table->char('req_status',1)->default('0')->comment('0=ปิดรวมรวมคำขอ, 1=เปิดบันทึกคำขอ');
            $table->date('req_startdate')->nullable()->comment('วันที่เริ่มรวมรวมคำขอ');
            $table->date('req_enddate')->nullable()->comment('วันที่สิ้นสุดรวมรวมคำขอ');
            $table->decimal('req_amt',10,2)->default(0)->comment('ยอดเสนองบประมาณ');
            $table->decimal('budget_amt',10,2)->default(0)->comment('ยอดงบประมาณประจำปี ที่สำนักงบอนุมัติ');
            $table->decimal('refund_amt',10,2)->default(0)->comment('เงินเบิกเกินส่งคืน');

            $table->decimal('ostbudget_amt',10,2)->default(0)->comment('จำนวนเงินรอจัดสรร outstanding amount');
            $table->decimal('centerbudget_amt',10,2)->default(0)->comment('จำนวนเงินจัดสรรให้ส่วนกลาง'); /* ค่าบริหารส่วนกลาง    บันทีกจากหน้าบริหารงบส่วนกลาง*/
            $table->decimal('regionbudget_amt',10,2)->default(0)->comment('จำนวนเงินจัดสรรให้ส่วนภูมิภาค');  /* ค่าบริหาร + ค่าดำเนินกิจกรรม   บันทีกจากหน้าบริหารงบส่วนกลาง*/

            $table->char('status',1)->default('0')->comment('1=รวบรวมคำขอ, 2=สรุปคำของบ, 3=อนุมัติงบ 4=ปิดปีงบประมาณ');
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
        Schema::dropIfExists('ooap_tbl_fiscalyear');
    }
}
