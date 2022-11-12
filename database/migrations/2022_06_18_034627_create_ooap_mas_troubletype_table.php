<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasTroubletypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_troubletype', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 1000);
            $table->string('shotname', 200)->nullable();
            $table->char('status', 1)->nullable()->default('0')->comment('0=enable, 1=disable');
            $table->integer('inactive')->nullable()->default(0)->comment('0=ปกติ, 1=ลบ');
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
        Schema::dropIfExists('ooap_mas_troubletype');
    }
}
