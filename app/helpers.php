<?php

use App\Models\OoapMasUserPer;
use App\Models\OoapTblEmployee;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;


use App\Models\syslog;
use Illuminate\Encryption\Encrypter;

function check_duplicate_files($new_files, $old_files, $edit_files = [])
{
    $file_names = [];

    foreach ($old_files as $file) {
        $file_names[] = $file->getClientOriginalName();
    }

    foreach ($edit_files as $file) {
        $file_names[] = $file['file_name'];
    }

    foreach ($new_files as $file) {
        if (in_array($file->getClientOriginalName(), $file_names)) {
            return true;
        }
    }

    return false;
}

function formatDateThai($strDate)
{
    if (!is_null($strDate)) {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        // $strHour:$strMinute
        return "$strDay $strMonthThai $strYear";
    }
}

if (!function_exists('logSys')) {
    function
    logSys($logTable, $logActionid, $logName, $logControl, $logDetail)
    {
        // return 'logSys';
        $logIP = request()->ip();
        $remember_token = csrf_token();
        $createby = auth()->user()->id;

        $log = new syslog();
        $log->logIP = $logIP;
        $log->logTable = $logTable ?? '';
        $log->logActionid = $logActionid ?? '';
        $log->logName = $logName ?? '';
        $log->logControl = $logControl ?? '';
        $log->logDetail = $logDetail ?? '';
        $log->createby = $createby;
        $log->remember_token = $remember_token;
        $log->save();
    }
}

if (!function_exists('system_key')) {
    function system_key()
    {
        return auth()->user()->myooapsys;
    }
}

if (!function_exists('datetodatabase')) {
    function datetodatabase($date)
    {
        if (!empty($date) && (strtotime($date) > 0)) {
            $dateTh = date('d-m-Y', strtotime("-543 years", strtotime($date)));
            return $dateTh;
        }
    }
}

if (!function_exists('datetoview')) {
    function datetoview($date)
    {
        if (!empty($date) && (strtotime($date) > 0)) {
            $dateTh = date('d/m/Y', strtotime("+543 years", strtotime($date)));
            return $dateTh;
        }
    }
}

if (!function_exists('datePickerThaiToDB')) {
    function datePickerThaiToDB($date)
    {
        if ($date) {
            $arr_date = explode('/', $date);
            return ($arr_date[2] - 543) . '-' . $arr_date[1] . '-' . $arr_date[0];
        } else {
            return null;
        }
    }
}

if (!function_exists('datetimeToDate')) {
    function datetimeToDate($date)
    {
        if ($date == NULL) {
            return '-';
        } else {
            // $date = gmdate("Y-m-d", $date);
            $date = date("Y-m-d", $date);
            $arr_date = explode('-', $date);

            // $arr_month = [1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'];

            return ($arr_date[2] + 0) . ' ' . ($arr_date[1]) . ' ' . ($arr_date[0]);
        }
    }
}

if (!function_exists('datetimeToDateThai')) {
    function datetimeToDateThai($date)
    {
        if ($date == NULL) {
            return '-';
        } else {
            // $date = gmdate("Y-m-d", $date);
            $date = date("Y-m-d", $date);
            $arr_date = explode('-', $date);

            // $arr_month = [1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'];

            return ($arr_date[2]) . '/' . ($arr_date[1]) . '/' . ($arr_date[0] + 543);
        }
    }
}

if (!function_exists('getRole')) {
    function getRole()
    {

        return auth()->user()->emp_citizen_id;
    }
}

if (!function_exists('dayThaiName')) {
    function dayThaiName($date)
    {
        if ($date) {
            $array = [
                0 => 'วันอาทิตย์',
                1 => 'วันจันทร์',
                2 => 'วันอังคาร',
                3 => 'วันพุธ',
                4 => 'วันพฤหัสบดี',
                5 => 'วันศุกร์',
                6 => 'วันเสาร์',
            ];
            return $array[date("w", strtotime($date))];
        } else {
            return null;
        }
    }
}

if (!function_exists('montYearsToDate')) {
    function montYearsToDate($date)
    {
        if ($date) {
            $arr_date = explode('-', $date);
            return ($arr_date[1] - 543) . '-' . $arr_date[0] . '-01';
        } else {
            return null;
        }
    }
}

if (!function_exists('dateToMontYears')) {
    function dateToMontYears($date)
    {
        if ($date) {
            $arr_datetime = explode(' ', $date);
            $arr_date = explode('-', $arr_datetime[0]);
            return ($arr_date[1]) . '-' . $arr_date[0] + 543;
        } else {
            return null;
        }
    }
}

if (!function_exists('dateToNewDatetime')) {
    function dateToNewDatetime($date)
    {
        if ($date) {
            return new DateTime($date);
        } else {
            return null;
        }
    }
}

if (!function_exists('monthThaiName')) {
    function monthThaiName($date)
    {
        if ($date) {
            $array = [
                '01' => 'มกราคม',
                '02' => 'กุมภาพันธ์',
                '03' => 'มีนาคม',
                '04' => 'เมษายน',
                '05' => 'พฤษภาคม',
                '06' => 'มิถุนายน',
                '07' => 'กรกฎาคม',
                '08' => 'สิงหาคม',
                '09' => 'กันยายน',
                '10' => 'ตุลาคม',
                '11' => 'พฤศจิกายน',
                '12' => 'ธันวาคม',
            ];
            $arr_date = explode('-', $date);
            return  $array[$arr_date[1]] . ' ' . ($arr_date[0] + 543);
        } else {
            return null;
        }
    }
}

if (!function_exists('showMimeIcon')) {
    function showMimeIcon($mime)
    {
        $text = explode("/", $mime);
        if ($text[0] == 'image') {
            $textshow = '<img height="20px" width="20px" src="' . asset('assets') . '/images/mime_image.png">';
        } else {
            $textend = explode(".", $text[1]);
            if (end($textend) == 'pdf') {
                $textshow = '<img height="20px" width="20px" src="' . asset('assets') . '/images/pdf-icon.png">';
            } else if (end($textend) == 'document' or $text[1] == 'msword') {
                $textshow = '<img height="20px" width="20px" src="' . asset('assets') . '/images/doc-icon.png">';
            } else if (end($textend) == 'sheet' or $text[1] == 'vnd.ms-excel') {
                $textshow = '<img height="20px" width="20px" src="' . asset('assets') . '/images/excel-icon.png">';
            } else {
                $textshow = '<img height="20px" width="20px" src="' . asset('assets') . '/images/question-mark.png">';
            }
        }
        return $textshow;
    }
}

if (!function_exists('show_name')) {
    function show_name()
    {

        if (auth()->user()->name) {
            $em_citizen_id = auth()->user()->name;
        } else {
            $em_citizen_id = auth()->user()->emp_citizen_id;
        }

        $em_id = OoapTblEmployee::where('ooap_tbl_employees.emp_citizen_id', '=', $em_citizen_id)->first();

        if ($em_id) {
            $profile = $em_id->prefix_name_th . " " . $em_id->fname_th . " " . $em_id->lname_th;
        } else {
            $profile = "ไม่พบข้อมูล";
        }
        return $profile;
    }
}

if (!function_exists('show_dept_name')) {
    function show_dept_name()
    {

        if (auth()->user()->name) {
            $em_citizen_id = auth()->user()->name;
        } else {
            $em_citizen_id = auth()->user()->emp_citizen_id;
        }

        $em_id = OoapTblEmployee::where('ooap_tbl_employees.emp_citizen_id', '=', $em_citizen_id)->first();

        if ($em_id) {
            return $em_id->dept_name_th;
        }
    }
}

if (!function_exists('getProfileImg')) {
    function getProfileImg()
    {
        $ProfileImg = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.umts_token'),
            'Accept' => 'application/json'
        ])->get(config('app.umts_api') . '/getProfileImg', ['username' => auth()->user()->emp_citizen_id])->json();

        if (count($ProfileImg) > 0) {
            if ($ProfileImg[0]['files_gen'] != '') {
                return "http://e-office.mol.go.th/storage/photos/profile/" . $ProfileImg[0]['files_gen'];
            } else {

                return "http://e-office.mol.go.th/storage/photos/profile/QNVhQDkbCykbmwvYZ5EvUTduzTqPqWDw9irsQAFb.png";
            }
        } else {

            return "http://e-office.mol.go.th/storage/photos/profile/QNVhQDkbCykbmwvYZ5EvUTduzTqPqWDw9irsQAFb.png";
        }
    }
}

if (!function_exists('DateToView')) {
    function DateToView($date)
    {

        $resultDate = Carbon::parse($date)->format('d M  Y');
        return $resultDate;
    }
}
if (!function_exists('getIcon')) {
    function getIcon( $icon_name = NULL ) {
        $icons['edit'] = '<i class="icon wb-pencil" aria-hidden="true"></i>';
        $icons['add'] = '<i class="icon wb-plus-circle" aria-hidden="true"></i>';

        return $icons[$icon_name];
    }

}
if (!function_exists('show_menu')) {
    function show_menu()
    {

        $user_id = OoapMasUserPer::where([['user_id', auth()->user()->emp_id], ['in_active', false]])->first()->user_id ?? null;
        $menu_h = OoapMasUserPer::where([['ooap_mas_user_per.in_active', false], ['ooap_mas_user_per.user_id', $user_id], ['ooap_mas_user_per.view_data', 1]])
            ->select('ooap_mas_submenu.submenu_id', 'ooap_mas_menu.menu_name', 'ooap_mas_menu.menu_id', 'ooap_mas_menu.activepage_name', 'ooap_mas_menu.menu_icon', 'ooap_mas_submenu.route_name')
            ->leftjoin('ooap_mas_submenu', 'ooap_mas_user_per.submenu_id', '=', 'ooap_mas_submenu.submenu_id')
            ->leftjoin('ooap_mas_menu', 'ooap_mas_submenu.menu_id', '=', 'ooap_mas_menu.menu_id')
            ->groupBy('ooap_mas_submenu.submenu_id', 'ooap_mas_menu.menu_name', 'ooap_mas_menu.menu_id', 'ooap_mas_menu.activepage_name', 'ooap_mas_menu.menu_icon', 'ooap_mas_submenu.route_name')
            ->orderBy('ooap_mas_menu.menu_id', 'asc')
            ->get();
        // return $menu_h;
        $show_menu = OoapMasUserPer::where([['ooap_mas_user_per.in_active', false], ['ooap_mas_user_per.user_id', $user_id], ['ooap_mas_user_per.view_data', 1]])
            ->select(
                'ooap_mas_submenu.submenu_id',
                'ooap_mas_submenu.submenu_name',
                'ooap_mas_submenu.route_name',
                // 'ooap_mas_submenu1.submenu1_id',
                // 'ooap_mas_submenu1.submenu1_name',
                // 'ooap_mas_submenu1.route_name as route_name1',
                'ooap_mas_menu.menu_name',
                'ooap_mas_menu.menu_id'
            )
            ->leftjoin('ooap_mas_submenu', 'ooap_mas_user_per.submenu_id', '=', 'ooap_mas_submenu.submenu_id')

            ->leftjoin('ooap_mas_menu', 'ooap_mas_submenu.menu_id', '=', 'ooap_mas_menu.menu_id')
            ->leftjoin('ooap_mas_submenu1', function ($join) {
                $join->on('ooap_mas_user_per.submenu_id', 'ooap_mas_submenu1.submenu_id');
                $join->where('ooap_mas_submenu1.in_active', false);
            })
            ->where('ooap_mas_menu.in_active', false)
            ->where('ooap_mas_submenu.in_active', false)
            // ->where('ooap_mas_submenu1.in_active', false)
            ->orderby('ooap_mas_menu.display_order', 'asc')
            ->orderby('ooap_mas_submenu.display_order', 'asc')
            ->orderby('ooap_mas_submenu1.display_order', 'asc')
            ->get();
        // return $show_menu;
        $group_menu = [];
        $fuc_menu = [];
        $submenu1 = [];
        foreach ($show_menu as $val) {
            if (!$val->route_name) {
                $submenu1[$val->menu_id][$val->submenu_id][$val->submenu1_id] = array(
                    'submenu1_name' => $val['submenu1_name'],
                    'submenu1_id' => $val['submenu1_id'],
                    'route_name1' => $val['route_name1'],
                );
            }
        }
        foreach ($show_menu as $val) {
            if ($val->submenu_id) {
                if (!$val->route_name) {
                    $group_menu[$val->menu_id][$val->submenu_id] = array(
                        'submenu_name' => $val['submenu_name'],
                        'submenu_id' => $val['submenu_id'],
                        'route_name' => $val['route_name'],
                        'submenu1' => $submenu1[$val->menu_id][$val->submenu_id],
                    );
                } else {
                    $group_menu[$val->menu_id][$val->submenu_id] = array(
                        'submenu_name' => $val['submenu_name'],
                        'submenu_id' => $val['submenu_id'],
                        'route_name' => $val['route_name'],
                    );
                }
            }
        }
        foreach ($menu_h as $val) {
            if ($val->submenu_id) {
                if (!empty($group_menu[$val->menu_id])) {
                    $fuc_menu[$val->menu_id] = array(
                        'menu_name' => $val->menu_name,
                        'menu_id' => $val->menu_id,
                        'activepage_name' => $val->activepage_name,
                        'menu_icon' => $val->menu_icon,
                        'submenu' => $group_menu[$val->menu_id]
                    );
                } else {
                    $fuc_menu[$val->menu_id] = array(
                        'menu_name' => $val->menu_name,
                        'menu_id' => $val->menu_id,
                        'activepage_name' => $val->activepage_name,
                        'menu_icon' => $val->menu_icon,
                        'submenu' => NULL
                    );
                }
            }
        }
        // dd($fuc_menu);
        if (count($menu_h) > 0) {
            return $fuc_menu;
        } else {
            return null;
        }
    }
}

if (!function_exists('getEncrypter')) {

    function getEncrypter($code = NULL, $type = 'encrypt')
    {

        $encrypter = new Encrypter('1234567812345678', 'AES-128-CBC');

        if ($type == 'encrypt') {

            return $encrypter->encrypt($code);
        }

        return $encrypter->decrypt($code);
    }
}
