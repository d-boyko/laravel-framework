<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShowUserInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:info {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Showing user info from users table by entering ID';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Log::info('----------------------');
        Log::info('User info with ID: ' . $this->argument('id'));
        $users = DB::table('users')
            ->where('id', '=', $this->argument('id'))
            ->select('name', 'email', 'password')
            ->get();

        foreach($users as $row) {
            echo $row->name . PHP_EOL;
            echo $row->email . PHP_EOL;
            echo $row->password . PHP_EOL;
        }
        Log::info('----------------------');
    }
}
