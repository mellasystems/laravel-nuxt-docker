<?php

namespace App\Http\Controllers\API\V1\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\RegisterRequest;
use function response;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function show(User $user): User
    {
        return $user;
    }

    public function store(RegisterRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User created successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
