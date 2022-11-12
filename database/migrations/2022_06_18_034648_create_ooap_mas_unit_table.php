<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_unit', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 1000)->nullable();
            $table->string('shotname', 200)->nullable();
            $table->char('status', 1)->nullable()->default('0')->comment('0=enable, 1=diable');
            $table->integer('inactive')->nullable()->default(0)->comment('0=ปกติ, 1=ลบ');
            $table->string('remember_token')->nullable();
            $table->string('create_by', 13)->nullable();
            $table->string('update_by', 13)->nullable();
            $table->string('delete_by', 13)->nullable();
            $table->timestamp('create_date')->nullable();
            $table->timestamp('upadate_date')->nullable();
            $table->timestamp('delete_date')->nullable();
            $table->timestamps(); // Dev Insert
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ooap_mas_unit');
    }
}
