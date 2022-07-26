<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends ApiController
{
    public function index()
    {
        $data = Activity::all();

        return $this->sendResponse($data);
    }
}
