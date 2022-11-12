<?php

namespace App\Http\Livewire\Activity\Participant;

use App\Models\OoapMasActtype;
use App\Models\OoapTblFiscalyear;
use App\Models\OoapTblReqform;
use App\Models\OoapTblReqmEmp;
use App\Models\UmMasDepartment;
use Livewire\Component;

class ParticipantComponent extends Component
{

    public $resultReq = [];
    public $fiscalyear_code, $fiscalyear_list;
    public $dept_id, $dept_list;
    public $acttype_id, $acttype_list;
    public $reqform_id = 0, $reqform_no_list = [];
    public $total_amt, $resultForm;

    public function mount()
    {

        $this->fiscalyear_list = OoapTblFiscalyear::where('in_active', '=', false)->pluck('fiscalyear_code', 'fiscalyear_code as fiscalyear_code2');

        $this->dept_list = UmMasDepartment::pluck('dept_name_th', 'dept_id');

        $this->acttype_list = OoapMasActtype::where('inactive', '=', false)->pluck('name', 'id');
    }

    public function render()
    {

        if (!empty($this->fiscalyear_code) && !empty($this->dept_id) && !empty($this->acttype_id)) {

            $resultForm = OoapTblReqform::select('ooap_tbl_reqform.reqform_id', 'ooap_tbl_reqform.reqform_no');
            $resultForm = $resultForm->where('ooap_tbl_reqform.fiscalyear_code', '=', $this->fiscalyear_code);
            $resultForm = $resultForm->where('ooap_tbl_reqform.dept_id', '=', $this->dept_id);
            $resultForm = $resultForm->where('ooap_tbl_reqform.acttype_id', '=', $this->acttype_id);

            $this->reqform_no_list = $resultForm->pluck('ooap_tbl_reqform.reqform_no', 'ooap_tbl_reqform.reqform_id');
        }

        if ($this->reqform_id > 0) {

            $this->resultReq = OoapTblReqmEmp::leftjoin('ooap_tbl_emps', 'ooap_tbl_reqm_emps.emps_id', 'ooap_tbl_emps.emps_id')
                ->where('ooap_tbl_reqm_emps.reqform_id', '=', $this->reqform_id)
                ->get();
        }

        return view('livewire.activity.participant.participant-component');
    }
}
