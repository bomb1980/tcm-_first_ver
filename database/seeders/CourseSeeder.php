<?php

namespace Database\Seeders;

use App\Models\OoapMasCourse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OoapMasCourse::truncate();

        DB::table('ooap_mas_course')->insert([
            ['code' => '01-01-001-64-001', 'name' => 'ช่างซ่อมรถจักรยานยนต์ 1', 'shortname' => '-', 'descp' => '-', 'dept_id' => '1', 'ownertype_id' => '1', 'ownerdescp' => '-', 'acttype_id' => '2', 'coursegroup_id' => '1', 'coursesubgroup_id' => '1', 'coursetype_id' => '1', 'day_descp' => '10', 'people_descp' => '16', 'trainer_descp' => '1', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_at' => '2021-01-01 11:30:30', 'created_by' => 'admin'],
            ['code' => '01-01-002-64-002', 'name' => 'เครื่องยนต์เล็กเพื่อการเกษตร', 'shortname' => '-', 'descp' => '-', 'dept_id' => '1', 'ownertype_id' => '1', 'ownerdescp' => '-', 'acttype_id' => '2', 'coursegroup_id' => '1', 'coursesubgroup_id' => '1', 'coursetype_id' => '2', 'day_descp' => '10', 'people_descp' => '16', 'trainer_descp' => '1', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_at' => '2021-01-01 11:30:30', 'created_by' => 'admin'],
            ['code' => '01-01-65-001', 'name' => 'สาขาช่างซ่อมอุปกรณ์ไฟฟ้า', 'shortname' => '-', 'descp' => '-', 'dept_id' => '1', 'ownertype_id' => '1', 'ownerdescp' => '-', 'acttype_id' => '2', 'coursegroup_id' => '1', 'coursesubgroup_id' => '2', 'coursetype_id' => Null, 'day_descp' => '10', 'people_descp' => '16', 'trainer_descp' => '1', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_by' => 'admin'],
            ['code' => '01-01-65-002', 'name' => 'สาขาช่างเดินสายไฟฟ้าในอาคาร', 'shortname' => '-', 'descp' => '-', 'dept_id' => '1', 'ownertype_id' => '1', 'ownerdescp' => '-', 'acttype_id' => '2', 'coursegroup_id' => '1', 'coursesubgroup_id' => '2', 'coursetype_id' => Null, 'day_descp' => '10', 'people_descp' => '16', 'trainer_descp' => '1', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_by' => 'admin'],
            ['code' => '01-01-65-003', 'name' => 'สาขาการย้ายและติดตั้งเครื่องปรับอากาศในบ้านและการพาณิชย์ขนาดเล็ก', 'shortname' => '-', 'descp' => '-', 'dept_id' => '1', 'ownertype_id' => '1', 'ownerdescp' => '-', 'acttype_id' => '1', 'coursegroup_id' => '2', 'coursesubgroup_id' => '2', 'coursetype_id' => Null, 'day_descp' => '3', 'people_descp' => '16', 'trainer_descp' => '1', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'created_by' => 'admin'],
        ]);
    }
}
