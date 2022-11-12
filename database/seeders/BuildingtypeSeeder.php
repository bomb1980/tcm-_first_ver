<?php

namespace Database\Seeders;

use App\Models\OoapMasBuildingtype;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OoapMasBuildingtype::truncate();

        DB::table('ooap_mas_buildingtypes')->insert([
            ['name' => 'แหล่งน้ำ', 'shortname' => '...'],
            ['name' => 'แนวกั้นไฟป่า', 'shortname' => '...'],
            ['name' => 'วัด', 'shortname' => '...'],
            ['name' => 'โรงเรียน', 'shortname' => '...'],
            ['name' => 'มัสยิด', 'shortname' => '...'],
            ['name' => 'อื่นๆ', 'shortname' => '...'],
        ]);
    }
}
