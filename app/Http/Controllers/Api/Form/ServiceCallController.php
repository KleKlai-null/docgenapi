<?php

namespace App\Http\Controllers\Api\Form;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\ServiceCallRequest;
use App\Models\Form\ServiceCall;
use App\Services\DocumentService;
use Exception;
use Illuminate\Http\Request;

class ServiceCallController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['role:sc_clerk|administrator']);
    }

    public function index(Request $request)
    {
        try {

            if($request->id){
                $data = ServiceCall::find($request->id)->orderBy('id', 'desc')->get();
    
                return $this->sendResponse($data);
            }
    
            return $this->sendResponse(ServiceCall::orderBy('id', 'desc')->get());

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
    public function store(ServiceCallRequest $request)
    {
        try {

            $data = ServiceCall::create($request->validated());

            DocumentService::generatePDF($data, 'sc'); //Generate PDF for Backup

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
