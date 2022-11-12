<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasAmphurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_amphur', function (Blueprint $table) {
            $table->integer('amphur_id')->autoIncrement();
            $table->string('amphur_code', 4)->nullable();
            $table->string('amphur_name', 500)->nullable();
            $table->integer('geo_id');
            $table->integer('province_id');
            // $table->integer('province_code');
            $table->boolean('status')->default(true);
            $table->boolean('in_active')->default(false);
            $table->string('remember_token')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ooap_mas_amphur');
    }
}
