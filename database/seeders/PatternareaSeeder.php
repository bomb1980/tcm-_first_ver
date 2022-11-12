<?php

namespace Database\Seeders;

use App\Models\OoapMasPatternarea;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatternareaSeeder extends Seeder
{
    public function run()
    {
        OoapMasPatternarea::truncate();

        OoapMasPatternarea::insert([
            ['name' => 'ไม่ระบุ'],
            ['name' => 'รูปแบบลูกบาศก์'],
            ['name' => 'รูปแบบตาราง'],
        ]);
    }
}
