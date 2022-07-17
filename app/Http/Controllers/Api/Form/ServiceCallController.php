<?php

namespace App\Http\Controllers\Api\Form;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Form\ServiceCall;
use Exception;
use Illuminate\Http\Request;

class ServiceCallController extends ApiController
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
                $data = ServiceCall::find($request->id);
    
                return $this->sendResponse($data);
            }
    
            return $this->sendResponse(ServiceCall::all());

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

            $data = ServiceCall::create([
                'document_series_no'        => $request->document_series_no,
                'customer_name'             => $request->customer_name,
                'contact_number'            => $request->contact_number,
                'phone_no'                  => $request->phone_no,
                'status'                    => $request->status,
                'item_no'                   => $request->item_no,
                'description'               => $request->description,
                'mfr_serial_no'             => $request->mfr_serial_no,
                'serial_no'                 => $request->serial_no,
                'subject'                   => $request->subject,
                'origin'                    => $request->origin,
                'problem_type'              => $request->problem_type,
                'assigned_to'               => $request->assigned_to,
                'priority'                  => $request->priority,
                'call_type'                 => $request->call_type,
                'technician'                => $request->technician,
                'remarks'                   => $request->remarks
            ]);

            return $this->sendResponse($data);

        } catch (Exception $exception) {

            return $this->sendError($exception);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form\ServiceCall  $serviceCall
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCall $serviceCall)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form\ServiceCall  $serviceCall
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceCall $serviceCall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form\ServiceCall  $serviceCall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceCall $serviceCall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form\ServiceCall  $serviceCall
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCall $serviceCall)
    {
        //
    }
}
