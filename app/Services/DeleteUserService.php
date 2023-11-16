<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\User;

class DeleteUserService
{
    public function execute($id)
    {
        $userFound = User::firstWhere('id', $id);

        if (is_null($userFound)) {
            throw new AppError("User not found", 404);
        }

        $userFound->delete();

        return response()->json($userFound, 204);
    }
}
