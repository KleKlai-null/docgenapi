<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentVerificationRequest;
use App\Models\Form\Memorandum;
use App\Models\Form\ReturnSlip\ReturnSlip;
use App\Models\Form\ServiceCall;
use App\Models\Form\WithdrawalSlip\Wsdm;
use App\Models\Form\WithdrawalSlip\Wsfa;
use App\Models\Form\WithdrawalSlip\Wsfg;
use App\Models\Form\WithdrawalSlip\Wsma;
use App\Models\Form\WithdrawalSlip\Wsmi;
use App\Models\Form\WithdrawalSlip\Wsmro;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentVerificationController extends ApiController
{

    /***
     * 
     * @ Document Verification for MI
     */
    public function verifyMI(DocumentVerificationRequest $request)
    {

        //Check Document Series Number

        $splice = Str::of($request->key)->explode('-');

        $unique = Str::lower($splice[1]);

        switch ($unique) {
            case "mi":

                $data = Wsmi::with('items')->DocumentSeries($request->key)->first();

                if(!$data){
                    return $this->sendError('Record does not exist or has been deleted.');
                }

                return $this->sendResponse($data);
                break;
            case "mro":
                $data = Wsmro::with('items')->DocumentSeries($request->key)->first();

                if(!$data){
                    return $this->sendError('Record does not exist or has been deleted.');
                }
                return $this->sendResponse($data);
                break;
            case "dm":
                $data = Wsdm::with('items')->DocumentSeries($request->key)->first();
                if(!$data){
                    return $this->sendError('Record does not exist or has been deleted.');
                }
                return $this->sendResponse($data);
                break;
            case "fg":
                $data = Wsfg::with('items')->DocumentSeries($request->key)->first();
                if(!$data){
                    return $this->sendError('Record does not exist or has been deleted.');
                }
                return $this->sendResponse($data);
                break;
            case "fa":
                $data = Wsfa::with('items')->DocumentSeries($request->key)->first();
                if(!$data){
                    return $this->sendError('Record does not exist or has been deleted.');
                }
                return $this->sendResponse($data);
                break;
            case "ma":
                $data = Wsma::with('items')->DocumentSeries($request->key)->first();
                if(!$data){
                    return $this->sendError('Record does not exist or has been deleted.');
                }
                return $this->sendResponse($data);
                break;
            case "sc":
                $data = ServiceCall::DocumentSeries($request->key)->first();
                if(!$data){
                    return $this->sendError('Record does not exist or has been deleted.');
                }
                return $this->sendResponse($data);
                break;
            case "mr":
                $data = Memorandum::DocumentSeries($request->key)->first();
                if(!$data){
                    return $this->sendError('Record does not exist or has been deleted.');
                }
                return $this->sendResponse($data);
                break;
            case "rs":
                $data = ReturnSlip::with('items')->DocumentSeries($request->key)->first();
                if(!$data){
                    return $this->sendError('Record does not exist or has been deleted.');
                }
                return $this->sendResponse($data);
                break;
            default:
                return $this->sendError('Identifier could not recognize.');
        }
    }
}
