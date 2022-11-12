<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapTblReqmEmpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_tbl_reqm_emps', function (Blueprint $table) {
       //     $table->id();
            $table->integer('reqform_id')->autoIncrement();
            $table->string('emps_id')->nullable();

            $table->string('emps_replace')->nullable();
            $table->integer('status')->nullable();
            $table->date('join_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ooap_tbl_reqm_emps');
    }
}
