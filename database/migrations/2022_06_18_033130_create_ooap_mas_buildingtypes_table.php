<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasBuildingtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_buildingtypes', function (Blueprint $table) {
            $table->integer('buildingtype_id')->autoIncrement();
            $table->string('name', 1000);
            $table->string('shortname', 200);

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
        Schema::dropIfExists('ooap_mas_buildingtypes');
    }
}
