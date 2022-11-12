<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapTblFybdtransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_tbl_fybdtransfer', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->char('fiscalyear_code', 4)->comment('ปีงบประมาณ');
            $table->integer('fybdperiod_id')->comment('รหัสงวดเงิน');
            $table->date('transfer_date')->comment('วันที่รับโอน');
            $table->decimal('transfer_amt',10,2)->comment('จำนวนเงินที่ได้รับโอนจากสำนักงบ');
            $table->string('transfer_desp',2000)->nullable()->default('')->comment('หมายเหตุ');
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
        Schema::dropIfExists('ooap_tbl_fybdtransfer');
    }
}
