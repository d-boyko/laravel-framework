<?php

namespace App\Providers;

use App\Http\Resources\DeskResource;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        DeskResource::wrap('test_wrapping');
    }
}
