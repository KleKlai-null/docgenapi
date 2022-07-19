<?php

namespace App\Http\Controllers\Api\Form\WithdrawalSlip;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\WithdrawalSlip\WsmroRequest;
use App\Models\Form\Item;
use App\Models\Form\Item\MroItem;
use App\Models\Form\WithdrawalSlip\Wsmro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WsmroController extends ApiController
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
                $data = Wsmro::with('items')->find($request->id);

                return $this->sendResponse($data);
            }

            return $this->sendResponse(Wsmro::with('items')->get());
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
    public function store(WsmroRequest $request)
    {
        try {

            DB::beginTransaction();
            $data = Wsmro::create($request->validated());

            $data = Wsmro::create([
                'profit_center'         => $request->profit_center,
                'sub_profit_center'     => $request->sub_profit_center,
                'cost_center'           => $request->cost_center,
                'prepared_by'           => $request->prepared_by,
                'approved_by'           => $request->approved_by,
                'released_by'           => $request->released_by
            ]);

            foreach ($request->items as $key => $item) {
                MroItem::create([
                    'wsmro_id'              => $data->id,
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
     * @param  \App\Models\Form\WihdrawalSlip\Wsmro  $wsmro
     * @return \Illuminate\Http\Response
     */
    public function show(Wsmro $wsmro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form\WihdrawalSlip\Wsmro  $wsmro
     * @return \Illuminate\Http\Response
     */
    public function edit(Wsmro $wsmro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form\WihdrawalSlip\Wsmro  $wsmro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wsmro $wsmro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form\WihdrawalSlip\Wsmro  $wsmro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wsmro $wsmro)
    {
        //
    }
}
