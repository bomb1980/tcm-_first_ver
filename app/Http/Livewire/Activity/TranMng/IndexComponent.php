<?php

namespace App\Http\Livewire\Activity\TranMng;

use App\Models\OoapTblFiscalyear;
use App\Models\UmMasDepartment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IndexComponent extends Component
{
    public $dept_list, $fiscalyear_list, $dept_mockup;

    public function mount()
    {
        // $this->dept_list = DB::connection('oracle_umts')->table('um_mas_department')->pluck("dept_name_th", "dept_id");
        $this->dept_list = UmMasDepartment::pluck('dept_name_th', 'dept_id');
        $this->fiscalyear_list = OoapTblFiscalyear::where('in_active', '=', false)->pluck('fiscalyear_code', 'fiscalyear_code AS fiscalyear_code2');
        $this->dept_mockup = [
            'สรจ.กรุงเทพ', 'สรจ.อยุธยา', 'สรจ.ลพบุรี', 'สรจ.สระบุรี', 'สรจ.สิงห์บุรี',
            'สรจ.อ่างทอง', 'สรจ.สมุทรปราการ', 'สรจ.สมุทรสงคราม', 'สรจ.นครปฐม', 'สรจ.สมุทรสาคร', 'สรจ.สุพรรณบุรี', 'สรจ.เพชรบูรณ์'
        ];
        // dd($this->dept_list);
    }

    public function render()
    {
        return view('livewire.activity.tran-mng.index-component');
    }
}
