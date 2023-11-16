<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\User;

class UpdateUserService
{
    public function execute($request, $id)
    {
        $userFound = User::firstWhere('id', $id);

        if (is_null($userFound)) {
            throw new AppError("User not found", 404);
        }

        if ($userFound->cpf != $request->cpf) {
            $userFoundCPF = User::firstWhere('cpf', $request->cpf);

            if (!is_null($userFoundCPF)) {
                throw new AppError("CPF already exists", 400);
            }
        }

        if ($userFound->email != $request->email) {
            $userFoundEmail = User::firstWhere('email', $request->email);

            if (!is_null($userFoundEmail)) {
                throw new AppError("Email already exists", 400);
            }
        }

        $data = $request->validated();

        $userFound->update($data);

        $userFound->save();

        return response()->json($userFound, 200);
    }
}
