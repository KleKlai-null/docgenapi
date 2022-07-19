<?php

namespace App\Http\Controllers\Api\Form\WithdrawalSlip;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\WithdrawalSlip\WsfgRequest;
use App\Models\Form\Item\FgItem;
use App\Models\Form\WithdrawalSlip\Wsfg;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WsfgController extends ApiController
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
                $data = Wsfg::with('items')->find($request->id);
    
                return $this->sendResponse($data);
            }
    
            return $this->sendResponse(Wsfg::with('items')->get());

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
    public function store(WsfgRequest $request)
    {
        try {

            DB::beginTransaction();

            $data = Wsfg::create($request->validated());

            foreach ($request->items as $key => $item) {
                FgItem::create([
                    'wsfg_id'               => $data->id,
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

            return response()->json([
                'data'  => $exception,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfg  $wsfg
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            // find ID
            $data = Wsfg::with('items')->findOrFail($id);

            return $this->sendResponse($data);

        } catch (Exception $exception) {

            return $this->sendError($exception);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfg  $wsfg
     * @return \Illuminate\Http\Response
     */
    public function edit(Wsfg $wsfg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form\WithdrawalSlip\Wsfg  $wsfg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wsfg $wsfg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfg  $wsfg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wsfg $wsfg)
    {
        //
    }
}
