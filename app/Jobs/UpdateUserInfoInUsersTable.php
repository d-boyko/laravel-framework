<?php

namespace App\Jobs;

use App\Actions\UpdateUserAction;
use App\Models\User;
use Illuminate\Bus\Queueable;
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
     * @param UpdateUserAction $action
     * @return void
     */
    public function handle(UpdateUserAction $action): void
    {
    }
}
