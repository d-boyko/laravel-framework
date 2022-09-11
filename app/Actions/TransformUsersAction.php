<?php

namespace App\Actions;

class TransformUsersAction
{
    public function handle($users)
    {
        $users->increased_at = now()->format('Y.m.d');
        return $users;
    }
}
