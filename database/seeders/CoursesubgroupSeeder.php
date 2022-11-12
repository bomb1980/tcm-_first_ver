<?php

namespace Database\Seeders;

use App\Models\OoapMasCoursesubgroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesubgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OoapMasCoursesubgroup::truncate();

        DB::table('ooap_mas_coursesubgroup')->insert([
            ['code' => '01', 'name' => 'กลุ่มอาชีพช่างเครื่องกล', 'shortname' => 'ช่างเครื่องกล', 'acttype_id' => '2', 'coursegroup_id' => '1', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['code' => '02', 'name' => 'กลุ่มอาชีพช่างไฟฟ้า', 'shortname' => 'ช่างไฟฟ้า', 'acttype_id' => '2', 'coursegroup_id' => '1', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['code' => '03', 'name' => 'กลุ่มอาชีพช่างเครื่องทำความเย็นและเครื่องปรับอากาศ', 'shortname' => 'ช่างเครื่องทำความเย็น', 'acttype_id' => '2', 'coursegroup_id' => '1', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['code' => '04', 'name' => 'กลุ่มอาชีพช่างอิเล็กทรอนิกส์', 'shortname' => 'ช่างอิเล็กทรอนิกส์', 'acttype_id' => '2', 'coursegroup_id' => '1', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['code' => '05', 'name' => 'กลุ่มอาชีพช่างก่อสร้าง', 'shortname' => 'ช่างก่อสร้าง', 'acttype_id' => '2', 'coursegroup_id' => '1', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['code' => '06', 'name' => 'กลุ่มอาชีพในชนบท', 'shortname' => 'อาชีพในชนบท', 'acttype_id' => '2', 'coursegroup_id' => '2', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['code' => '07', 'name' => 'กลุ่มอาชีพเสริม', 'shortname' => 'อาชีพเสริม', 'acttype_id' => '2', 'coursegroup_id' => '3', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['code' => '08', 'name' => 'กลุ่มอาชีพช่างอุตสาหกรรมศิลป์', 'shortname' => 'ช่างอุตสาหกรรมศิลป์', 'acttype_id' => '2', 'coursegroup_id' => '4', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['code' => '09', 'name' => 'กลุ่มอาชีพธุรกิจบริการ', 'shortname' => 'อาชีพธุรกิจบริการ', 'acttype_id' => '2', 'coursegroup_id' => '4', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
        ]);
    }
}
