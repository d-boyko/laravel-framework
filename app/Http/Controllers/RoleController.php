<?php

namespace App\Http\Controllers;

use App\Models\User;
use JetBrains\PhpStorm\NoReturn;

class RoleController extends Controller
{
    #[NoReturn] public function getUserRoles($userId)
    {
        $user = User::find($userId)->roles;
        dd($user);
    }

    #[NoReturn] public function getRolesWithConditions($userId)
    {
        $roles = User::find($userId)->roles()->orderBy('name')->get();
        dd($roles);
    }

    public function getPivotColumns($userId)
    {
        $user = User::find($userId);

        foreach ($user->roles as $role) {
            dd($role->pivot->role_id);
        }
    }
}
