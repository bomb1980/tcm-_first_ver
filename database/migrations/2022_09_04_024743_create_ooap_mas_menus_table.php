<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_menu', function (Blueprint $table) {
            $table->integer('menu_id')->autoIncrement();
            $table->string('menu_name')->comment('ชื่อเมนูหลัก');
            $table->integer('display_order')->comment('ลำดับการแสดงผล');
            $table->string('activepage_name')->default()->comment('activepage_name');
            $table->string('menu_icon')->default()->comment('menu_icon');
            $table->boolean('status')->default(true); // Dev Insert
            $table->boolean('in_active')->default(false); // Dev Insert
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
        Schema::dropIfExists('ooap_mas_menu');
    }
}
