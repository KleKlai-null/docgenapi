<?php

namespace App\Http\Controllers\Api\Form\WithdrawalSlip;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\WithdrawalSlip\WsdmRequest;
use App\Models\Form\Item\DmItem;
use App\Models\Form\WithdrawalSlip\Wsdm;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WsdmController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            if($request->id){
                $data = Wsdm::with('items')->find($request->id);
    
                return $this->sendResponse($data);
            }
    
            return $this->sendResponse(Wsdm::with('items')->get());

        } catch (Exception $exception) {
            return $this->sendError($exception);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WsdmRequest $request)
    {

        try {

            DB::beginTransaction();

            $data = Wsdm::create($request->validated());

            foreach ($request->items as $key => $item) {
                DmItem::create([
                    'wsdm_id'               => $data->id,
                    'item_code'             => $item['item_code'],
                    'item_description'      => $item['item_description'],
                    'qty'                   => $item['qty'],
                    'uom'                   => $item['uom'],
                    'remarks'               => $item['remarks']
                ]);
            }

            DB::commit();

            return $this->sendResponse($data);

        } catch (Exception $exception) {

            DB::rollback();

            return $this->sendError($exception);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsdm  $wsdm
     * @return \Illuminate\Http\Response
     */
    public function show(Wsdm $wsdm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsdm  $wsdm
     * @return \Illuminate\Http\Response
     */
    public function edit(Wsdm $wsdm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form\WithdrawalSlip\Wsdm  $wsdm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wsdm $wsdm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsdm  $wsdm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wsdm $wsdm)
    {
        //
    }
}
