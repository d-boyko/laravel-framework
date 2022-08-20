<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class VersionObserver
{
    /**
     * @return void
     */
    public function created(): void
    {
        Cache::forget('versions');
        Cache::forget('last_version');
    }
}
