<?php

namespace App\Providers;

use App\Actions\RegisterUserAction;
use App\Contracts\RegisterActionContract;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Psy\Util\Json;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
//        $this->app->bind(RegisterActionContract::class, RegisterUserAction::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        View::share('date', '2022');
        View::composer('user*', function($view) {
            $view->with('balance', 12345);
        });

        // If we don't want to add 'data' or any other word into json output
//        JsonResource::withoutWrapping();

        // If we want to add standard work
//        JsonResource::wrap('word');
    }
}
