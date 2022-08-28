<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendAlertMessage extends Command
{
    protected $signature = 'send:alert';

    protected $description = 'Sending alert message to test schedule';

    public function __invoke()
    {
        Log::alert('Testing schedule with send alert message');
    }
}
