<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class GetLoggedInUserInfoAction
{
    /**
     * @return User|Authenticatable|null
     */
    public function handle(): User|Authenticatable|null
    {
        return Auth::user();
    }
}
