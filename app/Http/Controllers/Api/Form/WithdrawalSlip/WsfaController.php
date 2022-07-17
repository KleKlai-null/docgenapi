<?php

namespace App\Http\Controllers\Api\Form\WithdrawalSlip;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Form\Item\FaItem;
use App\Models\Form\WithdrawalSlip\Wsfa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WsfaController extends ApiController
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
                $data = Wsfa::with('items')->find($request->id);
    
                return $this->sendResponse($data);
            }
    
            return $this->sendResponse(Wsfa::with('items')->get());

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
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();

            $data = Wsfa::create([
                'document_series_no'    => $request->document_series_no,
                'department'            => $request->department,
                'mr_no'                 => $request->mr_no,
                'prepared_by'           => $request->prepared_by,
                'approved_by'           => $request->approved_by,
                'released_by'           => $request->released_by
            ]);

            foreach ($request->items as $key => $item) {
                FaItem::create([
                    'wsfa_id'               => $data->id,
                    'item_code'             => $item['item_code'],
                    'item_description'      => $item['item_description'],
                    'qty'                   => $item['qty'],
                    'serial_no'             => $item['serial_no'],
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
     * @param  \App\Models\Form\WithdrawalSlip\Wsfa  $wsfa
     * @return \Illuminate\Http\Response
     */
    public function show(Wsfa $wsfa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfa  $wsfa
     * @return \Illuminate\Http\Response
     */
    public function edit(Wsfa $wsfa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form\WithdrawalSlip\Wsfa  $wsfa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wsfa $wsfa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form\WithdrawalSlip\Wsfa  $wsfa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wsfa $wsfa)
    {
        //
    }
}