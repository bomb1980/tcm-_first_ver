<?php

namespace App\Http\Livewire\Master\Estimate;

use App\Models\OoapMasActtype;
use Livewire\Component;

class EstimateAddComponent extends Component
{
    public $estimate_name,$estimate_short,$acttype_id,$acttype_list,$estimate_type_id,$estimate_type_list;

    public function render()
    {
        $this->acttype_list = OoapMasActtype::where('inactive','=',false)->pluck('name','id');
        $this->estimate_type_list = ['แบบประเมินผู้เข้าร่วมกิจกรรม','แบบประเมินวิทยากร','แบบประเมินผู้นำชุมชน'];

        return view('livewire.master.estimate.estimate-add-component');
    }
}
