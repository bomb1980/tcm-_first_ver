<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmMasDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('um_mas_department', function (Blueprint $table) {
            $table->integer('dept_id')->autoIncrement();
            $table->integer('dept_code');
            $table->string('dept_name_th', 255);
            $table->string('dept_short_name', 100);
            $table->string('address');
            $table->string('district', 150);
            $table->string('aumpur', 150)->nullable();
            $table->string('province', 150);
            $table->string('postcode', 50);
            $table->string('phone', 10);
            $table->string('email', 20);
            $table->integer('branch_type_id');
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
        Schema::dropIfExists('um_mas_department');
    }
}
