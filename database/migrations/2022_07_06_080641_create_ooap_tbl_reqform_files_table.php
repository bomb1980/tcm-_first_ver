<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapTblReqformFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_tbl_reqform_files', function (Blueprint $table) {
            $table->integer('files_id')->autoIncrement();
            $table->string('files_ori')->nullable(); // Dev Insert
            $table->string('files_gen')->nullable(); // Dev Insert
            $table->string('files_path')->nullable(); // Dev Insert
            $table->string('files_type')->nullable(); // Dev Insert
            $table->string('files_size')->nullable(); // Dev Insert
            $table->integer('reqform_id'); // FK ooap_tbl_reqform

            $table->char('status', 1)->default('0')->comment('0=enable, 1=disable');
            $table->boolean('in_active')->default(false)->comment('0=ปกติ, 1=ลบ');
            $table->string('remember_token', 255)->nullable();
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
        Schema::dropIfExists('ooap_tbl_reqform_files');
    }
}
