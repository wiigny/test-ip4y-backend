<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Services\CreateUserService;
use App\Services\DeleteUserService;
use App\Services\UpdateUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(CreateUserRequest $request)
    {
        $createUserService = new CreateUserService();

        return $createUserService->execute($request->all());
    }

    public function get()
    {
        $users = User::all();

        return $users;
    }

    public function update(CreateUserRequest $request)
    {
        $updateUserService = new UpdateUserService();

        return $updateUserService->execute($request, $request->id);
    }

    public function delete(Request $request)
    {
        $deleteUserService = new DeleteUserService();

        return $deleteUserService->execute($request->id);
    }
}
