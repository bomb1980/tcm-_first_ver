<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasProvinceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_province', function (Blueprint $table) {
            $table->integer('province_id')->autoIncrement();
            $table->string('province_code', 3)->nullable();
            $table->string('province_name', 150)->nullable();
            $table->integer('geo_id');
            $table->boolean('status')->default(true);
            $table->boolean('in_active')->default(false);
            $table->string('remember_token')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('deleted_at')->nullable();
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
        Schema::dropIfExists('ooap_mas_province');
    }
}
