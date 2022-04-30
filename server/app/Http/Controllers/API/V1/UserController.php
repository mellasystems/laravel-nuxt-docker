<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserController extends Controller
{
    public function index()
    {
        $user = ResourceCollection::make(User::all());
        return response()->json($user);
    }

    public function show(User $user): User
    {
        return $user;
    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
