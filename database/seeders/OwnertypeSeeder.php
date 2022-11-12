<?php

namespace Database\Seeders;

use App\Models\OoapMasCourseOwnertype;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OoapMasCourseOwnertype::truncate();

        DB::table('ooap_mas_course_ownertype')->insert([
            ['name' => 'กรมพัฒนาฝีมือแรงงาน', 'shortname' => 'กรมพัฒฯ', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['name' => 'สถาบันพัฒนาฝีมือแรงงาน', 'shortname' => 'สพร.', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['name' => 'สำนักงานพัฒนาฝีมือแรงงาน', 'shortname' => 'สนพ.', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['name' => 'สำนักงานแรงงานจังหวัด', 'shortname' => 'สรจ.', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['name' => 'สถานศึกษา', 'shortname' => 'สถานศึกษา', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['name' => 'ปราชญ์ชาวบ้าน', 'shortname' => 'ปราชญ์ชาวบ้าน', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['name' => 'วิทยากร', 'shortname' => 'วิทยากร', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
        ]);
    }
}
