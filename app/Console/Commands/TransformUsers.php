<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class TransformUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:transform';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transform users collection into the new format';

    /**
     * Execute the console command.
     *
     */
    public function handle(): array
    {
        $users = User::all();
        $names = strtoupper($users->name);
        $emails = strtoupper($users->email);
        $created_date = date_format($users->created_at, 'Y.m.d');

        return [
            $names,
            $emails,
            $created_date,
        ];
    }
}
