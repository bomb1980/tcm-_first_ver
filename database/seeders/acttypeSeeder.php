<?php

namespace Database\Seeders;

use App\Models\OoapMasActtype;
use Illuminate\Database\Seeder;

class ActtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OoapMasActtype::truncate();

        OoapMasActtype::insert(
            [
                ['name' => 'กิจกรรมจ้างงานเร่งด่วน', 'shortname' => '', 'job_wage_maxrate' => '0', 'couse_lunch_maxrate' => '120', 'couse_trainer_maxrate' => '600', 'couse_material_maxrate' => '2000'],
                ['name' => 'กิจกรรมทักษะฝีมือแรงงาน', 'shortname' => '', 'job_wage_maxrate' => '0', 'couse_lunch_maxrate' => '120', 'couse_trainer_maxrate' => '600', 'couse_material_maxrate' => '2000'],
            ]
        );
    }
}
