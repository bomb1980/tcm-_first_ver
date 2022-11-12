<?php

namespace Database\Seeders;

use App\Models\OoapTblEmployee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{

    public function run()
    {
        OoapTblEmployee::truncate();

        OoapTblEmployee::insert([
            [
                'role_id' => 3,
                'from_type' => 0,
                'emp_citizen_id' => 'tcmad',
                'title_th' => 'Mr.',
                'fname_th' => 'Admin',
                'lname_th' => 'Super',
                'posit_id' => 2,
                'posit_name_th' => 'ผู้อำนวยการ',
                'positlevel_id' => 15,
                'level_no' => 'D1',
                'positlevel_name' => 'ประเภทอำนวยการ ระดับต้น',
                'direc_id' => 1,
                'direc_name' => 'สำนักงานปลัดกระทรวงแรงงาน',
                'department_id' => null,
                'dept_name_th' => null,
                'division_id' => null,
                'division_name' => null,
                'personal_type_id' => 1,
                'personal_type_name' => 'ข้าราชการ',
                'orgname_id' => 53,
                'orgname_type' => 'ส่วนกลาง',
                'prefix_id' => 1,
                'prefix_name_th' => 'นาย',
                'dep_div_id' => null,
                'start_work' => null,
                'birthday' => null,
                'address' => null,
                'phone' => null,
                'email' => null,
                'remark' => null,
                'status' => 1,
                'in_active' => 0,
                

            ]
        ]);
    }
}
