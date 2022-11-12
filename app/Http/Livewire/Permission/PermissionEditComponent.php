<?php

namespace App\Http\Livewire\Permission;

use App\Models\OoapMasMenu;
use App\Models\OoapMasRole;
use App\Models\OoapMasRolePer;
use App\Models\OoapMasUserPer;
use App\Models\OoapTblEmployee;
use Livewire\Component;

class PermissionEditComponent extends Component
{
    public $menulist, $Role, $selectYear;
    public $view_data = [], $insert_data = [], $update_data = [], $delete_data = [];
    public $role_id, $selectall;
    public $change_checkbox;
    public $name_search, $employee_list, $employee_search;
    public $Data_new_user;
    public $user_id, $RolePerlist;


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

    public function mount($dataRoleUser)
    {
        // dd($dataRoleUser);
        $this->name_search = $dataRoleUser->title_th . ' ' .  $dataRoleUser->fname_th . ' ' . $dataRoleUser->lname_th;
        $this->role_id = $dataRoleUser->role_id;
        $this->em_id = $dataRoleUser->emp_id;
        $this->RolePerlist = OoapMasUserPer::where([['in_active', false], ['user_id', $this->em_id]])
            ->orderBy('user_per_id', 'asc')
            ->get();
        if (count($this->RolePerlist) > 0) {
            foreach ($this->RolePerlist as $key => $value) {
                $this->view_data[$key] = (int)$value->view_data;
                $this->insert_data[$key] = (int)$value->insert_data;
                $this->update_data[$key] = (int)$value->update_data;
                $this->delete_data[$key] = (int)$value->delete_data;
            }
        } else {
            $this->menulist_f();
            $this->allrow();
        }
    }

    public function render()
    {
        // dd($this->view_data, $this->insert_data, $this->update_data, $this->delete_data);
        $this->Role = OoapMasRole::where('in_active', false)->orderBy('role_id', 'asc')->pluck('role_name_th', 'role_id');
        $this->menulist_f();
        return view('livewire.permission.permission-edit-component');
    }

    public function submit()
    {
        $this->validate([
            'role_id' => 'required',
        ], [
            'role_id.required' => 'กรุณาเลือก กลุ่มผู้ใช้งาน',
        ]);
        OoapTblEmployee::where([['emp_id', $this->em_id]])->update([
            'role_id' => (int)$this->role_id,
            'remember_token' => csrf_token(),
            'updated_by' => auth()->user()->emp_id,
            'updated_at' => now()
        ]);
        $this->menulist_f();
        if (count($this->RolePerlist) > 0) {
            foreach ($this->menulist as $key => $value) {
                $checkupdateUP = OoapMasUserPer::where([['user_id', $this->em_id], ['submenu_id', $value->submenu_id]])->update([
                    'view_data' => $this->view_data[$key] ? 1 : 0,
                    'insert_data' => $this->insert_data[$key] ? 1 : 0,
                    'update_data' => $this->update_data[$key] ? 1 : 0,
                    'delete_data' => $this->delete_data[$key] ? 1 : 0,
                    'deleted_by' => auth()->user()->emp_id,
                    'updated_at' => now()
                ]);
                if (!$checkupdateUP) {
                    OoapMasUserPer::create([
                        'user_id' => (int)$this->em_id,
                        'menu_id' => $value->menu_id,
                        'submenu_id' => $value->submenu_id,
                        'view_data' => $this->view_data[$key] ? 1 : 0,
                        'insert_data' => $this->insert_data[$key] ? 1 : 0,
                        'update_data' => $this->update_data[$key] ? 1 : 0,
                        'delete_data' => $this->delete_data[$key] ? 1 : 0,
                        'remember_token' => csrf_token(),
                        'created_by' => auth()->user()->emp_id,
                        'created_at' => now()
                    ]);
                }
            }
        } else {
            foreach ($this->menulist as $key => $value) {
                OoapMasUserPer::create([
                    'user_id' => (int)$this->em_id,
                    'menu_id' => $value->menu_id,
                    'submenu_id' => $value->submenu_id,
                    'view_data' => $this->view_data[$key] ? 1 : 0,
                    'insert_data' => $this->insert_data[$key] ? 1 : 0,
                    'update_data' => $this->update_data[$key] ? 1 : 0,
                    'delete_data' => $this->delete_data[$key] ? 1 : 0,
                    'remember_token' => csrf_token(),
                    'created_by' => auth()->user()->emp_id,
                    'created_at' => now()
                ]);
            }
        }

        $this->emit('popup');
    }
    public function thisReset()
    {
        return redirect()->to('/permission_list');
    }


    protected $listeners = ['redirect-to' => 'redirect_to'];

    public function redirect_to()
    {
        return redirect()->to('/permission_list');
        // return redirect()->to('/permission/' . $this->em_id . '/edit');
    }
}
