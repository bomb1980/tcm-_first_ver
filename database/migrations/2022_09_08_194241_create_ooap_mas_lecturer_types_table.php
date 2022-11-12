<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasLecturerTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_lecturer_types', function (Blueprint $table) {
            $table->integer('lecturer_types_id')->autoIncrement();
            $table->string('lecturer_types_name')->nullable();

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
        Schema::dropIfExists('ooap_mas_lecturer_types');
    }
}
