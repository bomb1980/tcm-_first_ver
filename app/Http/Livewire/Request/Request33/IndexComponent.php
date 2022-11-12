<?php

namespace App\Http\Livewire\Request\Request33;

use App\Models\OoapMasActtype;
use App\Models\OoapTblFiscalyear;
use App\Models\UmMasDepartment;
use Livewire\Component;

class IndexComponent extends Component
{
    public $fiscalyear_list, $acttype_list, $dept_list;
    public $fiscalyear_code, $dept_id, $acttype_id;

    public function mount()
    {
        $this->fiscalyear_list = OoapTblFiscalyear::pluck('fiscalyear_code', 'fiscalyear_code AS fiscalyear_code2');
        $this->acttype_list = OoapMasActtype::pluck('name', 'id');
        $this->dept_list = UmMasDepartment::pluck('dept_name_th', 'dept_id');

    }
    public function render()
    {
        return view('livewire.request.request33.index-component');
    }
}
