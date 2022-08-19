<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateUserInfoInUsersTable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $parameters;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userInfo)
    {
        $this->parameters = $userInfo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        User::where('id', '=', $this->parameters['id'])
            ->update([$this->parameters['field'] => $this->parameters['newValue']]);
    }
}
