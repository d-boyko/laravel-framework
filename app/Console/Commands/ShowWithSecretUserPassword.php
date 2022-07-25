<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ShowWithSecretUserPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show_password:secret';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show user name with secret function by password';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $password = $this->secret('What password?');
        $response = DB::table('users')
            ->where('password', '=', $password)
            ->get();

        foreach ($response as $row) {
            echo $row->name;
        }
    }
}
