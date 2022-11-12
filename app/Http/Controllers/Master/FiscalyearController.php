<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\OoapTblFiscalyear;
use Illuminate\Http\Request;

class FiscalyearController extends Controller
{

    public function index()
    {
        return view('master.fiscalyear.index');
    }


    public function create()
    {
        $icon = getIcon( 'add' );
        $title = 'เพิ่มปีงบประมาณ';
        return view('master.fiscalyear.edit', ['datacentermaster' => NULL, 'title' => $title, 'icon' => $icon]);

    }



    public function edit($id, Request $request )
    {
        $icon = getIcon( 'edit' );

        // $OoapTblFiscalyear = OoapTblFiscalyear::find($id);
        $OoapTblFiscalyear = OoapTblFiscalyear::getDatas($id)->first();

        if( $OoapTblFiscalyear ) {

            $title = 'ปี '. $OoapTblFiscalyear->fiscalyear_code;
        }
        else {

            $title = 'เพิ่มปีงบประมาณ';

        }

        return view('master.fiscalyear.edit', ['datacentermaster' => $OoapTblFiscalyear, 'title' => $title, 'icon' => $icon]);
    }


    public function destroy($id)
    {
        $checkResult = OoapTblFiscalyear::find($id);
        ($checkResult->in_active == 1) ? $in_active = 0 : $in_active = 1;
        OoapTblFiscalyear::where('id','=', $id)->update([
            'in_active' => $in_active,
            'deleted_by' => auth()->user()->name,
            'deleted_at' => now()
        ]);
        return redirect()->back()->with('message', 'ดำเนินการ ลบข้อมูล เรียบร้อย');
    }
}
