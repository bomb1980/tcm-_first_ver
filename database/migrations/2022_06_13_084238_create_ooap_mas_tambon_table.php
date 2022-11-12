<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasTambonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_tambon', function (Blueprint $table) {
            $table->integer('tambon_id')->autoIncrement();
            $table->string('tambon_code', 6)->nullable();
            $table->string('postcode', 5)->nullable();
            $table->string('tambon_name', 150)->nullable();
            $table->integer('amphur_id');
            $table->integer('province_id');
            $table->integer('geo_id');
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
        Schema::dropIfExists('ooap_mas_tambon');
    }
}
