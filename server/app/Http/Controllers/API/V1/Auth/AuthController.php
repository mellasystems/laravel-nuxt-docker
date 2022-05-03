<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\API\APIController;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Requests\V1\User\RegisterRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use function bcrypt;

class AuthController extends APIController
{
    public function signin(LoginRequest $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))){
            throw new AuthenticationException();
        }
        else{
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;
            $success['email'] =  $authUser->email;

            return $this->sendResponse($success, 'User signed in');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->sendResponse("Logout", 'Successfully logout');
    }
}
