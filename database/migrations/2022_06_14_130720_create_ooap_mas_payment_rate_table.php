<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasPaymentRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_payment_rate', function (Blueprint $table) {
            $table->integer('payment_rate_id')->autoIncrement();
            $table->decimal('training_lecturer_amt',10,2)->nullable()->default(0)->comment('ค่าวิทยากร  600/ชม/คน');
            $table->decimal('training_lunch_amt',10,2)->nullable()->default(0)->comment('ค่าอาหารคนเข้าอบรม 120/คน/วัน');
            $table->decimal('training_material_amt',10,2)->nullable()->default(0)->comment('ค่าวัสดุ 1000 คน');
            $table->decimal('training_other_amt',10,2)->nullable()->default(0)->comment('ค่าอื่นๆ  2000 /รุ่น');
            $table->decimal('labour_wage_amt',10,2)->nullable()->default(0)->comment('ค่าแรง วันละ 300/คน/วัน');
            $table->char('status',1)->default('0')->comment('0=enable, 1=disable');
            $table->integer('inactive')->default(0)->comment('0=ปกติ, 1=ลบ');
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('ooap_mas_payment_rate');
    }
}
