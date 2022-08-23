<?php

namespace App\Actions;

use App\Contracts\UpdateUserContract;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateUserAction implements UpdateUserContract
{
    /**
     * @param $data
     * @return Request
     */
    public function handle($data): Request
    {
        User::where('id', '=', $data->id)
            ->update([$data->field => $data->newValue]);

        return $data;
    }
}
