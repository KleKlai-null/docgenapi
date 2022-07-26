<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
        $data = User::where('email', $request->email)->first();

        $request->validate([
            'password' => 'required',
        ]);

        $data->update([
            'password'  => Hash::make($request->password)
        ]);

        //Get User Roles && sync new roles

        return $this->sendResponse($data);
    }

    public function updateCurrentUser(Request $request)
    {
        $data = User::findOrFail(auth()->user()->id);

        $request->validate([
            'password' => 'required',
        ]);

        $data->update([
            'password'  => Hash::make($request->password)
        ]);

        return $this->sendResponse($data);
    }
}
