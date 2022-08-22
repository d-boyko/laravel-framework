<?php

namespace App\Providers;

use App\Actions\RegisterUserAction;
use App\Contracts\RegisterActionContract;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        RegisterActionContract::class => RegisterUserAction::class,
    ];
}
