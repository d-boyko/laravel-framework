<?php

namespace App\Providers;

use App\Actions\RegisterUserAction;
use App\Actions\UpdateUserAction;
use App\Contracts\RegisterActionContract;
use App\Contracts\UpdateUserContract;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        RegisterActionContract::class => RegisterUserAction::class,
        UpdateUserContract::class => UpdateUserAction::class,
    ];
}
