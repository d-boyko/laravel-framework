<?php

namespace App\Jobs;

use Faker\Core\Uuid;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AddUserInfoToUsersTable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $password;
    protected $agreement;
    protected $age;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $email, $password, $agreement, $age)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->agreement = $agreement;
        $this->age = $age;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        DB::table('users')->insert([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'agreement' => $this->agreement,
            'age' => $this->age,
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => Str::uuid(),
        ]);
    }
}
