<?php

namespace App\Providers;

use App\Http\Resources\DeskResource;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        $this->app->singleton(Connection::class, function ($app) {
            return new Connection(config('database.default'));
        });
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

        DeskResource::wrap('test_wrapping');

        Relation::enforceMorphMap([
            'video' => 'App\Models\Video',
            'comment' => 'App\Models\Comment',
            'social_post' => 'App\Models\SocialPost',
        ]);
    }
}
