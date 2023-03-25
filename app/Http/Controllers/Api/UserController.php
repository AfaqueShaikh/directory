<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }

    public function getProfile(Request $request)
    {
        $email = $request->email;
//        $email = 'devrsingh2@gmail.com';
        $response = [];
        if ($email !== '') {
            $user = User::where('email', $email)
                ->first();
            $response['success'] = true;
            $response['msg'] = 'User Profle';
            $response['user'] = $user;
        } else {
            $response['success'] = false;
            $response['msg'] = 'Something went wrong!';
        }

        return json_encode($response);
    }

}
