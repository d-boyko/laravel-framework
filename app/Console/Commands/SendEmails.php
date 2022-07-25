<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     * To run: php artisan mail:send EMAIL
     * @var string
     */
    protected $signature = 'mail:send {email?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Emails to current email address';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Sending email to ' . $this->argument('email'));
        mail(
            $this->argument('email'),
            'Laravel Framework',
            "I'm learning laravel",
        );
        Log::info('Email was sent to ' . $this->argument('email'));
    }
}
