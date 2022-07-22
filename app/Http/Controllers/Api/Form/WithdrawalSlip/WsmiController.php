<?php

namespace App\Http\Controllers\Api\Form\WithdrawalSlip;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\WithdrawalSlip\WsmiRequest;
use App\Models\Form\Item;
use App\Models\Form\Item\MiItem;
use App\Models\Form\WithdrawalSlip\Wsmi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WsmiController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            if ($request->id) {
                $data = Wsmi::with('items')->orderBy('id', 'desc')->find($request->id);

                if (!$data) {
                    return $this->sendError('Record does not exist or has been deleted.');
                }

                return $this->sendResponse($data);
            }

            return $this->sendResponse(Wsmi::with('items')->orderBy('id', 'desc')->get());
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
    public function store(WsmiRequest $request)
    {

        try {

            DB::beginTransaction();

            $data = Wsmi::create($request->validated());

            foreach ($request->items as $key => $item) {
                MiItem::create([
                    'wsmi_id'               => $data->id,
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
     * @param  \App\Models\Form\WithdrawalSlip\Wsmi  $wsmi
     * @return \Illuminate\Http\Response
     */
    public function show(Wsmi $wsmi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsmi  $wsmi
     * @return \Illuminate\Http\Response
     */
    public function edit(Wsmi $wsmi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form\WithdrawalSlip\Wsmi  $wsmi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wsmi $wsmi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsmi  $wsmi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wsmi $wsmi)
    {
        //
    }
}
