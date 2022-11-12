<?php

namespace App\Http\Livewire\Request\Reqform;

use App\Models\OoapMasActtype;
use App\Models\OoapTblFiscalyear;
use App\Models\UmMasDepartment;
use Livewire\Component;

class ReqformComponent extends Component
{
    public $fiscalyear_list, $acttype_list, $dept_list, $status_list;
    public $fiscalyear_code, $dept_id, $acttype_id, $status_id;

    public function mount()
    {
        $this->fiscalyear_list = OoapTblFiscalyear::pluck('fiscalyear_code', 'fiscalyear_code AS fiscalyear_code2');
        $this->acttype_list = OoapMasActtype::pluck('name', 'id');
        $this->dept_list = UmMasDepartment::pluck('dept_name_th', 'dept_id');
    }

    public function save()
    {
        dd($this);
    }

    // public function setYears($years){
    //     $this->fiscalyear_code = $years;
    //     // $this->emit('emits');
    // }

    public function render()
    {
        $this->emit('emits');
        return view('livewire.request.reqform.reqform-component');
    }
}
