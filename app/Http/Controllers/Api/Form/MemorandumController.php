<?php

namespace App\Http\Controllers\Api\Form;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Form\Memorandum;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemorandumController extends ApiController
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
                $data = Memorandum::find($request->id);
    
                return $this->sendResponse($data);
            }
    
            return $this->sendResponse(Memorandum::all());

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

            $data = Memorandum::create([
                'document_series_no'    => $request->document_series_no,
                'id_no'                 => $request->id_no,
                'name_of_employee'      => $request->name_of_employee,
                'department'            => $request->department,
                'section'               => $request->section,
                'asset_code'            => $request->asset_code,
                'asset_type'            => $request->asset_type,
                'asset_description'     => $request->asset_description,
                'asset_serial_no'       => $request->asset_serial_no,
                'asset_value'           => $request->asset_value
            ]);


            return $this->sendResponse($data);

        } catch (Exception $exception) {

            return $this->sendError($exception);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Memorandum  $memorandum
     * @return \Illuminate\Http\Response
     */
    public function show(Memorandum $memorandum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Memorandum  $memorandum
     * @return \Illuminate\Http\Response
     */
    public function edit(Memorandum $memorandum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Memorandum  $memorandum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memorandum $memorandum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Memorandum  $memorandum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memorandum $memorandum)
    {
        //
    }
}
