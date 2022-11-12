<?php


namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\UmMasDepartment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::truncate();
        Role::truncate();

        UmMasDepartment::truncate();

        DB::table('role_user')->truncate();

        DB::table('users')->insert([
            ['name' => 'user', 'email' => 'user@user.com', 'password' => Hash::make('admin1234')],
            ['name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('admin1234')],

            ['name' => 'superadmin', 'email' => 'superadmin@superadmin.com', 'password' => Hash::make('admin1234')],
        ]);

        DB::table('roles')->insert(
            [
                ['name' => 'ROLE_USER', 'description' => 'สมาชิกทั่วไป'],
                ['name' => 'ROLE_ADMIN', 'description' => 'ผู้ดูแลระบบ'],
                ['name' => 'ROLE_SUPERADMIN', 'description' => 'ผู้ดูแลระบบสูงสุด']
            ]
        );

        DB::table('role_user')->insert(
            [
                ['role_id' => '1', 'user_id' => '1'],
                ['role_id' => '2', 'user_id' => '2'],
                ['role_id' => '3', 'user_id' => '3'],
            ]
        );

        UmMasDepartment::insert([
            ['dept_code' => '0001', 'dept_name_th' => 'สรจ. กรุงเทพ', 'dept_short_name' => 'สรจ. กรุงเทพ ', 'address' => '-', 'district' => 1, 'aumpur' => 1, 'province' => 1, 'postcode' => 000010, 'phone' => '025511411', 'email' => 'KK@GMAIL.COM', 'branch_type_id' => 1]
        ]);
    }
}
