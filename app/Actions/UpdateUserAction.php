<?php

namespace App\Actions;

use App\Contracts\UpdateUserContract;
use App\Models\User;

class UpdateUserAction implements UpdateUserContract
{
    /**
     * @param $data
     * @return bool
     */
    public function handle($data): bool
    {
        return User::where('id', '=', $data['id'])
            ->update([$data['field'] => $data['newValue']]);
    }
}
