<?php

namespace App\Http\Livewire\Master\Fiscalyear;

use App\Models\OoapTblFiscalyear;
use Illuminate\Http\Request;

use Livewire\Component;

class FiscalyearEditComponent extends Component
{
    public $dataCenterMaster, $fiscalyear_id, $fiscalyear_code, $startdate, $enddate, $req_status, $req_startdate, $req_enddate, $fiscalyear_code_old;

    public function mount(Request $request)
    {


        if ($this->dataCenterMaster) {
            $this->fiscalyear_id = $this->dataCenterMaster->id;
            $this->fiscalyear_code = $this->dataCenterMaster->fiscalyear_code;
            $this->req_status = $this->dataCenterMaster->req_status;
            $this->req_startdate = datetoview($this->dataCenterMaster->req_startdate);
            $this->req_enddate = datetoview($this->dataCenterMaster->req_enddate);
        } else {
            $this->fiscalyear_id = NULL;
            $this->fiscalyear_code = date("Y") + 543;
            $this->req_status = NULL;
            $this->req_startdate = NULL;
            $this->req_enddate = NULL;
        }
    }

    public function render()
    {

        $this->emit('loadJquery');

        return view('livewire.master.fiscalyear.fiscalyear-edit-component');
    }

    public function submit()
    {

        $validate = [
            'fiscalyear_code' => 'required|numeric|min:4',
        ];

        if ($this->dataCenterMaster) {

            if ($this->dataCenterMaster->fiscalyear_code != $this->fiscalyear_code) {
                $validate['fiscalyear_code'] .= '|unique:ooap_tbl_fiscalyear,fiscalyear_code,' . $this->fiscalyear_code;
            }
        } else {
            $validate['fiscalyear_code'] .= '|unique:ooap_tbl_fiscalyear,fiscalyear_code,' . $this->fiscalyear_code;
        }

        $this->validate($validate);
        $datas = [
            'fiscalyear_code' => $this->fiscalyear_code,
            'req_startdate' => datePickerThaiToDB($this->req_startdate),
            'req_enddate' => datePickerThaiToDB($this->req_enddate),
            'updated_by' => auth()->user()->emp_citizen_id,
            'remember_token' => csrf_token(),
            'created_at' => now(),
            'updated_at' => now(),

        ];

        //'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'

        if ($this->dataCenterMaster) {

            $this->parent_id = $this->dataCenterMaster->id;


            OoapTblFiscalyear::where('id', '=',  $this->parent_id)->update($datas);
        }
        else {

           $OoapTblFiscalyear = OoapTblFiscalyear::create($datas);

           $this->parent_id = $OoapTblFiscalyear->id;


        }

        $this->emit('popup');
    }

    protected $listeners = ['redirect-to' => 'redirect_to'];

    public function redirect_to(Request $request)
    {


        // dd($request->route()->getName());

        return redirect(route('master.fiscalyear.edit', ['id' => $this->parent_id]));
        // return redirect()->to('/master/fiscalyear');
    }

    public function req_startdate_clear()
    {
        $this->reset(['req_startdate']);
    }

    public function req_enddate_clear()
    {
        $this->reset(['req_enddate']);
    }

    public function thisReset()
    {
        return redirect()->to('/master/fiscalyear');
    }
}
