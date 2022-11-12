<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasSubmenu1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_submenu1', function (Blueprint $table) {
            $table->integer('submenu1_id')->autoIncrement();
            $table->integer('submenu_id');
            $table->string('submenu1_name', 800)->comment('ชื่อ sub เมนูย่อย');
            $table->string('route_name', 800)->comment('routeเข้าเมนูย่อย');
            $table->integer('display_order');

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
        Schema::dropIfExists('ooap_mas_submenu1');
    }
}
