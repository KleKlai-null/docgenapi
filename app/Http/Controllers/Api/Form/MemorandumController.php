<?php

namespace App\Http\Controllers\Api\Form;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\MemorandumRequest;
use App\Models\Form\Memorandum;
use Exception;
use Illuminate\Http\Request;

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
                $data = Memorandum::find($request->id)->orderBy('id', 'desc')->get();
    
                return $this->sendResponse($data);
            }
    
            return $this->sendResponse(Memorandum::orderBy('id', 'desc')->get());

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
    public function store(MemorandumRequest $request)
    {
        try {

            $data = Memorandum::create($request->validated());

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
