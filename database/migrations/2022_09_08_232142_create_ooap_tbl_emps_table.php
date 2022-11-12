<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapTblEmpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_tbl_emps', function (Blueprint $table) {

            $table->integer('emps_id')->autoIncrement();
            $table->string('identification_id')->nullable();
            $table->string('customer_fname')->nullable();
            $table->string('customer_lname')->nullable();
            $table->string('sex')->nullable();
            $table->string('dateofbirth')->nullable();
            $table->string('status_id')->nullable();
            $table->string('address_number')->nullable();
            $table->string('address_moo')->nullable();
            $table->string('address_tumbol')->nullable();
            $table->string('address_amphur')->nullable();
            $table->string('address_province')->nullable();
            $table->string('mobile')->nullable();
            $table->string('occupation_text')->nullable();

            $table->integer('view_data')->nullable();
            $table->integer('insert_data')->nullable();
            $table->integer('update_data')->nullable();
            $table->integer('delete_data')->nullable();

            $table->char('status', 1)->default('0')->comment('0=enable, 1=disable'); // Dev Insert
            $table->boolean('in_active')->default(false)->comment('0=ปกติ, 1=ลบ'); // Dev Insert
            $table->string('remember_token')->nullable(); // Dev Insert
            $table->string('created_by')->nullable()->comment('สร้างโดยใคร'); // Dev Insert
            $table->string('updated_by')->nullable()->comment('อัพเดทโดยใคร'); // Dev Insert
            $table->string('deleted_by')->nullable(); // Dev Insert
            $table->timestamps(); // Dev Insert
            $table->timestamp('deleted_at')->nullable(); // Dev Insert
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ooap_tbl_emps');
    }
}
