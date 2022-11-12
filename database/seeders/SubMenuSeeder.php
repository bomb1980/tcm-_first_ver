<?php

namespace Database\Seeders;

use App\Models\OoapMasSubmenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OoapMasSubmenu::truncate();
        DB::table('ooap_mas_submenu')->insert([
            // ['submenu_id' => 1,  'menu_id' => '1', 'submenu_name' => 'สร้างแบบฟอร์มประเมินผู้เข้าร่วมกิจกรรมจ้างงานเร่งด่วน', 'route_name' => '', 'display_order' => 1, 'created_by' => 'seeder'],
            // ['submenu_id' => 2,  'menu_id' => '1', 'submenu_name' => 'สร้างแบบฟอร์มประเมินผู้นำชุมชนประเมินกิจกรรมจ้างงานเร่งด่วน', 'route_name' => '', 'display_order' => 2, 'created_by' => 'seeder'],
            // ['submenu_id' => 3,  'menu_id' => '1', 'submenu_name' => 'สร้างแบบฟอร์มผู้เข้าอบรมประเมินภาพรวมกิจกรรมทักษะฝีมือแรงงาน', 'route_name' => '', 'display_order' => 3, 'created_by' => 'seeder'],
            // ['submenu_id' => 4,  'menu_id' => '1', 'submenu_name' => 'สร้างแบบฟอร์มวิทยากรประเมินภาพรวมกิจกรรมทักษะฝีมือแรงงาน', 'route_name' => '', 'display_order' => 4, 'created_by' => 'seeder'],
            // ['submenu_id' => 5,  'menu_id' => '1', 'submenu_name' => 'สร้างแบบฟอร์มผู้นำชุมชนประเมินภาพรวมกิจกรรมทักษะฝีมือแรงงาน', 'route_name' => '', 'display_order' => 5, 'created_by' => 'seeder'],
            // ['submenu_id' => 6,  'menu_id' => '1', 'submenu_name' => 'สร้างแบบฟอร์มประเมินติดตามผลผู้เข้าร่วมโครงการกิจกรรมทักษะฝีมือแรงงาน', 'route_name' => '', 'display_order' => 6, 'created_by' => 'seeder'],
            // ['submenu_id' => 7,  'menu_id' => '1', 'submenu_name' => 'บันทึกเวลาเข้าร่วมกิจกรรม', 'route_name' => 'activity.join_activity.index', 'display_order' => 7, 'created_by' => 'seeder'],

            ['submenu_id' => 1,  'menu_id' => '1', 'submenu_name' => 'ข้อมูลปีงบประมาณ', 'route_name' => 'master.fiscalyear.index', 'display_order' => 1, 'created_by' => 'seeder'],
            ['submenu_id' => 2,  'menu_id' => '1', 'submenu_name' => 'ข้อมูลกลุ่มหลักสูตร', 'route_name' => 'master.coursegroup.index', 'display_order' => 2, 'created_by' => 'seeder'],
            ['submenu_id' => 3,  'menu_id' => '1', 'submenu_name' => 'ข้อมูลกลุ่มสาขาอาชีพ', 'route_name' => 'master.coursesubgroup.index', 'display_order' => 3, 'created_by' => 'seeder'],
            ['submenu_id' => 4,  'menu_id' => '1', 'submenu_name' => 'ข้อมูลประเภทหลักสูตร', 'route_name' => 'master.coursetype.index', 'display_order' => 4, 'created_by' => 'seeder'],
            ['submenu_id' => 5,  'menu_id' => '1', 'submenu_name' => 'ข้อมูลหลักสูตรอบรม', 'route_name' => 'master.course.index', 'display_order' => 5, 'created_by' => 'seeder'],
            ['submenu_id' => 6,  'menu_id' => '1', 'submenu_name' => 'ข้อมูลแหล่งที่มาของหลักสูตร', 'route_name' => 'master.ownertype.index', 'display_order' => 6, 'created_by' => 'seeder'],
            ['submenu_id' => 7,  'menu_id' => '1', 'submenu_name' => 'ข้อมูลสิ่งปลูกสร้าง', 'route_name' => 'master.buildingtype.index', 'display_order' => 7, 'created_by' => 'seeder'],
            ['submenu_id' => 8,  'menu_id' => '1', 'submenu_name' => 'ข้อมูลประเภทความเดือดร้อน', 'route_name' => 'master.troubletype.index', 'display_order' => 8, 'created_by' => 'seeder'],
            ['submenu_id' => 9,  'menu_id' => '1', 'submenu_name' => 'กิจกรรมจ้างงานเร่งด่วน', 'route_name' => 'master.assessment_topic.index', 'display_order' => 9, 'created_by' => 'seeder'],
            ['submenu_id' => 10,  'menu_id' => '1', 'submenu_name' => 'ทะเบียนคุมวิทยากร', 'route_name' => 'master.lecturer.index', 'display_order' => 10, 'created_by' => 'seeder'],

            ['submenu_id' => 11,  'menu_id' => '2', 'submenu_name' => 'บันทึกข้อมูลคำขอรับการจัดสรรงบประมาณ', 'route_name' => 'request.request2_3.index', 'display_order' => 1, 'created_by' => 'seeder'],
            ['submenu_id' => 12,  'menu_id' => '2', 'submenu_name' => 'บันทึกผลการพิจารณาคำขอรับการจัดสรรงบประมาณ', 'route_name' => 'request.request3.request3_3.index', 'display_order' => 2, 'created_by' => 'seeder'],
            ['submenu_id' => 13,  'menu_id' => '2', 'submenu_name' => 'บันทึกข้อมูลการเสนองบประมาณ', 'route_name' => 'request.sum_list.index', 'display_order' => 3, 'created_by' => 'seeder'],

            ['submenu_id' => 14,  'menu_id' => '3', 'submenu_name' => 'ข้อมูลงบประมาณ', 'route_name' => 'manage.fiscal.index', 'display_order' => 1, 'created_by' => 'seeder'],
            ['submenu_id' => 15,  'menu_id' => '3', 'submenu_name' => 'ข้อมูลงวดเงิน', 'route_name' => 'manage.installment.index', 'display_order' => 2, 'created_by' => 'seeder'],
            ['submenu_id' => 16,  'menu_id' => '3', 'submenu_name' => 'รับโอนเงินจาก สนง.', 'route_name' => 'manage.receivetransfer.index', 'display_order' => 3, 'created_by' => 'seeder'],
            ['submenu_id' => 17,  'menu_id' => '3', 'submenu_name' => 'จัดสรรงบประมาณ', 'route_name' => 'manage.local_mng.index', 'display_order' => 4, 'created_by' => 'seeder'],
            ['submenu_id' => 18,  'menu_id' => '3', 'submenu_name' => 'เบิกค่าใช้จ่ายส่วนกลาง', 'route_name' => 'manage.cen_depo.index', 'display_order' => 5, 'created_by' => 'seeder'],
            ['submenu_id' => 19,  'menu_id' => '3', 'submenu_name' => 'ปิดปีงบประมาณ', 'route_name' => 'manage.fiscalyear_cls.index', 'display_order' => 6, 'created_by' => 'seeder'],

            ['submenu_id' => 20,  'menu_id' => '4', 'submenu_name' => 'ข้อมูลกิจกรรม', 'route_name' => 'activity.act_detail.index', 'display_order' => 1, 'created_by' => 'seeder'],
            ['submenu_id' => 21,  'menu_id' => '4', 'submenu_name' => 'บันทึกยืนยันความพร้อมคำขอรับการจัดสรรงบ(สรจ)', 'route_name' => 'activity.ready_confirm.index', 'display_order' => 2, 'created_by' => 'seeder'],
            ['submenu_id' => 22,  'menu_id' => '4', 'submenu_name' => 'จัดสรรโอนเงิน', 'route_name' => 'activity.tran_mng.index', 'display_order' => 3, 'created_by' => 'seeder'],
            ['submenu_id' => 23,  'menu_id' => '4', 'submenu_name' => 'บันทึกข้อมูลปรับแผน/โครงการ(สรจ)', 'route_name' => 'activity.plan_adjust.index', 'display_order' => 4, 'created_by' => 'seeder'],
            ['submenu_id' => 24,  'menu_id' => '4', 'submenu_name' => 'บันทึกผู้เข้าร่วมกิจกรรม(สรจ)', 'route_name' => 'activity.participant.index', 'display_order' => 5, 'created_by' => 'seeder'],

            ['submenu_id' => 25,  'menu_id' => '5', 'submenu_name' => 'บันทึกเวลาเข้าร่วมกิจกรรม', 'route_name' => 'activity.recordattendance.index', 'display_order' => 1, 'created_by' => 'seeder'],
            ['submenu_id' => 26,  'menu_id' => '5', 'submenu_name' => 'บันทึกแบบประเมิน', 'route_name' => 'activity.assessment.index', 'display_order' => 2, 'created_by' => 'seeder'],
            ['submenu_id' => 27,  'menu_id' => '5', 'submenu_name' => 'บันทึกค่าใช้จ่ายอื่นๆ', 'route_name' => 'activity.other_expense.index', 'display_order' => 3, 'created_by' => 'seeder'],
            ['submenu_id' => 28,  'menu_id' => '5', 'submenu_name' => 'บันทึกรูปกิจกรรม', 'route_name' => 'activity.activity_image.index', 'display_order' => 4, 'created_by' => 'seeder'],

            ['submenu_id' => 29,  'menu_id' => '6', 'submenu_name' => 'Dashboard', 'route_name' => 'report.dashboard3.index', 'display_order' => 1, 'created_by' => 'seeder'],
            ['submenu_id' => 30,  'menu_id' => '6', 'submenu_name' => 'รายงานสรุป', 'route_name' => 'report.dashboard1.index', 'display_order' => 2, 'created_by' => 'seeder'],
            ['submenu_id' => 31,  'menu_id' => '6', 'submenu_name' => 'รายงานรูปภาพกิจกรรม', 'route_name' => 'report.dashboard2.index', 'display_order' => 3, 'created_by' => 'seeder'],
            ['submenu_id' => 32,  'menu_id' => '6', 'submenu_name' => 'รายงานสรุปข้อมูลรายได้เฉลี่ยต่อเดือนแยกตามอาชีพหลัก', 'route_name' => 'report.dashboard4.index', 'display_order' => 4, 'created_by' => 'seeder'],
            ['submenu_id' => 33,  'menu_id' => '6', 'submenu_name' => 'รายงานสรุปข้อมูลรายได้เฉลี่ยต่อเดือนแยกตามหลักสูตร', 'route_name' => 'report.dashboard5.index', 'display_order' => 5, 'created_by' => 'seeder'],
            ['submenu_id' => 34,  'menu_id' => '6', 'submenu_name' => 'รายงานสรุปข้อมูลผลการจัดกิจกรรมแยกตามกลุ่มหลักสูตร', 'route_name' => 'report.dashboard6.index', 'display_order' => 6, 'created_by' => 'seeder'],

            ['submenu_id' => 35,  'menu_id' => '7', 'submenu_name' => 'กำหนดสิทธิ์การเข้าใช้งานระบบ', 'route_name' => 'permission.index', 'display_order' => 11, 'created_by' => 'seeder'],
            // ['submenu_id' => 37,  'menu_id' => '8', 'submenu_name' => 'ประวัติการใช้งานระบบ', 'route_name' => 'history', 'display_order' => 1, 'created_by' => 'seeder'],

            ['submenu_id' => 36,  'menu_id' => '6', 'submenu_name' => 'รายงานสรุปข้อมูลรายได้เฉลี่ยต่อเดือนแยกตามอาชีพหลัก', 'route_name' => 'report.dashboard4.index', 'display_order' => 7, 'created_by' => 'seeder'],
            ['submenu_id' => 37,  'menu_id' => '6', 'submenu_name' => 'รายงานสรุปข้อมูลรายได้เฉลี่ยต่อเดือนแยกตามหลักสูตร', 'route_name' => 'report.dashboard5.index', 'display_order' => 8, 'created_by' => 'seeder'],
            ['submenu_id' => 38,  'menu_id' => '6', 'submenu_name' => 'รายงานสรุปข้อมูลผลการจัดกิจกรรมแยกตามกลุ่มหลักสูตร', 'route_name' => 'report.dashboard6.index', 'display_order' => 9, 'created_by' => 'seeder'],

            ['submenu_id' => 39,  'menu_id' => '4', 'submenu_name' => 'บันทึกผลการดำเนินงาน', 'route_name' => 'operate.index', 'display_order' => 6, 'created_by' => 'seeder'],
            ['submenu_id' => 40,  'menu_id' => '1', 'submenu_name' => 'หัวข้อประเมิน กิจกรรมพัฒนาทักษะฝีมือแรงงาน', 'route_name' => 'master.estimate.index', 'display_order' => 10, 'created_by' => 'seeder'],


        ]);
    }
}
