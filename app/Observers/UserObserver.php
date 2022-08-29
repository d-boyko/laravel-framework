<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @return void
     */
    public function created(): void
    {
        $data = User::all();
        $key = User::class . '-' . now()->format('d.m.Y');

        Cache::forget($key);
        Cache::put($key, $data);
    }

    /**
     * Handle the User "updated" event.
     *
     * @return void
     */
    public function updated(): void
    {
        $data = User::all();
        $key = User::class . '-' . now()->format('d.m.Y');

        Cache::forget($key);
        Cache::put($key, $data);
    }

    /**
     * Handle the User "deleted" event.
     *
     * @return void
     */
    public function deleted(): void
    {
        $data = User::all();
        $key = User::class . '-' . now()->format('d.m.Y');

        Cache::forget($key);
        Cache::put($key, $data);
    }

    /**
     * Handle the User "restored" event.
     *
     * @return void
     */
    public function restored(): void
    {
        $data = User::all();
        $key = User::class . '-' . now()->format('d.m.Y');

        Cache::forget($key);
        Cache::put($key, $data);
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(): void
    {
        $data = User::all();
        $key = User::class . '-' . now()->format('d.m.Y');

        Cache::forget($key);
        Cache::put($key, $data);
    }
}
