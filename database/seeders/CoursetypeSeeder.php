<?php

namespace Database\Seeders;

use App\Models\OoapMasCoursetype;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OoapMasCoursetype::truncate();

        DB::table('ooap_mas_coursetype')->insert([
            ['code' => '001', 'name' => 'ประเภทรถจักรยานยนต์', 'shortname' => '...', 'coursegroup_id' => '1', 'coursesubgroup_id' => '1', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['code' => '002', 'name' => 'ประเภทเครื่องยนต์หนักและเครื่องยนต์การเกษตร', 'shortname' => '...', 'coursegroup_id' => '1', 'coursesubgroup_id' => '1', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
        ]);
    }
}
