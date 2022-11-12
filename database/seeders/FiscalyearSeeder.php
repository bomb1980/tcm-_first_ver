<?php

namespace Database\Seeders;

use App\Models\OoapTblFiscalyear;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiscalyearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OoapTblFiscalyear::truncate();

        DB::table('ooap_tbl_fiscalyear')->insert([
            ['fiscalyear_code' => '2564', 'startdate' => '2021-10-01', 'enddate' => '2022-09-30', 'req_status' => '1', 'req_startdate' => '2021-10-01', 'req_enddate' => '2022-09-30', 'req_amt' => '45000', 'budget_amt' => '45000', 'centerbudget_amt' => '12000', 'regionbudget_amt' => '30000', 'status' => '3', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['fiscalyear_code' => '2565', 'startdate' => '2022-10-01', 'enddate' => '2023-09-30', 'req_status' => '1', 'req_startdate' => '2022-10-01', 'req_enddate' => '2024-09-30', 'req_amt' => '45000', 'budget_amt' => '45000', 'centerbudget_amt' => '12000', 'regionbudget_amt' => '30000', 'status' => '3', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
            ['fiscalyear_code' => '2566', 'startdate' => '2023-10-01', 'enddate' => '2024-09-30', 'req_status' => '1', 'req_startdate' => '2023-10-01', 'req_enddate' => '2025-09-30', 'req_amt' => '45000', 'budget_amt' => '45000', 'centerbudget_amt' => '12000', 'regionbudget_amt' => '30000', 'status' => '3', 'remember_token' => 'V1XaCZykaKMlVlAvPVfaGpHkwMT716PmAg10W4cS', 'created_by' => 'admin'],
        ]);
    }
}
