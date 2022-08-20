<?php

namespace App\Providers;

use App\Events\CreateUserEvent;
use App\Events\ForgotPasswordEvent;
use App\Events\UnknownPostUserIdEvent;
use App\Events\UpdateUserEvent;
use App\Listeners\ForgotPasswordNotification;
use App\Listeners\NewUserEmailNotification;
use App\Listeners\SendEmailAboutUnknownPostCreating;
use App\Listeners\UpdateUserInfoNotification;
use App\Models\Post;
use App\Models\User;
use App\Models\Version;
use App\Observers\PostObserver;
use App\Observers\UserObserver;
use App\Observers\VersionObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CreateUserEvent::class => [
            NewUserEmailNotification::class,
        ],
        UpdateUserEvent::class => [
            UpdateUserInfoNotification::class,
        ],
        ForgotPasswordEvent::class => [
            ForgotPasswordNotification::class,
        ],
        UnknownPostUserIdEvent::class => [
            SendEmailAboutUnknownPostCreating::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        Version::observe(VersionObserver::class);
        User::observe(UserObserver::class);
        Post::observe(PostObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
