<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Form\Memorandum;
use App\Models\Form\ServiceCall;
use App\Models\Form\WithdrawalSlip\Wsdm;
use App\Models\Form\WithdrawalSlip\Wsfa;
use App\Models\Form\WithdrawalSlip\Wsfg;
use App\Models\Form\WithdrawalSlip\Wsma;
use App\Models\Form\WithdrawalSlip\Wsmi;
use App\Models\Form\WithdrawalSlip\Wsmro;
use Illuminate\Http\Request;

class TotalRecordController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:administrator']);
    }

    public function formCount()
    {
        $mi = Wsmi::count();
        $mro = Wsmro::count();
        $dm = Wsdm::count();
        $fa = Wsfa::count();
        $fg = Wsfg::count();
        $ma = Wsma::count();
        $memorandum = Memorandum::count();
        $servicecall = ServiceCall::count();

        return response()->json([
            'success'   => true,
            'data'      => [
                'miCount'            => $mi,
                'mroCount'           => $mro,
                'dmCount'            => $dm,
                'faCount'            => $fa,
                'fgCount'            => $fg,
                'maCount'            => $ma,
                'memorandumCount'    => $memorandum,
                'servicecallCount'   => $servicecall
            ]
        ]);
    }
}
