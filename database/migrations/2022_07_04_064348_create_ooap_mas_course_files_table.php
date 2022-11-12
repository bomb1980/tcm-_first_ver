<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasCourseFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_course_files', function (Blueprint $table) {
            $table->integer('files_id')->autoIncrement();
            $table->string('files_ori')->nullable(); // Dev Insert
            $table->string('files_gen')->nullable(); // Dev Insert
            $table->string('files_path')->nullable(); // Dev Insert
            $table->string('files_type')->nullable(); // Dev Insert
            $table->string('files_size')->nullable(); // Dev Insert
            $table->integer('course_id'); // FK report

            $table->boolean('status')->default(true); // Dev Insert
            $table->boolean('in_active')->default(false); // Dev Insert
            $table->string('remember_token')->nullable(); // Dev Insert
            $table->string('created_by')->nullable(); // Dev Insert
            $table->string('updated_by')->nullable(); // Dev Insert
            $table->string('deleted_by')->nullable(); // Dev Insert
            $table->timestamps(); // Dev Insert
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ooap_mas_course_files');
    }
}
