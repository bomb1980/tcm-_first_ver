<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            BuildingtypeSeeder::class,
            PatternareaSeeder::class,
            provinceSeeder::class,
            amphurSeeder::class,
            TambonSeeder::class,
            troubletypeSeeder::class,
            acttypeSeeder::class,
            // OwnertypeSeeder::class,
            UnitSeeder::class,
            EmployeeSeeder::class,
            RoleSeeder::class,
            // ReqformSeeder::class,
            FiscalyearSeeder::class,
            CourseSeeder::class,
            // CoursetypeSeeder::class,
            // GeopraphySeeder::class,
            CoursegroupSeeder::class,
            CoursesubgroupSeeder::class,
            // Reqformstatus::class,
            // ReqformSeeder::class,
            MenuSeeder::class,
            SubMenuSeeder::class,
            SubMenu1Seeder::class,
            UsersPerSeeder::class,
            LecturerTypesSeeder::class,
        ]);
    }
}
