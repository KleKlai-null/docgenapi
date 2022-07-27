<?php

namespace App\Http\Controllers\Container;

use App\Http\Controllers\Controller;
use App\Services\DocumentService;
use Illuminate\Http\Request;

class DocVerificationController extends Controller
{
    public function verifyDocument(Request $request)
    {
        $data = DocumentService::getDocument($request->key);

        if(!$data) {

            $data = substr($request->key, 4);

            return view('verify', compact('data'));

        } else {
            return view('verify', compact('data'));
        }
    }
}
