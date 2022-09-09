<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CreateUserAction
{
    public function handle(): Model|User
    {
        return User::create([
            'name' => 'Daniil Boyko',
            'email' => Str::random(10),
            'password' => 'test_password',
        ]);
    }
}
