<?php

namespace App\Http\Livewire\Permission;

use App\Models\OoapMasMenu;
use App\Models\OoapMasRole;
use App\Models\OoapMasRolePer;
use App\Models\OoapMasUserPer;
use App\Models\OoapTblEmployee;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PermissionAddComponent extends Component
{
    public $menulist, $Role, $selectYear;
    public $view_data = [], $insert_data = [], $update_data = [], $delete_data = [];
    public $role_id, $selectall;
    public $change_checkbox;
    public $name_search, $employee_list, $employee_search;
    public $Data_new_user, $check_userper, $set_save;
    protected $listeners = ['redirect-to' => 'redirect_to', 'redirect-to-edit' => 'redirect_to_edit', 'redirect-to-name_search' => 'name_search'];

    public function changeRole($val)
    {
        $this->role_id = $val;
        $checkupdate = OoapMasRolePer::where('role_id', $this->role_id)->count();
        if ($checkupdate) {
            $RolePerlist = OoapMasRolePer::where([['in_active', false], ['role_id', $this->role_id]])
                ->orderBy('role_per_id', 'asc')
                ->get();
            foreach ($RolePerlist as $key => $value) {
                $this->view_data[$key] = (int)$value->view_data;
                $this->insert_data[$key] = (int)$value->insert_data;
                $this->update_data[$key] = (int)$value->update_data;
                $this->delete_data[$key] = (int)$value->delete_data;
            }
        } else {
            $this->menulist_f();
            foreach ($this->menulist as $key => $value) {
                $this->view_data[$key] = 0;
                $this->insert_data[$key] = 0;
                $this->update_data[$key] = 0;
                $this->delete_data[$key] = 0;
            }
        }
    }

    public function menulist_f()
    {
        $this->menulist = OoapMasMenu::where([['ooap_mas_menu.in_active', false]])
            ->select('ooap_mas_menu.menu_name', 'ooap_mas_submenu.submenu_name', 'ooap_mas_menu.menu_id', 'ooap_mas_submenu.submenu_id')
            ->leftjoin('ooap_mas_submenu', 'ooap_mas_menu.menu_id', 'ooap_mas_submenu.menu_id')
            ->orderBy('ooap_mas_menu.menu_id', 'asc')
            ->orderBy('ooap_mas_submenu.submenu_id', 'asc')
            ->get();
    }
    public function allrow()
    {
        foreach ($this->menulist as $key => $value) {
            $this->view_data[$key] = $this->selectall ? 1 : 0;
            $this->insert_data[$key] = $this->selectall ? 1 : 0;
            $this->update_data[$key] = $this->selectall ? 1 : 0;
            $this->delete_data[$key] = $this->selectall ? 1 : 0;
        }
    }

    public function changecheckbox()
    {
        if ($this->change_checkbox) {
            $this->change_checkbox = 0;
        } else {
            $this->change_checkbox = 1;
        }
    }

    public function mount()
    {

        $this->menulist_f();
        //$this->set_save = 0///;
        foreach ($this->menulist as $key => $value) {
            $this->view_data[$key] = 0;
            $this->insert_data[$key] = 0;
            $this->update_data[$key] = 0;
            $this->delete_data[$key] = 0;
        }
        $this->employee_list = $this->call_employee();
    }

    public function name_search($val)
    {
        if (!empty($val)) {
            $val_zi = $val['data'];

            if ($val_zi != 'false') {
                $this->name_search = $val_zi;
                $this->check_userper = OoapTblEmployee::where([['emp_citizen_id', $val_zi], ['in_active', false]])
                    ->get();
                // dd($this->check_userper);
                if (count($this->check_userper) > 0) {
                    $this->emit('check_userper');
                } else {
                    $this->employee_search = Http::withHeaders([
                        'Authorization' => 'Bearer ' . config('app.umts_token'),
                        'Accept' => 'application/json'
                    ])->post(config('app.umts_api') . '/eis/employee_deteil_citizen_id', ['em_citizen_id' => $val_zi])->json();
                }
            } else {
                $this->employee_search = '';
            }
            // dd($this->employee_search);
        }
    }
    public function render()
    {
        $this->Role = OoapMasRole::where('in_active', false)->orderBy('role_id', 'asc')->pluck('role_name_th', 'role_id');
        $this->menulist_f();
        return view('livewire.permission.permission-add-component');
    }


    public function call_employee()
    {
        $employee_search_all = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.umts_token'),
            'Accept' => 'application/json'
        ])->post(config('app.umts_api') . '/eis/employee_deteil')->json();
        // dd($employee_search_all);
        return $employee_search_all;
    }
    public function submit()
    {
        // dd($this->employee_search);
        $this->validate([
            'role_id' => 'required',
            'name_search' => 'required'
        ], [
            'role_id.required' => 'กรุณาเลือก กลุ่มผู้ใช้งาน',
            'name_search.required' => 'กรุณาเลือก ชื่อผู้ใช้งาน'
        ]);
        $newuser = OoapTblEmployee::create([
            'role_id' => (int)$this->role_id,
            'emp_citizen_id' => $this->employee_search[0]['em_citizen_id'],
            'title_th' => $this->employee_search[0]['prefix_name_th'],
            'fname_th' => $this->employee_search[0]['em_name_th'],
            'lname_th' => $this->employee_search[0]['em_surname_th'],
            'division_id' => $this->employee_search[0]['division_id'],
            'division_name' => $this->employee_search[0]['division_name'],
            'department_id' => $this->employee_search[0]['department_id'],
            'dept_name_th' => $this->employee_search[0]['dept_name_th'],
            'posit_id' => $this->employee_search[0]['posit_id'],
            'posit_name_th' => $this->employee_search[0]['posit_name_th'],
            'remember_token' => csrf_token(),
            'created_by' => auth()->user()->em_citizen_id,
            'created_at' => now()
        ]);
        $this->menulist_f();
        foreach ($this->menulist as $key => $value) {
            OoapMasUserPer::create([
                'user_id' => (int)$newuser->emp_id,
                'submenu_id' => $value->submenu_id,
                'view_data' => $this->view_data[$key] ? 1 : 0,
                'insert_data' => $this->insert_data[$key] ? 1 : 0,
                'update_data' => $this->update_data[$key] ? 1 : 0,
                'delete_data' => $this->delete_data[$key] ? 1 : 0,
                'remember_token' => csrf_token(),
                'created_by' => auth()->user()->em_citizen_id,
                'created_at' => now()
            ]);
        }
        $updateroleportal = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('app.umts_token'),
            'Accept' => 'application/json'
        ])->post(config('app.umts_api') . '/eis/updateroleportal_form', ['em_id' => $this->employee_search[0]['em_id'], 'system_menus_id' => 2])->json();

        if ($updateroleportal == "true") {
            $this->emit('popup');
        } else {
            "api พลาด";
        }
        $this->emit('popup');
    }

    public function thisReset()
    {
        return redirect()->to('/permission_list');
    }


    public function redirect_to()
    {
        return redirect()->to('/permission_list');
    }

    public function redirect_to_edit()
    {
        return redirect()->to('/permission/' . $this->check_userper[0]->emp_id . '/edit');
    }
}
