<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOoapMasActtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ooap_mas_acttype', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 1000);
            $table->string('shortname', 200)->nullable();
            $table->decimal('job_wage_maxrate', 10)->default(0)->comment('อัตราค่าแรง ต่อคนต่อวัน');
            $table->decimal('couse_lunch_maxrate', 10)->default(0)->comment('อัตราค่าอาหาร ต่อคนต่อวัน');
            $table->decimal('couse_trainer_maxrate', 10)->default(0)->comment('อัตราค่าวิทยากร ต่อชม.ต่อวัน)');
            $table->decimal('couse_material_maxrate', 10)->default(0)->comment('อัตราค่าวัสดุฝึกอบรม  ต่อคน');
            $table->decimal('other_maxrate', 10)->default(0)->comment('อัตราค่าบริหารโครงการ ต่อกิจกรรม');
            // $table->decimal('job_wage_rate',10,2)->default(0)->comment('อัตราค่าแรง ต่อคนต่อวัน');
            // $table->decimal('couse_lunch_rate',10,2)->default(0)->comment('ัตราค่าอาหาร ต่อคนต่อวัน');
            // $table->decimal('couse_trainer_rate',10,2)->default(0)->comment('ัตราค่าวิทยากร ต่อชม.ต่อวัน');
            // $table->decimal('couse_material_rate',10,2)->default(0)->comment('อัตราค่าวัสดุฝึกอบรม  ต่อคน');
            // $table->decimal('other_rate',10,2)->default(0)->comment('อัตราค่าบริหารโครงการ ต่อกิจกรรม');
            $table->char('status', 1)->nullable()->default('0')->comment('0=enable, 1=diable');
            $table->integer('inactive')->nullable()->default(0)->comment('0=ปกติ, 1=ลบ');
            $table->string('remember_token')->nullable();
            $table->string('create_by', 13)->nullable();
            $table->string('update_by', 13)->nullable();
            $table->string('delete_by', 13)->nullable();
            $table->timestamp('create_date')->nullable();
            $table->timestamp('upadate_date')->nullable();
            $table->timestamp('delete_date')->nullable();
            $table->timestamps(); // Dev Insert
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ooap_mas_acttype');
    }
}
