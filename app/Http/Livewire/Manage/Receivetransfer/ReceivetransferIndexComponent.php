<?php

namespace App\Http\Livewire\Manage\Receivetransfer;

use App\Models\OoapTblFiscalyear;
use Livewire\Component;

class ReceivetransferIndexComponent extends Component
{
    public $fiscalyear_list, $fiscalyear_code, $fybdperiod_list, $fybdperiod_id, $transfer_date, $transfer_amt, $transfer_desp;

    public function mount()
    {
        $this->fiscalyear_list = OoapTblFiscalyear::pluck('fiscalyear_code', 'fiscalyear_code as fiscalyear_code2') ?? [];
        $this->fiscalyear_code = date("Y")+543;
    }

    public function render()
    {
        return view('livewire.manage.receivetransfer.receivetransfer-index-component');
    }
}
