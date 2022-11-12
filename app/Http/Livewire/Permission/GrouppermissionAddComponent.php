<?php

namespace App\Http\Livewire\Permission;

use App\Models\OoapMasRole;
use App\Models\OoapMasRolePer;
use App\Models\OoapMasSubmenu;
use Livewire\Component;

class GrouppermissionAddComponent extends Component
{
    public $dataGroupPermission, $Role, $role_id;
    public $view_data = [], $insert_data = [], $update_data = [], $delete_data = [], $apprv_data = [], $selectall, $selectall_form;
    public $sub_menu, $subMenu, $func, $subFunc, $role_per, $role_level_id, $Role_level, $data_role_level_id, $role_level_id_mount, $mountRole;
    public $currentStep = 1;

    public $function_menu, $view_data_form = [];
    protected $listeners = ['redirect-to' => 'redirect_to'];
    public function changeRole($value)
    {
        $this->role_id = $value;
        $this->role_per = OoapMasRolePer::select(
            'ooap_mas_role_per.role_per_id',
            'ooap_mas_role_per.role_id',
            'ooap_mas_role_per.view_data',
            'ooap_mas_role_per.insert_data',
            'ooap_mas_role_per.update_data',
            'ooap_mas_role_per.delete_data'
        )
            ->where('ooap_mas_role_per.in_active', false)
            ->where('ooap_mas_role_per.role_id', $value)
            ->get()->toArray();
        if (count($this->role_per) > 0) {
            foreach ($this->role_per as $key => $val) {
                $this->view_data[$key] = $this->role_per[$key]['view_data'] == 0 ? 0 : 1;
                $this->insert_data[$key] = $this->role_per[$key]['insert_data'] == 0 ? 0 : 1;
                $this->update_data[$key] = $this->role_per[$key]['update_data'] == 0 ? 0 : 1;
                $this->delete_data[$key] = $this->role_per[$key]['delete_data'] == 0 ? 0 : 1;
            }
        } else {
            foreach ($this->sub_menu as $key => $val) {
                $this->view_data[$key] = 0;
                $this->insert_data[$key] = 0;
                $this->update_data[$key] = 0;
                $this->delete_data[$key] = 0;
            }
        }
    }
    public function allrow()
    {
        foreach ($this->sub_menu as $key => $value) {
            $this->view_data[$key] = $this->selectall ? 1 : 0;
            $this->insert_data[$key] = $this->selectall ? 1 : 0;
            $this->update_data[$key] = $this->selectall ? 1 : 0;
            $this->delete_data[$key] = $this->selectall ? 1 : 0;
        }
    }
    public function allrow_form()
    {
        foreach ($this->function_menu as $key => $value) {
            $this->view_data_form[$key] = $this->selectall_form ? 1 : 0;
        }
    }
    public function mount()
    {
        $this->sub_menu = OoapMasSubmenu::select([
            'ooap_mas_submenu.submenu_id',
            'ooap_mas_submenu.submenu_name',
            'ooap_mas_menu.menu_name',
        ])
            ->leftjoin('ooap_mas_menu', 'ooap_mas_submenu.menu_id', '=', 'ooap_mas_menu.menu_id')
            ->where('ooap_mas_menu.in_active', false)
            ->where('ooap_mas_submenu.in_active', false)
            ->orderby('ooap_mas_menu.display_order', 'asc')
            ->orderby('ooap_mas_submenu.display_order', 'asc')
            ->get()->toArray();

        foreach ($this->sub_menu as $key => $value) {
            $this->view_data[$key] = 0;
            $this->insert_data[$key] = 0;
            $this->update_data[$key] = 0;
            $this->delete_data[$key] = 0;
        }
    }
    public function showpage($page)
    {
        $this->currentStep = $page;
    }

    public function render()
    {
        $this->Role = OoapMasRole::where('in_active', false)->pluck('role_name_th', 'role_id');
        return view('livewire.permission.grouppermission-add-component');
    }
    public function save_menu()
    {
        $this->validate([
            'role_id' => 'required'
        ], [
            'role_id.required' => 'กรุณากรอก กลุ่มผู้ใช้งาน'
        ]);
        // dd($this->role_per, $this->sub_menu);
        if (count($this->role_per) > 0) {
            foreach ($this->role_per as $key => $val) {
                OoapMasRolePer::where('role_per_id', '=', $val['role_per_id'])
                    ->update(
                        [
                            'view_data' => $this->view_data[$key] == 0 ? 0 : 1,
                            'insert_data' => $this->insert_data[$key] == 0 ? 0 : 1,
                            'update_data' => $this->update_data[$key] == 0 ? 0 : 1,
                            'delete_data' => $this->delete_data[$key] == 0 ? 0 : 1,
                            'remember_token' => csrf_token(),
                            'updated_by' => auth()->user()->name,
                            'updated_at' => now()
                        ]
                    );
            }
        } else {
            foreach ($this->sub_menu as $key => $val) {
                OoapMasRolePer::create(
                    [
                        'role_id' => $this->role_id,
                        'submenu_id' => $val['submenu_id'],
                        'view_data' => $this->view_data[$key] ? 1 : 0,
                        'insert_data' => $this->insert_data[$key] ? 1 : 0,
                        'update_data' => $this->update_data[$key] ? 1 : 0,
                        'delete_data' => $this->delete_data[$key] ? 1 : 0,
                        'remember_token' => csrf_token(),
                        'created_by' => auth()->user()->name,
                        'created_at' => now()
                    ]
                );
            }
        }
        $this->emit('popup');
    }
    public function redirect_to()
    {
        return redirect()->to('/permission_list');
    }
}
