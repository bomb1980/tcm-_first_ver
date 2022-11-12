<?php

namespace Database\Seeders;

use App\Models\OoapMasTroubletype;
use Illuminate\Database\Seeder;

class TroubletypeSeeder extends Seeder
{
    public function run()
    {
        OoapMasTroubletype::truncate();

        OoapMasTroubletype::insert([
            ['name' => 'ภัยธรรมชาติ', 'shotname' => '', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['name' => 'ภัยแล้ง', 'shotname' => '', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['name' => 'อทุกภัย', 'shotname' => '', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['name' => 'อื่นๆ', 'shotname' => '', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
        ]);
    }
}
