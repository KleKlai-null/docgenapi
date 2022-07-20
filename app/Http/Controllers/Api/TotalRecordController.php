<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Form\WithdrawalSlip\Wsdm;
use App\Models\Form\WithdrawalSlip\Wsmi;
use App\Models\Form\WithdrawalSlip\Wsmro;
use Illuminate\Http\Request;

class TotalRecordController extends Controller
{
    public function formCount()
    {
        $mi = Wsmi::count();
        $mro = Wsmro::count();
        $dm = Wsdm::count();
        // $fa;
        // $fg;
        // $ma;
        // $memorandum;
        // $servicecall;
    }
}
