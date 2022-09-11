<?php

namespace App\Http\Controllers;

use App\Actions\TransformUsersAction;
use App\Models\User;

class UnitController extends Controller
{
    public function forUnitTransformUsers(TransformUsersAction $action)
    {
        $users = User::all()->take(100);
        $action->handle($users);
    }
}
