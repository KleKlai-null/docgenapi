<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends ApiController
{
    
    // Return all user with roles
    public function index()
    {
        return $this->sendResponse(User::all());
    }

    // Update existing user
    public function update(Request $request)
    {
        try {

            $data = User::where('email', $request->email)->first();

            $this->validate($request, [
                'password'  => 'required'
            ]);

            $data->update([
                'password'  => Hash::make($request->password)
            ]);

            //Get User Roles && sync new roles

            return $this->sendResponse($data);

        } catch (Exception $exception) {
            return $this->sendError($exception);
        }
    }

    public function updateCurrentUser(Request $request)
    {
        try {

            $data = User::findOrFail(auth()->user()->id);

            $data->update([
                'password'  => Hash::make($request->password)
            ]);

            return $this->sendResponse($data);

        } catch (Exception $exception) {
            return $this->sendError($exception);
        }
    }
}
